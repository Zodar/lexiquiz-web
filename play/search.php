<?php
	include("../db.php");

	if(isset($_POST['searchTermsTitre'])){
		$req = htmlspecialchars($_POST['searchTermsTitre']);
		$req = "titre LIKE '%$req%' LIMIT 10";
	} else if(isset($_POST['searchTermsQuiz'])){
		$req = htmlspecialchars($_POST['searchTermsQuiz']);
		$req = "idQuiz = '$req'";
	} else if(isset($_POST['searchTermsAuteur'])){
		$req = htmlspecialchars($_POST['searchTermsAuteur']);
		$req = "auteur LIKE '%$req%' LIMIT 10";
	}

	$sql = "SELECT * FROM quiz WHERE public = 1 AND $req";
	$result = mysql_query($sql);
	$json = array();

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			$json['quiz'][]=$row;
		}
	}
	mysql_close($con);
	echo json_encode($json);
?>
