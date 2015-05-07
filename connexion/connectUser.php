<?php
	include("../db.php");
	$return = "erreurs variables non définies";

	if(isset($_POST['mail']) && isset($_POST['mdp'])){
		$mail = htmlspecialchars($_POST['mail']);
		$mdp = htmlspecialchars($_POST['mdp']);
		$sql = "SELECT idUser, mail, pseudo FROM connexion WHERE mail = '$mail' AND mdp = PASSWORD('$mdp')";
		$result = mysql_query($sql);
		$json = array();
		if(mysql_num_rows($result)){
			while($row = mysql_fetch_assoc($result)){
				$json['mail'][]=$row;
			}
			$return = $json['mail'][0];
			
			$_SESSION["idConnexion"] = $return['idUser'];
			$_SESSION["mailConnexion"] = $return['mail'];
			$_SESSION["pseudoConnexion"] = $return['pseudo'];
		} else{
			$return = "mdp inv";
		}
	}

	mysql_close($con);
	echo json_encode($return);
?>
