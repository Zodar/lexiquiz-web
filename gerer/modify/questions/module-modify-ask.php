<?php
	include("../../../db.php");

	if(isset($_POST['enonce'])){
		$enonce = htmlspecialchars($_POST['enonce']);
		$enonce = addslashes($enonce);
		$enonce = trim($enonce);

		$reponse = htmlspecialchars($_POST['reponse']);
		$reponse = addslashes($reponse);
		$reponse = trim($reponse);

		$idQuestion = $_POST['idQuestion'];

		$sql = "UPDATE questions SET enonce = '$enonce', reponse = '$reponse' WHERE idQuestion = '$idQuestion'";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
