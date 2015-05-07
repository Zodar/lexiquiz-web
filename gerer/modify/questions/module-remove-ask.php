<?php
	include("../../../db.php");

	if(isset($_POST['idQuestion'])){
		$idQuestion = htmlspecialchars($_POST['idQuestion']);

		$sql = "DELETE FROM questions WHERE idQuestion = '$idQuestion'";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
