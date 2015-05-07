<?php
	include("../db.php");

	if(isset($_POST['searchTermsTitre'])){
		$req = htmlspecialchars($_POST['searchTermsTitre']);
		$sql = "SELECT * FROM quiz WHERE titre LIKE '%" . $req . "%' LIMIT 10";
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
