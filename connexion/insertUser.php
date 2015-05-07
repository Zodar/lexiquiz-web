<?php
	include("../db.php");

	if(isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['pseudo'])){
		$mail = htmlspecialchars($_POST['mail']);
		$mdp = htmlspecialchars($_POST['mdp']);
		$pseudo = htmlspecialchars($_POST['pseudo']);

		$sql = "INSERT INTO connexion(mail, mdp, pseudo) VALUES('$mail', PASSWORD('$mdp'), '$pseudo')";
		$result = mysql_query($sql);
	}

	mysql_close($con);
	$to = 'To: '.$mail;
	$subject = "LexiQuiz: Bienvenue là où l'on apprend des choses !";
	$body = "Bonjour '$pseudo',\n L'équipe de LexiQuiz est heureuse de vous accueillir afin de vous apprendre des choses en vous amusant.\n"
					."Vous pouvez jouer à LexiQuiz en vous rendant à l'adresse: http://lexiquiz.alwaysdata.net ou en téléchargeant l'application sur vos smartphones. \n"
					."LexiQuiz va vous permettre de mémoriser de façon ludique toute sorte de chose.\n"
					."Vous pouvez également aider la communauté LexiQuiz à croître en proposant vos propres quiz, peut importe le thème."
					."\n \n Le savoir est à la portée de tous. LexiQuiz vous aide à vous en approcher."
					."\n \n Dans l'espoir de vous apprendre des choses ;) \n Tarik Merabet";
	$from = 'From: lexiquiz@outlook.com';
	$body = wordwrap($body, 1000, "\r\n");
	if(mail($to, $subject, $body, $from)){
		echo "Envoi du mail réussi \n";
	}
	echo $result;
?>
