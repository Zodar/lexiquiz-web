<?php
	include("../db.php");

	$tab = array(
							"Neo",
							"Morpheus",
							"Trinity",
							"Cypher",
							"Tank",
							"Pikachu",
							"Dracaufeu",
							"Florizarre",
							"Tortank",
							"Voldemort",
							"HarryPotter",
							"Hermione",
							"Ron",
							"PeterParker",
							"Venom",
							"Carnage",
							"Wolverine",
							"JustinBieber",
							"TunakTunak",
							"Goku",
							"Broly",
							"RickGrimes",
							"Heisenberg",
							"Stark",
							"Cersei",
							"Arya",
							"TeenWolf",
							"Jesus",
							"Conan",
							"Fatality",
							"Chunlee",
							"Ryu",
							"Joker",
							"Superman",
							"Zelda",
							"Link",
							"Triforce",
							"Fin"
					);
	$characts = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$code_aleatoire = "";
	for($i = 0; $i < 3; $i++){
    $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1);
	}
	$rand_keys = array_rand($tab, 2);
	$t0 = $tab[$rand_keys[0]] . $code_aleatoire . $tab[$rand_keys[1]];
	$t1 = $tab[$rand_keys[1]] . $code_aleatoire . $tab[$rand_keys[0]];
	$tab2 = array($t0, $t1);
	$rand_keys2 = array_rand($tab2, 1);
	$hasard = rand(1, 999);
	$newmdp = $tab2[$rand_keys2] . $hasard;

	if(isset($_POST['mail'])){
		$mail = htmlspecialchars($_POST['mail']);
		$forPseudo = "SELECT pseudo FROM connexion WHERE mail = '$mail'";
		$resultPseudo = mysql_query($forPseudo);
		while($row = mysql_fetch_assoc($resultPseudo)){
			$pseudo = $row["pseudo"];
		}
	} else if(isset($_POST['pseudo'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$forMail = "SELECT mail FROM connexion WHERE pseudo = '$pseudo'";
		$resultMail = mysql_query($forMail);
		while($row = mysql_fetch_assoc($resultMail)){
			$mail = $row["mail"];
		}
	}
	if(isset($_POST['mail']) || isset($_POST['pseudo'])){
		$sql = "UPDATE connexion SET mdp = PASSWORD('$newmdp') WHERE mail = '$mail'";
		$res = mysql_query($sql);

		mysql_close($con);

		$to = 'To: '.$mail;
		$subject = "LexiQuiz: Oubli de mot de passe";
		$body = "Bonjour. \n\nSuite à votre oubli, le mot de passe de votre compte '$pseudo' à été supprimé."
						."\nVous pouvez à présent vous connecter à http://lexiquiz.alwaysdata.net avec le mot de passe ci-dessous. \n \nNouveau mot de passe: $newmdp"
						." \n \nAttention ! Nous vous conseillons vivement de modifier votre mot de passe au plus vite pour des questions de sécurité.";
		$from = 'From: lexiquiz@outlook.com';
		$body = wordwrap($body, 1000, "\r\n");
		if(mail($to, $subject, $body, $from)){
			echo "Envoi du mail réussi";
		}
	}
	echo "erreur inattendu";
?>
