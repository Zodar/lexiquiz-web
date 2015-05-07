<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");

	if(!isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net/connexion');
	}

	$idUser = $_SESSION['idConnexion'];
	$sql = "SELECT * FROM quiz WHERE idUser = '$idUser' AND public = 0";
	$result = mysql_query($sql);
?>
		<div class="container cursive">
			<h1 class="textAlignCenter seashell"> Publiez un quiz afin que toute la communauté puisse y jouer ! </h1>
<?php
	if(mysql_num_rows($result)){
		while($row = mysql_fetch_assoc($result)){
			extract($row);
?>
			<div class="turquoiseBg quiz">
				<img class="iconQuizSearch centrer-image" alt="icon" src="http://lexiquiz.alwaysdata.net/download/<?php echo $icon; ?>">
				<span class="row">
					<span class="titre col-md-10 bold"> <?php echo $titre; ?> </span>
				</span>
				<a href="#" id="<?php echo $idQuiz;?>" class="btn-module"> Publier </a>
			</div>
<?php
		}
	}else{
?>
			<p class="well textAlignCenter">Vous n'avez pas de quiz à publier.</p>
<?php
	}
?>
		</div>
		<script type="text/javascript">
			$("body").on("click", ".btn-module", function(){
				var idQuiz = $(this).attr("id");
				var titre = $(this).parent().find(".titre").text();
				if(confirm("Publier \"" + titre + "\" ?")){
					$.ajax({
						url: "module-public.php",
						type: "POST",
						data: "idQuiz=" + idQuiz,
					}).success(function(json) {
						alert("Quiz publié !");
						window.location.replace("http://lexiquiz.alwaysdata.net/publication/publication.php");
					}).error(function() {
						alert("Erreur publication");
					});
				}
			})
		</script>
<?php
	mysql_close($con);
	include("../lib/include/footer.html");
?>
