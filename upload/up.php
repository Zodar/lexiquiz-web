<?php

	include('../db.php');

	if(isset($_POST["json"]))
	{
		$json = json_decode($_POST["json"]);

		/***
		 *
		 * QUIZ
		 *
		 ****/
		if(isset($json->quiz->titre)) $titre = $json->quiz->titre; else $titre = "ND.";
		if(isset($json->quiz->auteur)) $auteur = $json->quiz->auteur; else $auteur = "ND.";
		if(isset($json->quiz->img)) $img = $json->quiz->img; else $img = "ND.";

		/***
		 *
		 * REQUETES SQL
		 *
		 ****/
		$img = "icones/smallShare.png";
		$sql = "INSERT INTO quiz VALUES(default, '$titre', '$auteur', '$img', '".date('Y-m-d G:i:s')."')";
		$result = mysql_query($sql);

		$nb = mysql_query("SELECT LAST_INSERT_ID() LIMIT 1");
		$idNewQuiz;
		while ($row = mysql_fetch_array($nb, MYSQL_NUM)) {
			 $idNewQuiz = $row[0];
		}

		/***
		 *
		 * QUESTIONS
		 *
		 ****/

		 $state = 0;

		 if(isset($json->listQuestions))
		 {
			$listQuestions = $json->listQuestions;

			 if(isset($json->quiz->nbQuestions)){
					$nbQuestions = $json->nbQuestions;

					foreach($listQuestions as $value){
						$enonce = $value->enonce;
						$reponse = $value->reponse;
						$sqlQuestions = "INSERT INTO questions VALUES(default, '$idNewQuiz', '$enonce', '$reponse', 1)";
						$resultQuestions = mysql_query($sqlQuestions);
					}
					//$enonce = $listQuestions[0]->enonce;
				 }
			}

		echo json_encode("#" . $idNewQuiz);
	}
/*
	{
    "quiz": {
        "auteur": "TARIK OUESH",
        "titre": "Ce quiz est un test"
    },
    "listQuestions": [
        {
            "reponse": "Joute",
            "enonce": "HenriII"
        },
        {
            "reponse": "Fontainebleau",
            "enonce": "Napoleon"
        },
        {
            "reponse": "Yo",
            "enonce": "troisiemeTest"
        }
    ]
	}
*/

?>
