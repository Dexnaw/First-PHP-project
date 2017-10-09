<?php

	include("header.php");

    if(!$_SESSION['droits']>=1){
		
		try {
            include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
		} catch (Exception $e){
			echo 'erreur de connexion a la db'.$e;
		}
		
		if(isset ($_POST['forminscription'])){

			$prenom = htmlspecialchars($_POST['prenom']);
			$nom = htmlspecialchars($_POST['nom']);
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$mail = htmlspecialchars($_POST['mail']);
			$mail2 = htmlspecialchars($_POST['mail2']);
	
			$regMdp = '#^[a-zA-Z0-9]{8,16}$#';
			$regIdentity = '#^([a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,255})[\s-]?([a-zA-Záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]{1,254})$#';
			$regPseudo = '#^([a-zA-z]*[^0-9])[0-9]*([a-zA-Z0-9]*)$#';
			$regMail = '#^[a-z0-9.\-_]{1,}@[a-z](.?[a-z])*\.([a-z]){2,4}$#';
			
			if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pseudo']) && 
			!empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['mdp'])&& 
			!empty($_POST['mdp2'])) {
				
				
		
				if(preg_match($regMdp, $_POST['mdp'])){
					
					if($_POST['mdp'] == $_POST['mdp2']){
						
						$mdp = sha1($_POST['mdp']);
						
	
						if(preg_match($regIdentity, $prenom) && (strlen($prenom)<=255)) {
							
							if(preg_match($regIdentity, $nom) && (strlen($nom)<=255)) {
								
								if(preg_match($regPseudo, $pseudo) && (strlen($pseudo)<=255)) {
									
									$reqPseudo = $db -> prepare ("SELECT * FROM users WHERE pseudo = ?");
									$reqPseudo -> execute(array($pseudo));
									$pseudoExist = $reqPseudo->rowCount();
									
									if(!$pseudoExist){
									
										if($mail == $mail2){
					
											if(preg_match($regMail, $mail) && (strlen($mail)<=255)){
												
												$reqmail = $db -> prepare ("SELECT * FROM users WHERE mail = ? ");
												$reqmail -> execute(array($mail));
												$mailexist = $reqmail->rowCount();
												
												if(!$mailexist){
												
													$req = $db -> prepare("INSERT INTO users (nom, prenom, pseudo, mail, mdp) VALUES(?,?,?,?,?)");
													$req -> execute(array($nom, $prenom, $pseudo, $mail, $mdp));
								
													$message = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
													
												} else {
													$message = "Adresse mail déjà utilisée";
												}
												
											} else {
												$message = "Votre adresse mail n'est pas valide";
											}
							
										} else {
											$message = "Vos adresses mail ne sont pas identiques !";
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
						$message = "Vos mots de passes ne sont pas identiques";
					}
						
				} else {
					$message = "Le mot de passe doit comprendre entre 8 et 16 caractères !";
				}

			} else {
				$message ="tous les champs doivent être complétés !";
			}
		}

?>

<div align="center">
	<h2> Inscription </h2>
	<br /> <br />
	<form method="POST" action="inscription.php">
		<table>
			<tr>
				<td align="right">
					<label for="prenom">Prénom :&nbsp;</label>
				</td>
				<td>
					<input type="text" name="prenom" id="prenom" placeholder="Votre prénom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" /><br>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="nom">Nom :&nbsp;</label>
				</td>
				<td>
					<input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if(isset($nom)) {echo $nom;} ?>"/><br>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="pseudo">Pseudo :&nbsp;</label>
				</td>
				<td>
					<input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>"/><br>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mail">Mail :&nbsp;</label>
				</td>
				<td>
					<input type="email" name="mail" id="mail" placeholder="Votre mail" value="<?php if(isset($mail)) {echo $mail;} ?>"/><br>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mail2">Confirmation du mail :&nbsp;</label>
				</td>
				<td>
					<input type="email" name="mail2" id="mail2" placeholder="Confirmez votre mail" value="<?php if(isset($mail2)) {echo $mail2;} ?>"/><br>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp">Mot de passe :&nbsp;</label>
				</td>
				<td>
					<input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"><br>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp2">Confirmation du mot de passe :&nbsp;</label>
				</td>
				<td>
					<input type="password" name="mdp2" id="mdp2" placeholder="Confirmez votre mdp"><br>
				</td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="forminscription" value="je m'inscris" /></td>
			</tr>
		</table>								
	</form>
	<?php
	if(isset($message)) {
		echo '<font color="red">'.$message."</font>";
	}
	?>
</div>

<?php
	} else {
		header("Location: redirection.php");
	}
?>