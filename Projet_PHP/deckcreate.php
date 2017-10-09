<?php 
	include("header.php");
	if($_SESSION['droits']>0){
?>
<div class="row">
	<div class="text-center">
		<form method="POST" action="deckvalidate.php">
			<input type="text" name="nom" placeholder="Nom du deck"/>
			<label>Selectionnez une classe :</label>
			<select name="classe">
				<option value="chaman">Chaman</option>
				<option value="chasseur">Chasseur</option>
				<option value="demoniste">Démoniste</option>
				<option value="Druide">Druide</option>
				<option value="guerrier">Guerrier</option>
				<option value="mage">Mage</option>
				<option value="paladin">Paladin</option>
				<option value="pretre">Prêtre</option>
				<option value="voleur">Voleur</option>
			</select>
			<input type="submit" value="Commencer!">
		</form>
	</div>
</div>
<?php 
	} else {
		header("Location: connexion.php");
	}
?>