<?php

	include("header.php");
	if($_SESSION['droits']>0){
		try{
			include_once("db.php");
			$db= new PDO('mysql:host='.$host.';dbname='.$db_NAME,$user,$mdp);
			
			$classe = htmlspecialchars($_GET['classe']);
			$_SESSION['classe'] = $classe;
			$req = $db -> prepare('SELECT * FROM cartes WHERE classe = ? OR classe = "Neutre" ORDER BY classe, cout, nom ASC');
			$req -> execute(array($classe));
			
			$recup = $db->prepare('SELECT * from lien WHERE deck_id = ?');
			$recup -> execute(array($_SESSION['deck_id']));
			$totcount = $recup -> rowCount();
			
			if($totcount == 30){
				?>
					<div class="text-center">
						<span>VOTRE DECK A ETE CREE </span>
					</div>
				<?php
			}
			
			if(isset($_GET['prevcard'])){
				
				$previous = htmlspecialchars($_GET['prevcard']);
				
				$card = $db->prepare('SELECT * from lien WHERE deck_id = ? AND carte_id = ?');
				$card -> execute(array($_SESSION['deck_id'], $previous));
				$cardcount = $card -> rowCount();

			}
			
			
			
			?>
			
			<div>
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>Nom</th>
							<th>Coût</th>
							<th>Type</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="ici">
						
					</tbody>
				</table>
			</div>
			
			
			
			
			<div class="row all-image"><?php
			while($data = $req -> fetch()) {
				?>
					<div class=" col-sm-3 image-design">
						<?php 
							echo '<img id="'.$data['carte_id'].'" class="center-block allcartes" src="'.$data['image'].'">';
							if($totcount < 30){
								?> <div class="text-center"> <?php
								echo '<a href="add.php?carte_id='.$data['carte_id'].'">Ajouter au deck</a>' ;
								?> </div> <?php
							}
							
							
						?>
					</div>
					<script>
						
						
					</script>
						
				<?php
			}
				
				
		} catch (Exception $e) {
			echo 'Erreur de connexion'.$e;
		}
	} else {
		header("Location: connexion.php");
	}
?>
