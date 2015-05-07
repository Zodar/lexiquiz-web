<?php
	include('../db.php');

	if(isset($_POST['searchTermsQuiz'])){
		$req = htmlspecialchars($_POST['searchTermsQuiz']);
		$sql = "SELECT * FROM quiz WHERE idQuiz =" . $req . " LIMIT 10";
		$result = mysql_query($sql);
		$json = array();

		if(mysql_num_rows($result)){
			while($row = mysql_fetch_assoc($result)){
				$json['quiz'][]=$row;
			}
		}
	}

	mysql_close($con);
	echo json_encode($json);
?>
