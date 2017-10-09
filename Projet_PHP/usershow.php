 <?php

	include("header.php");
	if($_SESSION['droits']>0){
		if($_SESSION['droits']!=2){
			header("Location: redirection.php");
		} else {
		
			try {
				include_once("db.php");
				$db = new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			} catch (Exception $e){
				echo 'erreur de connexion a la db'.$e;
			}
			
			if(isset($_GET['update']) && !empty($_GET['update'])){
				
				$update = (int) $_GET['update'];
				
				header('Location: usermod.php?user_id='.$update);
				
			}
			
			if(isset($_GET['ban']) && !empty($_GET['ban'])){
				
				$ban = (int) $_GET['ban'];
				
				$req = $db->prepare('UPDATE users SET droits = 3 WHERE user_id = ?');
				$req->execute(array($ban));
			}
			if(isset($_GET['unban']) && !empty($_GET['unban'])){
				
				$unban = (int) $_GET['unban'];
				
				$req = $db->prepare('UPDATE users SET droits = 1 WHERE user_id = ?');
				$req->execute(array($unban));
			}
			if(isset($_GET['upgrade']) && !empty($_GET['upgrade'])){
				
				$upgrade = (int) $_GET['upgrade'];
				
				$req = $db->prepare('UPDATE users SET droits = 2 WHERE user_id = ?');
				$req->execute(array($upgrade));
			}
			if(isset($_GET['downgrade']) && !empty($_GET['downgrade'])){
				
				$downgrade = (int) $_GET['downgrade'];
				
				$req = $db->prepare('UPDATE users SET droits = 1 WHERE user_id = ?');
				$req->execute(array($downgrade));
			}
			
			$membres = $db -> query('SELECT * FROM users');
			
			
			
	?>
	<div>
		<h2 align="center"> Liste des utilisateurs</h2>
		<?php while($m = $membres->fetch()) { ?>
		
		<ul>
			<li><?php echo $m['pseudo']; ?> - <?php if($m['droits'] == 1) { ?> 
				<a href="usershow.php?ban=<?= $m['user_id'] ?>">Bannir</a> - <?php } if($m['droits'] == 3) { ?> 
				<a href="usershow.php?unban=<?= $m['user_id'] ?>">Débannir</a> - <?php } ?>
				<a href="usershow.php?update=<?= $m['user_id'] ?>">Modifer</a> 
				<?php if($m['droits']< 2) { ?> - <a href="usershow.php?upgrade=<?= $m['user_id'] ?>">Elire comme modérateur</a><?php } ?>
				<?php if($m['droits']== 2) { ?> - <a href="usershow.php?downgrade=<?= $m['user_id'] ?>">retirer droits admin</a><?php } ?>
				<ul>
					<li>Nom : <?php echo $m['nom']; ?></li>
					<li>Prénom : <?php echo $m['prenom']; ?></li>
					<li>Mail : <?php echo $m['mail']; ?></li>
					<li>Droits : <?php echo $m['droits']; ?></li>
					<li>ID : <?php echo $m['user_id']; ?></li>
				</ul>
			</li>
		</ul>
		<?php } ?>
	</div>
	<?php
		}
	} else {
		header("Location: connexion.php");
	}
	?>