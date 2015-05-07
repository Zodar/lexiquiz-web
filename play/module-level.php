<?php
	include("../db.php");
	
	if(isset($_POST["level"])) $level = $_POST["level"];
	if(isset($_POST["idQuiz"])) $idQuiz = $_POST["idQuiz"];
	if(isset($_POST["idQuestion"])) $idQuestion = $_POST["idQuestion"];
	if(isset($_SESSION["idConnexion"])) $idUser = $_SESSION["idConnexion"];

	if(isset($idUser) && isset($idQuestion) && isset($idQuiz)){
		$sql = "SELECT * FROM progression WHERE idQuestion = '$idQuestion' AND idUser = '$idUser'";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)){
			while($row = mysql_fetch_assoc($result)){
				$sql2 = "UPDATE progression SET level = '$level' WHERE idQuestion = '$idQuestion' AND idUser = '$idUser'";
				$result2 = mysql_query($sql2);
			}
		}
		else{
			$sql3 = "INSERT INTO progression VALUES ('$idUser', '$idQuiz', '$idQuestion', '$level')";
			$result3 = mysql_query($sql3);		
		}
		echo "ok";
	}
	else{
		echo "nok";
	}
?>
