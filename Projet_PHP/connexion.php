 <?php

	include("header.php");
	if(!isset($_SESSION['pseudo'])){
		if(!$_SESSION['droits']>=1){
			
			try {
				include_once("db.php");
				$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			} catch (Exception $e){
				echo 'erreur de connexion a la db'.$e;
			}
			
			if(isset($_POST['formconnexion'])) {
				$pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
				$mdpconnect = sha1($_POST['mdpconnect']);
				
				if(!empty($pseudoconnect) && !empty($mdpconnect)){
					
					$requser = $db -> prepare("SELECT * FROM users WHERE pseudo = ? && mdp = ?");
					$requser -> execute(array($pseudoconnect, $mdpconnect));
					$userexist = $requser -> rowCount();
					
					if($userexist){
						
						$userinfo = $requser -> fetch();
						$_SESSION['user_id'] = $userinfo['user_id'];
						$_SESSION['pseudo'] = $userinfo['pseudo'];
						$_SESSION['mail'] = $userinfo['mail'];
						$_SESSION['droits'] = $userinfo['droits'];
						$_SESSION['deck_id']="";
						
						header("Location: redirection.php");
						
						
						
					} else {
						$message = "Mauvais pseudo ou mot de passe";
					}
					
				} else {
					$message = "Tous les champs doivent être complétés !";
				}
				
			}
?>
<html>
	<body>
		<div align="center">
			<h2> Connexion </h2>
			<br /> <br />
			<form method="POST" action="">
				<input type="text" name="pseudoconnect" placeholder="Pseudo"/>
				<input type="password" name="mdpconnect" placeholder="Mot de passe"/>
				<input type="submit" name="formconnexion" Value="Se connecter !"/>
			</form>
			<?php
			if(isset($message)) {
				echo '<font color="red">'.$message."</font>";
			}
			?>
		</div>
	</body>
</html>
<?php
		}
	} else {
		?>
		<html>
			<body>
				<div align="center">
					<h2> Connexion </h2>
					<br /> <br />
					<h3> Vous êtes déjà connecté !</h3>
					<br />
					<a href="redirection.php"> Mon profil </a>
				</div>
			</body>
		</html>
		<?php
}
?>