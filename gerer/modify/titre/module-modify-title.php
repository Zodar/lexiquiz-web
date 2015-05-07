<?php
	include("../../../db.php");

	if(isset($_POST['titre'])){
		$titre = htmlspecialchars($_POST['titre']);
		$titre = addslashes($titre);
		$titre = trim($titre);

		$idUser = $_SESSION['idConnexion'];
		$idQuiz = $_SESSION['idQuiz'];

		$sql = "UPDATE quiz SET titre = '$titre' WHERE idQuiz = '$idQuiz' AND idUser = '$idUser'";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
