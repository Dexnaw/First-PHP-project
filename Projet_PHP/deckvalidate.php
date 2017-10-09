<?php
	include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			

			$classe = htmlspecialchars($_POST['classe']);
			$nom = htmlspecialchars($_POST['nom']);

			$add = $db -> prepare('INSERT INTO deck (nom, user, classe) VALUES(?,?,?)');
			$add -> execute(array($nom, $_SESSION['user_id'],$classe));
			
			$req = $db -> prepare('SELECT deck_id FROM deck WHERE user = ?');
			$req -> execute(array($_SESSION['user_id']));
			$data = $req -> fetch();
			
			$req2 = $db->prepare('SELECT MAX(deck_id) as deck_id FROM deck');
			$req2->execute();
			$deck = $req2 -> fetch();
			$_SESSION['deck_id']=$deck['deck_id'];
			header("Location: remplirdeck.php?classe=".$classe);
			
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
	} else {
		header("Location: connexion.php");
	}
?>