<?php
	include("../../../db.php");
	include("../../../lib/include/header.html");
	include("../../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$idQuiz = $_SESSION['idQuiz'];
	$sql = "SELECT * FROM quiz WHERE idUser = '$idUser' AND idQuiz = '$idQuiz'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
		<div class="container cursive">
			<h1 class="textAlignCenter seashell"> Modifier le titre </h1>
			<div class="black">

				<div class="orange textAlignCenter"> <span id="nb-ask"> 0 </span> <span class="seashell"> questions créées </span> </div>

				<div class="row">
					<span class="seashell textAlignRight col-md-offset-4 col-md-1"> Énoncé: </span> <input name="enonce" type="text" class="enonce">
					<span class="seashell notif notif-enonce"> </span>
				</div>

				<div class="row">
					<span class="seashell textAlignRight col-md-offset-4 col-md-1"> Réponse: </span> <input name="reponse" type="text" class="reponse">
					<span class="seashell notif notif-reponse"> </span>
				</div>

				<div class="row">
					<input value="Créer" type="submit" class="click-create-ask col-md-1 col-md-offset-6">
				</div>
			</div>
		</div>
<?php
		}
	}
?>
	<script type="text/javascript">
		var compteAsk = 0;
		$("body").on("click", ".click-create-ask", function(){
				$(".notif").html(" ");
				var enonce = $(".enonce").val();
				var reponse = $(".reponse").val();
				if(enonce.length < 3 || enonce.length > 300){
					$(".notif-enonce").html("L'Énoncé doit faire <span style='color:orange;'> entre 3 et 300 lettres.</span>");
				} else if(reponse.length < 3 || reponse.length > 300){
					$(".notif-reponse").html("La reponse doit faire <span style='color:orange;'> entre 3 et 300 lettres.</span>");
				} else{
					$.ajax({
						url: "module-create-ask.php",
						type: "POST",
						data: "enonce=" + enonce + "&reponse=" + reponse,
					}).success(function(json) {
						$(".enonce").val(" ");
						$(".reponse").val(" ");
						compteAsk = compteAsk + 1;
						$("#nb-ask").html(compteAsk);
					}).error(function() {
						alert("Erreur creation");
					});
				}
		})
	</script>
<?php
	include("../../../lib/include/footer.html");
?>
