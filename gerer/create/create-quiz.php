<?php
	include("../../db.php");
	include("../../lib/include/header.html");
	include("../../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}
?>
		<div class="container cursive">
			<h1 class="textAlignCenter seashell"> Créer un quiz </h1>
			<div class="black">

				<div class="row">
					<span class="seashell col-md-offset-4 col-md-2"> Titre du quiz: </span>
					<input name="titre" type="text" class="titre"/>
				</div>

				<div class="row">
					<span class="seashell notif notif-titre col-md-offset-6"> </span>
				</div>

				<div class="row">
					<input value="Créer" type="submit" class="click-create-quiz col-md-1 col-md-offset-6">
				</div>

			</div>
		</div>
		<script type="text/javascript">
			$("body").on("click", ".click-create-quiz", function(){
					var titre = $(".titre").val();
					if(titre.length < 3 || titre.length > 150){
						$(".notif-titre").html("Le titre du quiz doit faire <span style='color:orange;'> entre 3 et 150 lettres.</span>");
					} else{
						$.ajax({
							url: "module-create.php",
							type: "POST",
							data: "titre=" + titre,
						}).success(function(json) {
							alert("Quiz crée !");
							window.location.replace("http://lexiquiz.alwaysdata.net/gerer");
						}).error(function() {
							alert("Erreur creation");
						});
					}
			})
		</script>
<?php
	include("../../lib/include/footer.html");
?>
