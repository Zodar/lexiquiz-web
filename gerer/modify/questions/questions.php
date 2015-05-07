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
			<div class="container cursive black">
				<h1 class="textAlignCenter seashell"> Questions du quiz "<?php echo $titre; ?>" </h1>
				<div class="row">
					<a href="create-ask.php" class="menuBtn btn-danger"> Créer une question </a>
				</div>
				<div class="row">
					<a href="modify-ask.php" class="menuBtn btn-primary"> Modifier une question </a>
				</div>
				<div class="row">
					<a href="remove-ask.php " class="menuBtn btn-warning"> Supprimer une question </a>
				</div>
			</div>
<?php
		}
	}
?>
	<script type="text/javascript">
		$("body").on("click", ".click-modify-quiz", function(){
				var titre = $(".titre").val();
				if(titre.length < 3 || titre.length > 150){
					$(".notif-titre").html("Le titre du quiz doit faire <span style='color:orange;'> entre 3 et 150 lettres.</span>");
				} else{
					$.ajax({
						url: "module-modify-title.php",
						type: "POST",
						data: "titre=" + titre,
					}).success(function(json) {
						alert("Quiz modifié !");
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
