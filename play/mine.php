<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");
?>
		<div class="container cursive">
<?php
	if(!isset($_SESSION['idConnexion'])) header('location: http://lexiquiz.alwaysdata.net/connexion');

	$idUser = $_SESSION['idConnexion'];
	$sql = "SELECT * FROM quiz WHERE idUser = '$idUser'";
	$result = mysql_query($sql);
?>
			<h1 class="textAlignCenter seashell"> Mes quiz </h1>

<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="turquoiseBg quiz">
				<img class="iconQuizSearch centrer-image" alt="icon" src="<?php echo $icon; ?>">
				<div class="margin-left-2 row">
					<span class="bold"> <?php echo "Titre: $titre"; ?> </span>
				</div>
				<div class="margin-left-2 row">
					<span> <?php echo "Auteur: $auteur"	; ?> </span>
				</div>
				<div class="margin-left-2 row">
					<span> <?php echo "Quiz: #$idQuiz"; ?> </span>
				</div>
				<a href="questions.php?idQuiz=<?php echo $idQuiz;?>" class="btn-module"> Jouer </a>
			</div>
<?php
		}
	}
?>
		</div>
		<script src="search.js"> </script>
<?php
	mysql_close($con);
	include("../lib/include/footer.html");
?>
