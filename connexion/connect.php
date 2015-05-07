<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");

	if(isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net');
	}
?>
	<div class="container cursive black">
		<div class="row">
			<span class="seashell col-md-offset-4 col-md-2"> Adresse mail: </span>
			<input name="mail" type="email" class="mail">
		</div>

		<div class="row">
			<p class="seashell notif notif-mail col-md-offset-6"> </p>
		</div>

		<div class="row">
			<span class="seashell col-md-offset-4 col-md-2"> Mot de passe:</span>
			<input name="mdp" type="password" class="mdp">
		</div>

		<div class="row">
			<span class="seashell notif notif-mdp col-md-offset-6"> </span>
		</div>

		<div class="row">
			<input value="Connexion" type="submit" class="click-connexion col-md-1 col-md-offset-6">
		</div>
	</div>
	<script src="connect.js"> </script>
<?php
	include("../lib/include/footer.html");
?>
