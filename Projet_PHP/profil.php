 <?php

	include("header.php");

    if($_SESSION['droits']>=1){
		
		try {
            include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
		} catch (Exception $e){
			echo 'erreur de connexion a la db'.$e;
		}
		
		if(isset($_GET['user_id'])){
			
			$getid = $_GET['user_id'];
			$requser = $db->prepare("SELECT * FROM users WHERE user_id = ?");
			$requser -> execute(array($getid));
			$userinfo = $requser -> fetch();
?>
<html>
	<body>
		<div align="center">
			<h2> Profil de <?php echo $userinfo['pseudo'] ?></h2>
			<br /> <br />
			Nom : <?php echo $userinfo['nom'] ?>
			<br/>
			Prénom : <?php echo $userinfo['prenom'] ?>
			<br/>
			Pseudo : <?php echo $userinfo['pseudo'] ?>
			<br/>
			Mail : <?php echo $userinfo['mail'] ?>
			<br/>
			<?php
			if(isset($_SESSION['user_id']) && $userinfo['user_id'] == $_SESSION['user_id']){
			?>
			<a href="profiledit.php">Editer mon profil</a><br/><br/><br/><br/><br/>
			<a href="userdel.php">Me désinscrire</a>
			<?php
			}
			?>
		</div>
	</body>
</html>
<?php
		}
	} else {
		header("Location: connexion.php");
	}
?>