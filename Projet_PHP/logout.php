<?php
	
	include("header.php");
	$_SESSION = array(); // vide les variables de session
	session_destroy();
	header("Location: index.php");
	
	
	/*if(!isset($_SESSION['droits'])){
        $_SESSION['droits']=0;
    }
	
    if($_SESSION['droits']>=1){
        session_destroy();
        echo ("Vous avez été déconnecté");
    } else {
        echo ("Vous n'êtes pas logué");
    }*/
?>