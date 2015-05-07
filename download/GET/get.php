<?php
	include('../../db.php');

/*
 *
 * OBTENTION DE TOUTES LES QUESTIONS D'UN QUIZ PAR SON IDQUIZ
 *
 */
if(isset($_GET["id"]))
{
		$sql = "SELECT * FROM questions WHERE idQuiz=" . $_GET["id"];
		$result = mysql_query($sql);
		$json = array();

		if(mysql_num_rows($result))
		{
			while($row = mysql_fetch_assoc($result))
			{
				$json['questions'][]=$row;
			}
		}
		mysql_close($con);
		echo json_encode($json);
}
/*
 *
 * OBTENTION D'UN QUIZ PAR SON ID ( AVEC LIKE %ID% )
 *
 */
else if(isset($_GET["TriId"]))
{
		$sql = "SELECT * FROM quiz WHERE idQuiz=" . $_GET["TriId"] . " OR idQuiz LIKE '%" . $_GET["TriId"] . "%' LIMIT 50";
		$result = mysql_query($sql);
		$json = array();

		if(mysql_num_rows($result))
		{
			while($row = mysql_fetch_assoc($result))
			{
				$json['quiz'][]=$row;
			}
		}
}
/*
 *
 * OBTENTION D'UN QUIZ PAR SON TITRE ( AVEC LIKE %TITRE% )
 *
 */
else if(isset($_GET["TriTitre"]))
{
	$sql = "SELECT * FROM quiz WHERE titre='" . $_GET["TriTitre"] . "' OR titre LIKE '%" . $_GET["TriTitre"] . "%' LIMIT 50";
}
/*
 *
 * OBTENTION D'UN QUIZ PAR SON AUTEUR ( AVEC LIKE %AUTEUR% )
 *
 */
else if(isset($_GET["TriAuteur"]))
{
	$sql = "SELECT * FROM quiz WHERE auteur='" . $_GET["TriAuteur"] . "' OR auteur LIKE '%" . $_GET["TriAuteur"] . "%' LIMIT 50";
}
/*
 *
 * OBTENTION DES QUIZ LES PLUS RECENTS
 *
 */
else if(isset($_GET["TriDate"]))
{
	if($_GET["TriDate"] == 1)
	{
		$sql = "SELECT * FROM quiz ORDER BY dateCreation ASC LIMIT 50";
	}
	else
	{
		$sql = "SELECT * FROM quiz ORDER BY dateCreation DESC LIMIT 50";
	}
}
/*
 *
 * OBTENTION DE TOUS LES QUIZ DE LA BASE
 *
 */
else{
	$sql = "SELECT * FROM quiz LIMIT 200";
}

$result = mysql_query($sql);
$json = array();
if(mysql_num_rows($result))
{
	while($row = mysql_fetch_assoc($result))
	{
		$json['quiz'][]=$row;
	}
}
mysql_close($con);
echo json_encode($json);

?>
