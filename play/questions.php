<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");
?>
		<div class="container cursive">
<?php
	$idQuiz = $_GET['idQuiz'];

	$sql = "SELECT * FROM quiz WHERE idQuiz = '$idQuiz'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
			if($public == 0){
				if(!isset($_SESSION['idConnexion'])) header('location: http://lexiquiz.alwaysdata.net');
				if($_SESSION['idConnexion'] != $idUser) header('location: http://lexiquiz.alwaysdata.net');
			}
		}
	}
	
	$sql = "SELECT * FROM questions WHERE idQuiz = '$idQuiz'";
	$result = mysql_query($sql);
?>
			<img class="iconQuizSearch centrer-image" alt="icon" src="<?php echo $icon; ?>">

			<h1 class="textAlignCenter seashell"> <?php echo $titre; ?> </h1>
<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			$questions[] = $row;
		}
	}

	$rand = rand(0, sizeof($questions)-1);

?>						

			<input type="hidden" name="idQuiz" value="<?php echo $idQuiz; ?>">
			<input type="hidden" name="idQuestion" value="<?php echo $questions[$rand]['idQuestion']; ?>">
			<div class="row">
				<div class="turquoiseBg question">
					<div class="margin-left-2 row">
						<span class="bold"> <?php echo $questions[$rand]['enonce']; ?> </span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="turquoiseBg question bold">
					<div class="margin-left-2 row">
						<span id="reponse" class="col-md-12 col-xs-12 hideOnStart"> <?php echo $questions[$rand]['reponse']; ?> </span>
					</div>
					<div class="row">
						<a class="btn-module"> Réponse </a>
					</div>
				</div>
			</div>

			<div class="bold black hideOnStart groupLevel">
				<div class="row">
					<span id="1" class="col-xs-4 col-md-2 col-md-offset-3 level bold btn btn-level btn-info"> Je savais pas </span>
					<span id="2" class="col-xs-4 col-md-2 level bold btn btn-level btn-warning"> Je le saurais </span>
					<span id="3" class="col-xs-4 col-md-2 level bold btn btn-level btn-danger"> Je le sais </span>
				</div>
			</div>
<?php
	if(!isset($_SESSION["idConnexion"])){
?>		
	<div class="row">
		<p style="color:white;" class="col-md-6 col-md-offset-3"> Nous ne sommes pas en mesure de sauvegarder votre progression. Connectez vous, ou inscrivez vous 
		afin de profiter au mieux de l'apprentissage. </p>
	</div>
<?php		
	}
?>			
		</div>
		<script src="search.js"> </script>
		<script>
		$("body").on("click", ".btn-module", function(){
			$(this).hide();
			$("#reponse").show();
			$(".groupLevel").show();
		});
		$("body").on("click", ".level", function(){
			level = $(this).attr("id");
			idQuiz = $("input[name='idQuiz']").val();
			idQuestion = $("input[name='idQuestion']").val();
			$.ajax({
			  type: "POST",
			  url: "module-level.php",
			  data: { level: level, idQuiz: idQuiz, idQuestion: idQuestion }
			})
		    .success(function(json) {
			  if(json=="nok" || json=="ok") location.reload();
		    });
		});
		</script>
<?php
	mysql_close($con);
	include("../lib/include/footer.html");
?>
