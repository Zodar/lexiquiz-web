<?php
	include("../../db.php");
	include("../../lib/include/header.html");
	include("../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$idQuiz = $_GET['idQuiz'];
	$_SESSION['idQuiz'] = $idQuiz;
	$sql = "SELECT * FROM quiz WHERE idUser = '$idUser' AND idQuiz = '$idQuiz'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="container cursive black">
				<h1 class="textAlignCenter seashell"> Modifier "<?php echo $titre; ?>"</h1>
				<div class="row">
					<a href="titre/titre.php" class="menuBtn btn-danger"> Titre </a>
				</div>
				<div class="row">
					<a href="questions/questions.php" class="menuBtn btn-primary"> Questions </a>
				</div>
				<div class="row">
					<a href="icon/icon.php " class="menuBtn btn-warning"> Image </a>
				</div>
			</div>
<?php
		}
	}
	include("../../lib/include/footer.html");
?>
