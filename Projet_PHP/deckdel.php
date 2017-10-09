<?php
	include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			
			$req = $db -> prepare('DELETE FROM lien WHERE deck_id = ?');
			$req -> execute(array($_GET['deck_id']));
			
			$req2 = $db -> prepare('DELETE FROM deck WHERE deck_id = ?');
			$req2 -> execute(array($_GET['deck_id']));
			
			header('Location: deckshow.php');
			
			
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
		
	} else {
		header("Location: connexion.php");
	}
?>