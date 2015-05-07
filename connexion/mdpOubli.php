<?php
	include("../db.php");
	include("../lib/include/header.html");
	include("../lib/include/navbar.php");

	if(isset($_SESSION["idConnexion"])){
		header('location: http://lexiquiz.alwaysdata.net');
	}

?>
	<div class="container cursive">
		<div class="black">

			<div class="row">
				<span class="seashell col-md-offset-4 col-md-2"> Adresse mail: </span> <input name="mail" type="email" class="mail">
			</div>

			<div class="row">
				<span class="seashell notif-mail col-md-offset-6"> Un mail vous sera envoyé avec un nouveau mot de passe.</span>
			</div>

			<div class="row">
				<input value="Envoi" type="submit" class="click-mdp-oubli col-md-1 col-md-offset-6">
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var mail;
		
		$("body").on("click", ".click-mdp-oubli", function(){
			verify();
		});
		
		function verify(){
			mail = $(".mail").val();

			if(mail.length < 6 || mail.length > 50){
				$(".notif-mail").html("<b style='color:orange;'> Adresse mail invalide.</b>");
			} else{
				$.ajax({
					url: "verification.php",
					type: "POST",
					data: "mail=" + mail,
				}).success(function(json) {
					if(json == "mail inv"){
						$(".notif-mail").html("<b style='color:orange;'> Adresse mail invalide.</b>");
					}	else if(json != "mail existe"){
						$(".notif-mail").html("<b style='color:orange;'> Cette adresse mail n'est pas rattachée à un compte.</b>");
					} else{
						envoiMail();
					}
				}).error(function() {
					alert("erreur inattendu");
				});
			}
		}
		
		function envoiMail(){
			$.ajax({
				url: "oubli.php",
				type: "POST",
				data: "mail=" + mail,
			}).success(function(json) {
				alert("Un mail vous à été envoyé avec de nouveaux identifiants.");
				window.location.replace("connect.php");
			}).error(function() {
				alert("erreur inattendu");
			});
		}
	</script>
<?php
	include("../lib/include/footer.html");
?>
