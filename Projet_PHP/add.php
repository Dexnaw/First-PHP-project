<?php
	include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			
			
			$carte_id = htmlspecialchars($_GET['carte_id']);
			
			$req = $db -> prepare("INSERT INTO lien (carte_id, deck_id) VALUES (?, ?)");
			$req->execute(array($carte_id,$_SESSION['deck_id']));
			
			header("Location: remplirdeck.php?classe=".$_SESSION['classe']."&prevcard=".$carte_id);
			
			
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
	} else {
		header("Location: connexion.php");
	}
?>