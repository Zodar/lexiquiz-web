<?php
	include("../../db.php");

	if(isset($_POST['idQuiz'])){
		$idQuiz = htmlspecialchars($_POST['idQuiz']);

		$sql = "DELETE FROM questions WHERE idQuiz = '$idQuiz'";
		$result = mysql_query($sql);

		$sql = "DELETE FROM quiz WHERE idQuiz = '$idQuiz'";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
