<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$sql = "SELECT * FROM connexion WHERE idUser = '$idUser'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
		<div class="container cursive">
				<h1 class="textAlignCenter seashell"> <?php echo $pseudo; ?> </h1>
			<div class="black inputInscription">

				<div class="row">
					<span class="seashell col-md-offset-4 col-md-2"> Pseudo:</span>
					<input name="pseudo" type="text" class="pseudo">
					<span class="click-modify-pseudo black btn btn-warning" data-toggle="modal" data-target="#myModal"> Modifier pseudo </span>
				</div>

				<div class="row">
					<span class="seashell notif notifpseudo col-md-offset-6"> </span>
				</div>

				<div class="row">
					<span class="seashell col-md-offset-4 col-md-2"> Nouveau mot de passe:</span>
					<input name="mdp" type="password" class="mdp">
				</div>

				<div class="row">
					<span class="seashell notif notifmdp col-md-offset-6"> </span>
				</div>

				<div class="row">
					<span class="seashell col-md-offset-4 col-md-2"> Confirmer nouveau mot de passe:</span>
					<input name="mdp2" type="password" class="mdp2">
					<span class="click-modify-mdp black btn btn-warning" data-toggle="modal" data-target="#myModal"> Modifier mot de passe </span>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"> Retour </span></button>
						<h4 class="modal-title" id="myModalLabel"> </h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<span class="notif notifpseudo"> </span>
						</div>
						<div class="row">
							<span class="notif notifmdp"> </span>
						</div>
						<div class="hideOnStart">
							<div class="row">
								<span> Pour une question de sécurité, vous devez entrer votre mot de passe actuel: </span>
							</div>
							<div class="row">
								<input id="oldMdp" class="notif notifmdp col-md-offset-4" type='password'/>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"> Retour </button>
						<button type="button" class="btn btn-primary hideOnStart save"> Sauvegarder </button>
					</div>
				</div>
			</div>
		</div>

		<script src="profil.js"> </script>
<?php
		}
	}
	include("../lib/include/footer.html");
?>
