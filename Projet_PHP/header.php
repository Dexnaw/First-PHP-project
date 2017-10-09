<?php

	session_start();
    if(!isset($_SESSION['droits'])){
        $_SESSION['droits']=0;
    }
	
	if(isset($_POST['sign'])){
		header("Location: inscription.php");
	}	
	if(isset($_POST['login'])){
		header("Location: connexion.php");
	}	
	if(isset($_POST['contact'])){
		header("Location: contact.php");
	}	
	if(isset($_POST['cartes'])){
		header("Location: cartes.php");
	}		
	if(isset($_POST['decks'])){
		header("Location: deckshow.php");
	}	
	if(isset($_POST['logout'])){
		header("Location: logout.php");
	}	
	if(isset($_POST['profil'])){
		header("Location: redirection.php");
	}	
	if(isset($_POST['moderation'])){
		header("Location: usershow.php");
	}
?>


<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<meta name="author" content="Arnaud Urbain"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="col-sm-12">
			<form method="POST" action="">
			<?php
				if($_SESSION['droits']>0){
			?>
				<input class="pull-right button" type="submit" name="cartes" value="Cartes"/>
				<input class="pull-right button" type="submit" name="decks" value="Decks"/>
				<input class="pull-right button" type="submit" name="profil" value="Mon profil"/>
				<input class="pull-right button" type="submit" name="logout" value="Se déconnecter"/>
			<?php		
				}else if($_SESSION['droits']==0){
					?><input class="pull-right button" type="submit" name="sign" value="Inscription"/>
					<input class="pull-right button" type="submit" name="login" value="Login"/><?php
				}
				if($_SESSION['droits']==2){
					?><input class="pull-right button" type="submit" name="moderation" value="Modération"/><?php
				}
			?>
				<input class="pull-right button" type="submit" name="contact" value="Contact"/>
			</form>
		</div>
	</body>
</html>