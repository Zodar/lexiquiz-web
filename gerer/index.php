<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])) header('location: http://lexiquiz.alwaysdata.net/connexion');
?>
	<div class="container cursive black">
		<h1 class="textAlignCenter seashell"> Mes quiz </h1>
		<div class="row">
			<a href="create/create-quiz.php" class="menuBtn btn-danger"> Créer un quiz </a>
		</div>
		<div class="row">
			<a href="modify/modify-quiz.php" class="menuBtn btn-primary"> Modifier un quiz </a>
		</div>
		<div class="row">
			<a href="remove/remove-quiz.php" class="menuBtn btn-warning"> Supprimer un quiz </a>
		</div>
	</div>
<?php
	include("../lib/include/footer.html");
?>
