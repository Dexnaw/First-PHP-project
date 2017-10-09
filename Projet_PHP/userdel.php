<?php
	include('header.php');
	if($_SESSION['droits']>0){
		
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			
			$req = $db->prepare('DELETE FROM users WHERE user_id = ?');
			$req -> execute(array($_SESSION['user_id']));
			header("Location: logout.php");
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
		
	} else {
		header("Location: connexion.php");
	}
?>