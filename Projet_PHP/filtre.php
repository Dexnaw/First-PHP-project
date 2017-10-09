<?php
if( (!isset($_GET['classe']) || empty($_GET['classe'])) && 
	(!isset($_GET['type']) || empty($_GET['type'])) ){
	
	$req = $db -> prepare('SELECT * FROM cartes ORDER BY cout, nom ASC');
	$req -> execute();
	
} else if(isset($_GET['classe']) && empty($_GET['type'])) {
	
	$classe = htmlspecialchars($_GET['classe']);
	$req = $db -> prepare('SELECT * FROM cartes WHERE classe = ? ORDER BY cout, nom ASC');
	$req -> execute(array($classe));
} else if(isset($_GET['type']) && empty($_GET['classe'])) {
	
	$type = htmlspecialchars($_GET['type']);
	
	if($type == "sort"){
		$type = 0;
	} else if ($type == "creature"){
		$type = 1;
	} else {
		$type = 2;
	}
	$req = $db -> prepare('SELECT * FROM cartes WHERE type = ? ORDER BY cout, nom ASC');
	$req -> execute(array($type));
	
} else {
	
	$classe = htmlspecialchars($_GET['classe']);
	$type = htmlspecialchars($_GET['type']);
	
	if($type == "sort"){
		$type = 0;
	} else if ($type == "creature"){
		$type = 1;
	} else {
		$type = 2;
	}
	$req = $db -> prepare('SELECT * FROM cartes WHERE classe = ? AND type = ? ORDER BY cout, nom ASC');
	$req -> execute(array($classe,$type));
}
?>