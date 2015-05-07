<?php
	include("../db.php");

	if(isset($_POST['pseudo'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$pseudo = addslashes($pseudo);
		$pseudo = trim($pseudo);

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
			$sql = "UPDATE connexion SET pseudo = '$pseudo' WHERE idUser = '$idUser'";
			$result = mysql_query($sql);
			mysql_close($con);
			$_SESSION["pseudoConnexion"] = $pseudo;
			echo $result;
		}
	}
?>
