var mail;
var mdp;

$(document).ready(function(){
	$('.hideOnStart').hide();
});

$("body").on("click", ".click-connexion", function(){
	verify();
});

function verify(){
	$(".notif").html("");
	mail = $(".mail").val();
	mdp = $(".mdp").val();

	if(mail.length < 6 || mail.length > 50){
		$(".notif-mail").html("<b style='color:orange;'> Adresse mail invalide.</b>");
	} else{
		var data = "mail=" + mail + "&mdp=" + mdp;
		var url = "verification.php";
		var type = "POST";
		$.ajax({
			url: url,
			type: type,
			data: data,
		}).success(function(json) {
			if(json == "mail inv"){
				$(".notif-mail").html("<b style='color:orange;'> Adresse mail invalide.</b>");
			}	else if(json != "mail existe"){
				$(".notif-mail").html("<b style='color:orange;'> Cette adresse mail n'est pas rattachée à un compte.</b>");
			} else{
				if(mdp.length < 6 || mdp.length > 50){
					$(".notif-mdp").html("La longueur du <b style='color:orange;'> mot de passe </b> doit être comprise entre <b style='color:orange;'> 6 et 50 caractères. </b>");
				} else{
					$(".notif").html("");
					$.ajax({
						url: "connectUser.php",
						type: "POST",
						data: "mail=" + mail + "&mdp=" + mdp,
					}).success(function(json) {
						var connectedUser = JSON.parse(json);
						if(connectedUser == "mdp inv"){
							$(".notif-mdp").html("<b style='color:orange;'> Mot de passe invalide </b>");
						} else{
							window.location.replace("http://lexiquiz.alwaysdata.net");
						}
					}).error(function() {
						alert("erreur inattendu");
					});
				}
			}
		}).error(function() {
			alert("erreur inattendu");
		});
	}
}
