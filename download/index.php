<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");
?>
		<div class="container cursive">
<?php
	if(!isset($_GET['allquestions'])){
		$sql = "SELECT * FROM quiz WHERE public = 1";
		$result = mysql_query($sql);
?>
			<div class="marge-form">
				<div class="row">
					<span class="label-form"> Rechercher un quiz: </span>
					<input name="searchQuiz" class="search searchQuiz">
					<span class="bold white btn-hide glyphicon glyphicon-search"></span>
				</div>
				<div class="row">
					<span class="label-form"> Rechercher un titre: </span>
					<input name="searchTitre" class="search searchTitre">
					<span class="bold white btn-hide glyphicon glyphicon-search"></span>
				</div>
				<div class="row">
					<span class="label-form"> Rechercher un auteur: </span>
					<input name="searchAuteur" class="search searchAuteur">
					<span class="bold white btn-hide glyphicon glyphicon-search"></span>
				</div>
			</div>
			<h1 class="textAlignCenter seashell"> Liste de Quiz </h1>

<?php
		if(mysql_num_rows($result)){
			while($row = mysql_fetch_assoc($result)){
?>
			<div class="turquoiseBg quiz">
				<a href="http://lexiquiz.alwaysdata.net/download?allquestions=<?php echo $row['idQuiz']; ?>">
					<img class="iconQuizSearch centrer-image" alt="icon" src="<?php echo $row['icon']; ?>">
					<div class="margin-left-2 row">
						<span class="bold"> <?php echo "Titre: ".$row['titre']; ?> </span>
					</div>
					<div class="margin-left-2 row">
						<span> <?php echo "Auteur: ".$row['auteur']	; ?> </span>
					</div>
					<div class="margin-left-2 row">
						<span> <?php echo "Quiz: #".$row['idQuiz']; ?> </span>
					</div>
				</a>
			</div>
<?php
			}
			$tmp = 0;
			while($tmp < 10){
?>
			<div class="hideOnStart resultColor quiz tmp<?php echo $tmp; ?>" >
				<a href="#" class="lien">
					<img class="iconQuizSearch centrer-image" alt="icon" src="#"/>
					<div class="margin-left-2 row">
						<span class="span1 bold"> </span>
					</div>
					<div class="margin-left-2 row">
						<span class="span2"> </span>
					</div>
					<div class="margin-left-2 row">
						<span class="span3"> </span>
					</div>
				</a>
			</div>
<?php
				$tmp = $tmp + 1;
			}
		}
	}
	else{
		$sql = "SELECT * FROM questions WHERE idQuiz = " . $_GET['allquestions'];
		$result = mysql_query($sql);
?>
			<h1 class="textAlignCenter seashell"> Liste de Questions </h1>
<?php
		if(mysql_num_rows($result)){
			while($rowQuestions = mysql_fetch_assoc($result)){
?>
			<div class="row well black goldenrodBg">
				<span class="col-md-offset-1 col-md-10"> Question: <?php echo $rowQuestions['enonce']; ?> </span>
				<span class="reponse col-md-offset-1 col-md-10"> Réponse:
				<span class="showReponse glyphicon glyphicon-eye-open"></span>
					<span class="hideReponse">
						<?php echo $rowQuestions['reponse']; ?>
					</span>
				</span>
			</div>
<?php
			}
		}else{
?>
			<div class="well black goldenrodBg">
				<p class="textAlignCenter"> Ce quiz ne contient aucune question. </p>
			</div>
<?php
			}
		}
?>
			<div id="btn_up">
				<img alt="Retour en haut" title="Retour en haut" src="../lib/img/fleche.png" width="40" />
			</div>
		</div>
		<script src="../lib/js/global.js"> </script>
		<script src="../lib/js/global-search.js"> </script>
<?php
	mysql_close($con);
	include("../lib/include/footer.html");
?>
