<?php
	
	include("header.php");
	
	if($_SESSION['droits'] == 3){
		$_SESSION = array();
		session_destroy();
		header("Location: ban.php");
		
		
	} else {
		header("Location: profil.php?user_id=".$_SESSION['user_id']);
	}
?>