<?php 

	include("header.php");
	
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			
			$req = $db -> prepare('SELECT * FROM deck');
			$req -> execute();
			
			
		?>
		<div align="center">
			<form method="POST" action="deckcreate.php">
				<input type="submit" name="create" value="Créer un deck"/>
			</form>
		</div>
		<div>
		<?php
			while($data = $req -> fetch()) {
				
				$req2 = $db -> prepare("SELECT pseudo, user_id FROM users WHERE user_id = ?");
				$req2 -> execute(array($data['user']));
				$donnee = $req2 -> fetch();
				?>
				<ul>
					<li>Nom du deck : <?php 
					echo $data['nom']; 
					if(($donnee['user_id'] == $_SESSION['user_id']) || $_SESSION['droits']==2){
						?>
							-<a href="deckdel.php?deck_id=<?php echo $data['deck_id']?>"> Supprimer</a>
						<?php
					}?> - <a href="apercudeck?deck_id=<?php echo $data['deck_id']?>"> Voir </a></li>
					<ul>
						<li>Classe : <?php echo $data['classe'];?></li>
						<li>Auteur : <?php echo $donnee['pseudo'];?></li>
						<!--<li>Coût total :--><?php //echo $donnee['pseudo'];?><!--</li>-->
					</ul>
				</ul>
			<?php	
			}
		?>
			
		</div>
		
		
		<?php	
			
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
	} else {
		header("Location: connexion.php");
	}
?>