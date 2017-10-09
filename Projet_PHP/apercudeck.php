<?php 

	include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			
			$req = $db -> prepare('SELECT * FROM cartes INNER JOIN lien ON lien.carte_id = cartes.carte_id WHERE lien.deck_id = ? ORDER BY cout, nom ASC');
			$req -> execute(array($_GET['deck_id']));
			
		?>
		<div>
		<?php
		while($cards = $req-> fetch()){
				
				?>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2">
						<img class="center-block allcartes aper" src="<?php echo $cards['image']?>">
					</div>
					<div class="col-sm-3">
					
						<p class="left caract">
							<strong>Nom : <?php echo $cards['nom']?> <br/></strong>
							<strong>Type : <?php echo $cards['type']?> <br/></strong>
							<strong>Classe : <?php echo $cards['classe']?> <br/></strong>
							<strong>Mana <img src="img/mana.png" id="dust" alt="dust"> : <?php echo $cards['cout']?> <br/></strong>
							<strong><img src="img/dust.png" id="dust" alt="dust"> : <?php echo $cards['poussieres']?> <br/></strong>
						</p>
					</div>
				</div>
				
				<br />
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