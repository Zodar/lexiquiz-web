<?php
	include("../../db.php");

	if(isset($_POST['titre'])){
		$titre = htmlspecialchars($_POST['titre']);
		$idUser = $_SESSION['idConnexion'];
		$auteur = $_SESSION['pseudoConnexion'];

		$sql = "INSERT INTO quiz VALUES(default, 0, $idUser, '$titre', '$auteur', 'icones/smallShare.png', '".date('Y-m-d G:i:s')."', 0)";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	echo $result;
?>
