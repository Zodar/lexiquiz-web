<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");
?>
		<div class="container cursive">
<?php
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
			<h1 class="textAlignCenter seashell"> Quiz de la Communauté </h1>

<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="turquoiseBg quiz">
				<img class="iconQuizSearch centrer-image" alt="icon" src="<?php echo $icon; ?>">
				<div class="margin-left-2 row">
					<span class="bold"> <?php echo "Titre: $titre"; ?> </span>
				</div>
				<div class="margin-left-2 row">
					<span> <?php echo "Auteur: $auteur"	; ?> </span>
				</div>
				<div class="margin-left-2 row">
					<span> <?php echo "Quiz: #$idQuiz"; ?> </span>
				</div>
				<a href="questions.php?idQuiz=<?php echo $idQuiz;?>" class="btn-module"> Jouer </a>
			</div>
<?php
		}
		$tmp = 0;
		while($tmp < 10){
?>
			<div class="hideOnStart resultColor quiz tmp<?php echo $tmp; ?>" >
				<img class="iconQuizSearch centrer-image" alt="icon" src="#">
				<div class="margin-left-2 row">
					<span class="span1 bold"> </span>
				</div>
				<div class="margin-left-2 row">
					<span class="span2"> </span>
				</div>
				<div class="margin-left-2 row">
					<span class="span3"> </span>
				</div>
				<a href="#" class="lien btn-module"> Jouer </a>
			</div>
<?php
			$tmp = $tmp + 1;
		}
	}
?>
		</div>
		<script src="search.js"> </script>
<?php
	mysql_close($con);
	include("../lib/include/footer.html");
?>
