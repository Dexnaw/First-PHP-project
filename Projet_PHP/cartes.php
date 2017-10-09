<?php

    include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			
			include("filtre.php");
				
				?>
				<div class="row">
					<div class="text-center">
						<form method="GET" action="cartes.php">
							<select name="classe">
								<option value="">toutes les cartes</option>
								<option value="chaman">Chaman</option>
								<option value="chasseur">Chasseur</option>
								<option value="demoniste">Démoniste</option>
								<option value="Druide">Druide</option>
								<option value="guerrier">Guerrier</option>
								<option value="mage">Mage</option>
								<option value="paladin">Paladin</option>
								<option value="pretre">Prêtre</option>
								<option value="voleur">Voleur</option>
								<option value="neutre">Neutre</option>
							</select>
							<select name="type">
								<option value="">toutes les types</option>
								<option value="sort">Sorts</option>
								<option value="creature">Créatures</option>
								<option value="arme">Armes</option>
							</select>
							<input type="submit" value="filtrer">
						</form>
					</div>
		</div>
				<div id="content">
				
				<?php
				
				while($data = $req -> fetch()) {
					
						if($data['type'] == 0){
							$data['type'] = "Sort";
						} else if ($data['type'] == 1){
							$data['type'] = "Créature";
						} else if ($data['type'] == 2){
							$data['type'] = "Arme";
						} else {
							echo 'Probleme dans la base de donnée sur le TYPE';
						}
						?>
						
							<div class="row col-md-4 all-image">
								<div class="image-design">
									<a href="apercu.php?carte_id=<?php echo $data['carte_id'];?>"><img class="center-block allcartes" src="<?php echo $data['image']?>"></a>
								</div>
							</div>
						
						<?php
				} ?>
				</div>
			<?php	
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
	} else {
		header("Location: connexion.php");
	}
 ?>
 
 
 