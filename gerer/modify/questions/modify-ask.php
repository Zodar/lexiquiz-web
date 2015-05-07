<?php
	include("../../../db.php");
	include("../../../lib/include/header.html");
	include("../../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$idQuiz = $_SESSION['idQuiz'];
	$sql = "SELECT * FROM questions WHERE idQuiz = '$idQuiz'";
	$result = mysql_query($sql);
?>
		<div class="container cursive">
		<h1 class="textAlignCenter seashell"> Modifier une question </h1>
<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="turquoiseBg question" >
				<div class="row margin-left-2">
					<span class="enonce bold"> <?php echo $enonce; ?> </span>
				</div>
				<div class="row margin-left-2">
					<span class="reponse"> <?php echo $reponse; ?> </span>
				</div>
				<a href="form-modify.php?idQuestion=<?php echo $idQuestion;?>" id="<?php echo $idQuestion;?>" class="btn-module" > Modifier </a>
			</div>
<?php
		}
	}else{
?>
			<p class="well textAlignCenter">Vous n'avez pas encore créer de questions.</p>
<?php
	}
?>
		</div>
<?php
	mysql_close($con);
	include("../../../lib/include/footer.html");
?>
