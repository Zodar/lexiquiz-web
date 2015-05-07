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

				<div class="seashell textAlignCenter"> Ancien titre: <span class="orange"> <?php echo $titre; ?> </span> </div>

				<div class="textAlignCenter">
					<span class="seashell textAlignRight"> Nouveau titre: </span> <input value="<?php echo $titre; ?>" name="titre" type="text" class="titre">
				</div>
				<div class="row">
					<span class="seashell notif notif-titre col-md-offset-6"> </span>
				</div>

				<div class="row">
					<input value="Modifier" type="submit" class="click-modify-quiz col-md-1 col-md-offset-6">
				</div>
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
