<?php
	include("../db.php");

	$result1 = "errorVerification";
	$result2 = "doubleerror";

	if(isset($_POST['mail'])){
		if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			echo "mail inv";
			return;
		} else{
			$req = htmlspecialchars($_POST['mail']);
			$sql = "SELECT * FROM connexion WHERE mail = '$req'";
			$result = mysql_query($sql);
			$json = array();
			if(mysql_num_rows($result)){
				while($row = mysql_fetch_assoc($result)){
					$json['mail'][]=$row;
				}
			}
			$result1 = $json['mail'][0];
		}
	}

	if(isset($_POST['pseudo'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$sql2 = "SELECT * FROM connexion WHERE pseudo = '$pseudo' ";
		$res2 = mysql_query($sql2);
		$json2 = array();
		if(mysql_num_rows($res2)){
			while($row2 = mysql_fetch_assoc($res2)){
				$json2['pseudo'][]=$row2;
			}
		}
		$result2 = $json2['pseudo'][0];
	}

	mysql_close($con);
	if($result1 != null) echo "mail existe";
	else if($result2 != null) echo "pb pseudo";
	else echo "correct";
?>
