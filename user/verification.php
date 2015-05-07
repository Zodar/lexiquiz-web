<?php
	include("../db.php");

	if(isset($_POST['pseudo'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$pseudo = addslashes($pseudo);
		$pseudo = trim($pseudo);

		$sql = "SELECT * FROM connexion WHERE pseudo = '$pseudo' ";
		$result = mysql_query($sql);
		$pbPseudo = "correct";
		if(mysql_num_rows($result)){
			while($row = mysql_fetch_assoc($result)){
				$pbPseudo = "pb pseudo";
			}
		}
	}

	mysql_close($con);
	echo $pbPseudo;
?>
