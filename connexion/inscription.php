<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");

	if(isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net');
	}
?>
	<div class="container cursive">
		<div class="black inputInscription">

			<div class="row">
				<span class="seashell col-md-offset-4 col-md-2"> Adresse mail: </span>
				<input name="mail" type="email" class="mail">
				<span href="oubli.php" class="lienOubli btn btn-warning hideOnStart"> Mot de passe oublié </span>
			</div>

			<div class="row">
				<span class="seashell notif notifmail col-md-offset-6"> </span>
			</div>

			<div class="row">
				<span class="seashell col-md-offset-4 col-md-2"> Mot de passe:</span>
				<input name="mdp" type="password" class="mdp">
			</div>

			<div class="row">
				<span class="seashell notif notifmdp col-md-offset-6"> </span>
			</div>

			<div class="row">
				<span class="seashell col-md-offset-4 col-md-2"> Confirmer le mot de passe:</span>
				<input name="mdp2" type="password" class="mdp2">
			</div>

			<div class="row">
				<span class="seashell notif notifmdp2 col-md-offset-6"> </span>
			</div>

			<div class="row">
				<span class="seashell col-md-offset-4 col-md-2"> Pseudo:</span>
				<input name="pseudo" type="text" class="pseudo">
			</div>

			<div class="row">
				<span class="seashell notif notifpseudo col-md-offset-6"> </span>
			</div>

			<div class="row">
				<input value="Inscription" type="submit" class="insClic col-md-1 col-md-offset-6">
			</div>
		</div>
	</div>
	<script src="inscription.js"> </script>
<?php
	include("../lib/include/footer.html");
?>
