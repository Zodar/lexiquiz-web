<?php
	include("../../db.php");
	include("../../lib/include/header.html");
	include("../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$sql = "SELECT * FROM quiz WHERE idUser = '$idUser'";
	$result = mysql_query($sql);
?>
		<div class="container cursive">
			<h1 class="textAlignCenter seashell"> Modifier un quiz </h1>
<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="turquoiseBg quiz">
				<img class="iconQuizSearch centrer-image" alt="icon" src="http://lexiquiz.alwaysdata.net/download/<?php echo $icon; ?>">
				<span class="row">
					<span class="titre col-md-10 bold"> <?php echo $titre; ?> </span>
				</span>
				<a href="menu-modify.php?idQuiz=<?php echo $idQuiz;?>" id="<?php echo $idQuiz;?>" class="btn-module" > Modifier </a>
			</div>
<?php
		}
	}else{
?>
			<p class="well textAlignCenter">Vous n'avez pas encore créer de quiz.</p>
<?php
	}
?>
		</div>
<?php
	mysql_close($con);
	include("../../lib/include/footer.html");
?>
