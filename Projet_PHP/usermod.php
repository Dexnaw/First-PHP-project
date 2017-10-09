  <?php

	include("header.php");
	if($_SESSION['droits']>0){
		if($_SESSION['droits']!=2){
			header("Location: redirection.php");
		} else {
			
			$user_id = $_GET['user_id'];
			try {
				include_once("db.php");
				$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			} catch (Exception $e){
				echo 'erreur de connexion a la db'.$e;
			}
			

			if(isset ($_POST['formedit'])){

				$prenom = htmlspecialchars($_POST['newprenom']);
				$nom = htmlspecialchars($_POST['newnom']);
				$pseudo = htmlspecialchars($_POST['newpseudo']);
				$mail = htmlspecialchars($_POST['newmail']);
				
				
				$regIdentity = '#^([a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüıÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜİŸÆŒ]{1,255})[\s-]?([a-zA-Záàâäãåçéèêëíìîïñóòôöõúùûüıÿæœ]{1,254})$#';
				$regPseudo = '#^([a-zA-z]*[^0-9])[0-9]*([a-zA-Z0-9]*)$#';
				$regMail = '#^[a-z0-9.\-_]{1,}@[a-z](.?[a-z])*\.([a-z]){2,4}$#';
				
				if(!empty($_POST['newprenom']) && !empty($_POST['newnom']) && !empty($_POST['newpseudo']) && 
				!empty($_POST['newmail'])) {
					
					if(preg_match($regIdentity, $prenom) && (strlen($prenom)<=255)) {
						
						if(preg_match($regIdentity, $nom) && (strlen($nom)<=255)) {
							
							if(preg_match($regPseudo, $pseudo) && (strlen($pseudo)<=255)) {
								
								$reqPseudo = $db -> prepare ("SELECT * FROM users WHERE pseudo = ?");
								$reqPseudo -> execute(array($pseudo));
								$pseudoExist = $reqPseudo->rowCount();
								
								$verifpseudo = $db -> prepare("SELECT * FROM users WHERE user_id = ?");
								$verifpseudo -> execute(array($user_id));
								$pseudOK = $verifpseudo -> fetch();
								
								if(!$pseudoExist || $pseudOK['pseudo'] == $pseudo){
								
									if(preg_match($regMail, $mail) && (strlen($mail)<=255)){
										
										$reqmail = $db -> prepare ("SELECT * FROM users WHERE mail = ? ");
										$reqmail -> execute(array($mail));
										$mailexist = $reqmail->rowCount();
										$verifmail = $db -> prepare("SELECT * FROM users WHERE user_id = ?");
										$verifmail -> execute(array($user_id));
										$mailOK = $verifmail -> fetch();
										
										if(!$mailexist || $mailOK['mail'] == $mail){
										
											$req = $db -> prepare("UPDATE users SET nom = ?, prenom = ?, pseudo = ?, mail = ? WHERE user_id = ?");
											$req -> execute(array($nom, $prenom, $pseudo, $mail, $user_id));
						
											header('Location: usershow.php');
											
										} else {
											$message = "Adresse mail déjà utilisée";
										}
										
									} else {
										$message = "Votre adresse mail n'est pas valide";
									}
						
								} else {
									$message = "Ce pseudo n'est pas disponible";
								}
								
							} else {
								$message = "Votre pseudo ne peut contenir que des lettres et des chiffres (ne pas depasser 255 caractères)";
							}

						} else {
							$message = "Votre nom ne peut contenir que des lettres et ne pas depasser 255 caractères !";
						}	
						
					} else {
						$message = "Votre prenom ne peut contenir que des lettres et ne pas depasser 255 caractères !";
					}					
						
				} else {
					$message ="tous les champs doivent être complétés !";
				}
			}
			
			if(isset($_POST['annule'])){
				header('Location: usershow.php');
			}
			
			$requser = $db -> prepare("SELECT * FROM users WHERE user_id = ?");
			$requser -> execute(array($user_id));
			$user = $requser -> fetch();
				
				
	?>
	<div align="center">
		<h2> Edition le profil </h2>
		<div align="left">
			<form method="POST" action="">
				<label>Nom :</label>
				<input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom'];?>"/><br /><br />
				<label>Prénom :</label>
				<input type="text" name="newprenom" placeholder="Prénom" value="<?php echo $user['prenom'];?>"/><br /><br />
				<label>Pseudo :</label>
				<input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo'];?>"/><br /><br />
				<label>Mail :</label>
				<input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail'];?>"/><br /><br />
				<input type="submit" name="annule" value="Annuler les changements" />
				<input type="submit" name="formedit" value="Mettre a jour mon profil !" />
			</form>
			<?php if(isset($message)){echo '<font color="red">'.$message."</font>";} ?>
		</div>
	</div>

	<?php
		}
	} else {
		header("Location: connexion.php");
	}
?>