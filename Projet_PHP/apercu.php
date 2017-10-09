
	
<?php

    include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp, /*suite pour afficher les accents*/array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			
			
			if(isset($_POST['retour'])){
				header('Location: cartes.php');
			}
			
			
			$req = $db -> prepare('SELECT * FROM cartes WHERE carte_id = :carte_id');
			$req -> bindValue('carte_id', $_GET['carte_id']);
			$req -> execute();
			$data = $req -> fetch();
			
			$rare="";
			
			if($data['type'] == 0){
				$data['type'] = "Sort";
			} else if ($data['type'] == 1){
				$data['type'] = "Créature";
			} else if ($data['type'] == 2){
				$data['type'] = "Arme";
			} else {
				echo 'Probleme dans la base de donnée sur le TYPE';
			}
			
			if($data['poussieres'] == 0){
				$rare = "Base";
			} else if ($data['poussieres'] == 40){
				$rare = "Commune";
			} else if ($data['poussieres'] == 100){
				$rare = "Rare";
			}else if ($data['poussieres'] == 400){
				$rare = "Epique";
			}else if ($data['poussieres'] == 1600){
				$rare = "Légendaire";
			} else {
				echo 'Probleme dans la base de donnée sur la poussieres';
			}
			?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-2">
					<img class="center-block allcartes" id="aper" src="<?php echo $data['image']?>">	
				</div>
				<div class="col-sm-3">
				
					<p class="left caract">
						<strong>Nom : <?php echo $data['nom']?> <br/></strong>
						<strong>Type : <?php echo $data['type']?> <br/></strong>
						<strong>Classe : <?php echo $data['classe']?> <br/></strong>
						<strong>rarete : <?php echo $rare?> <br/></strong>
						<strong>Mana <img src="img/mana.png" id="dust" alt="dust"> : <?php echo $data['cout']?> <br/></strong>
						<strong><img src="img/dust.png" id="dust" alt="dust"> : <?php echo $data['poussieres']?> <br/></strong>
					</p>
				</div>
			</div>
			<br /><br /><br />
			<div>
				<form method="POST" action="apercu.php">
					<input class="center-block" type="submit" name="retour" value="retour"/>
				</form>
			</div>
		<?php
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
	} else {
		header("Location: connexion.php");
	}
?>