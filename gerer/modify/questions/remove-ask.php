<?php
	include("../../../db.php");
	include("../../../lib/include/header.html");
	include("../../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$idQuiz = $_SESSION['idQuiz'];
	$sql = "SELECT * FROM questions WHERE idQuiz = '$idQuiz'";
	$result = mysql_query($sql);
?>
		<div class="container cursive">
		<h1 class="textAlignCenter seashell"> Supprimer une question </h1>
<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="turquoiseBg question" >
				<div class="row margin-left-2">
					<span class="enonce bold"> <?php echo $enonce; ?> </span>
				</div>
				<div class="row margin-left-2">
					<span class="reponse"> <?php echo $reponse; ?> </span>
				</div>
				<span id="<?php echo $idQuestion;?>" class="btn-module" > Supprimer </span>
			</div>
<?php
		}
	}else{
?>
			<p class="well textAlignCenter">Vous n'avez pas encore créer de questions.</p>
<?php
	}
?>
		</div>
		<script type="text/javascript">
			$("body").on("click", ".btn-module", function(){
				var idQuestion = $(this).attr("id");
				var enonce = $(this).parent().find(".enonce").text();
				if(confirm("Supprimer \"" + enonce + "\" ?")){
					$.ajax({
						url: "module-remove-ask.php",
						type: "POST",
						data: "idQuestion=" + idQuestion,
					}).success(function(json) {
						alert("Question supprimée !");
						window.location.replace("http://lexiquiz.alwaysdata.net/gerer/modify/questions/remove-ask.php");
					}).error(function() {
						alert("Erreur suppression");
					});
				}
			})
		</script>
<?php
	mysql_close($con);
	include("../../../lib/include/footer.html");
?>
