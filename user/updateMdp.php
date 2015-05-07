<?php
	include("../db.php");

	if(isset($_POST['mdp'])){
		$mdp = htmlspecialchars($_POST['mdp']);
		$mdp = addslashes($mdp);
		$mdp = trim($mdp);

		$idUser = $_SESSION['idConnexion'];
		$oldMdp = $_POST['oldMdp'];
		$sqlVerif = "SELECT * FROM connexion WHERE idUser = '$idUser' AND mdp = PASSWORD('$oldMdp')";
		$resultVerif = mysql_query($sqlVerif);
		$bonMdp = false;
		if(mysql_num_rows($resultVerif)){
			while($row = mysql_fetch_assoc($resultVerif)){
				$bonMdp = true;
			}
		}
		if(!$bonMdp){
			mysql_close($con);
			echo "pb mdp";
		} else{
			$sql = "UPDATE connexion SET mdp = PASSWORD('$mdp') WHERE idUser = '$idUser'";
			$result = mysql_query($sql);
			mysql_close($con);
			echo $result;
		}
	}
?>
