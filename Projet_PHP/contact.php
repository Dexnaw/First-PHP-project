 <?php
	include("header.php");
	
	if(isset($_POST['mailform'])){
		 
		if(!empty($_POST['nom']) && !empty($_POST['mail']) &&!empty($_POST['message'])){
			
			
			$nom = htmlspecialchars($_POST['nom']);
			$mail = htmlspecialchars($_POST['mail']);
			$message = htmlspecialchars($_POST['message']);
			
			$header="MINE-Version: 1.0\r\n";
			$header.='From:"Wanxed.com"'."\n";
			$header.='Content-Type:text/html; charset="utf-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';
		
			$mailmessage='
			<html>
				<body>
					<div align="center">
						<u>Nom de l\'expéditeur : '.$nom.'</u><br />
						<u>Mail de l\'expéditeur : '.$mail.'</u><br />
						<br />
						'.nl2br($message).'
					</div>
				</body>
			</html>
			';
			mail("wanxed.arnaud@gmail.com", "Contact - user : ".$nom,$mailmessage, $header);
			$advertise = "votre message a bien été envoyé";
		} else {
			
			$advertise = "Tous les champs doivent être complétés !";
			
		}
		
	 }
 ?>
	<div class="row">
		<div class="text-center">
			<h2>Formulaire de contact !</h2>
		</div>
	</div>
	<br/>
	<div class="col-sm-12">
		<form method="POST" action="">
			<input class="center-block" type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])){ echo $_POST['nom']; } ?>"/> <br /><br />
			<input class="center-block" type="mail" name="mail" placeholder="Votre mail" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; } ?>"/> <br /><br />
			<textarea class="center-block" rows="15" cols="80" name="message" placeholder="Votre message"><?php if(isset($_POST['message'])){ echo $_POST['message']; } ?></textarea><br /><br />
			<input class="center-block" type="submit" value="Envoyer" name="mailform"/>
		</form>
		<?php 
			if(isset($advertise)){
				echo $advertise;
			}
		?> 
	</div