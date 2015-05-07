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
				<a href="../connexion/inscription.php" class="menuBtn btn-danger"> Inscription </a>
			</div>
			<div class="row">
				<a href="../connexion/connect.php" class="menuBtn btn-primary"> Connexion </a>
			</div>
		</div>
<?php
	include("../lib/include/footer.html");
?>

