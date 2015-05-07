<?php
	include("../db.php");

	if(isset($_POST['idQuiz'])){
		$idQuiz = htmlspecialchars($_POST['idQuiz']);

		$sql = "UPDATE quiz SET public = 1 WHERE idQuiz = '$idQuiz'";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
