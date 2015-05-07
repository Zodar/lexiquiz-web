<?php
	include('../db.php');

	if(isset($_POST['searchTermsAuteur'])){
		$req = htmlspecialchars($_POST['searchTermsAuteur']);
		$sql = "SELECT * FROM quiz WHERE auteur LIKE '%" . $req . "%' LIMIT 10";
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
