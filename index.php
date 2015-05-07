<?php
	include("db.php");
	include("lib/include/header.html");
	include("lib/include/navbar.php");
?>

	<div class="container cursive black">
		<div class="row">
			<a href="play/play.php" class="menuBtn btn-danger"> Jouer </a>
		</div>

		<div class="row">
			<a href="gerer" class="menuBtn btn-primary"> Mes quiz </a>
		</div>

		<div class="row">
			<a href="publication/publication.php" class="menuBtn btn-warning"> Publier un quiz </a>
		</div>
	</div>

<?php
	include("lib/include/footer.html");
?>
