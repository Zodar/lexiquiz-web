<?php
	include("../../../db.php");
	include("../../../lib/include/header.html");
	include("../../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$idQuiz = $_SESSION['idQuiz'];
	$idQuestion = $_GET['idQuestion'];

	$sql = "SELECT * FROM questions WHERE idQuestion = '$idQuestion'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
			$sqlSecurite = "SELECT * FROM quiz WHERE idQuiz = '$idQuiz'";
			$resultSecurite = mysql_query($sqlSecurite);
			$show = true;
			if(mysql_num_rows($resultSecurite)){
				while($rowSecurite = mysql_fetch_assoc($resultSecurite)){
					if($_SESSION['idConnexion'] != $rowSecurite['idUser']){
						$show = false;
					}
				}
			}
			if($show){
?>
		<div class="container cursive">
			<h1 id="<?php echo $idQuestion; ?>" class="idQuestion textAlignCenter seashell"> Modifier la question </h1>
			<div class="black">

				<div class="seashell textAlignCenter"> Ancien énoncé: <span class="orange"> <?php echo $enonce; ?> </span> </div>

				<div class="textAlignCenter">
					<span class="seashell textAlignRight"> Nouveau énoncé: </span> <input value="<?php echo $enonce; ?>" name="enonce" type="text" class="enonce">
				</div>
				<div class="row">
					<span class="seashell notif notif-enonce col-md-offset-6"> </span>
				</div>

				<div class="seashell textAlignCenter"> Ancienne réponse: <span class="orange"> <?php echo $reponse; ?> </span> </div>

				<div class="textAlignCenter">
					<span class="seashell textAlignRight"> Nouvelle réponse: </span> <input value="<?php echo $reponse; ?>" name="reponse" type="text" class="reponse">
				</div>
				<div class="row">
					<span class="seashell notif notif-reponse col-md-offset-6"> </span>
				</div>

				<div class="row">
					<input value="Modifier" type="submit" class="click-modify-question col-md-1 col-md-offset-6">
				</div>
			</div>
		</div>
<?php
			}
		}
	}
?>
	<script type="text/javascript">
		$("body").on("click", ".click-modify-question", function(){
				var enonce = $(".enonce").val();
				var reponse = $(".reponse").val();
				var idQuestion = $(".idQuestion").attr('id');
				if(enonce.length < 3 || enonce.length > 300){
					$(".notif-titre").html("L'énoncé du quiz doit faire <span style='color:orange;'> entre 3 et 300 lettres.</span>");
				} else if(reponse.length < 3 || reponse.length > 300){
					$(".notif-titre").html("La réponse du quiz doit faire <span style='color:orange;'> entre 3 et 300 lettres.</span>");
				} else{
					$.ajax({
						url: "module-modify-ask.php",
						type: "POST",
						data: "enonce=" + enonce + "&reponse=" + reponse + "&idQuestion=" + idQuestion,
					}).success(function(json) {
						alert("Question modifiée !");
						javascript:history.back();
					}).error(function() {
						alert("Erreur creation");
					});
				}
		})
	</script>
<?php
	include("../../../lib/include/footer.html");
?>
