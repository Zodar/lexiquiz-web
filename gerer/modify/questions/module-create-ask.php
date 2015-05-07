<?php
	include("../../../db.php");

	if(isset($_POST['enonce']) && isset($_POST['reponse'])){
		$enonce = htmlspecialchars($_POST['enonce']);
		$enonce = addslashes($enonce);
		$enonce = trim($enonce);

		$reponse = htmlspecialchars($_POST['reponse']);
		$reponse = addslashes($reponse);
		$reponse = trim($reponse);

		$idQuiz = $_SESSION['idQuiz'];

		$sql = "INSERT INTO questions VALUES(default, $idQuiz, '$enonce', '$reponse', 1)";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
