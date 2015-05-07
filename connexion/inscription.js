var mail;
var mdp;
var pseudo;

$(document).ready(function(){
	$('.hideOnStart').hide();
});

$("body").on("click", ".lienOubli", function(){
	envoiMail("mail=" + mail);
});

$("body").on("change", ".inputInscription", function(){
	verify(false);
});

$("body").on("click", ".insClic", function(){
	verify(true);
});

function verify(insert){
	$(".hideOnStart").hide();
	$(".notif").html("");
	mail = $(".mail").val();
	mdp = $(".mdp").val();
	mdp2 = $(".mdp2").val();
	pseudo = $(".pseudo").val();

	if(mail.length < 6 || mail.length > 50){
		$(".notifmail").html("La longueur de <b style='color:orange;'> l'adresse mail </b> doit être comprise entre <b style='color:orange;'> 6 et 50 caractères. </b>");
	} else{
		var data = "mail=" + mail + "&mdp=" + mdp + "&pseudo=" + pseudo;
		var url = "verification.php";
		var type = "POST";
		$.ajax({
			url: url,
			type: type,
			data: data,
		}).success(function(json) {
			if(json == "mail inv"){
				$(".notifmail").html("<b style='color:orange;'> Adresse mail invalide.</b>");
			}	else if(json == "mail existe"){
				$(".lienOubli").show();
				$(".notifmail").html("<b style='color:orange;'> Cette adresse mail est déjà rattachée à un compte.</b>");
			} else if(mdp.length < 6 || mdp.length > 50){
				$(".notifmdp").html("La longueur du <b style='color:orange;'> mot de passe </b> doit être comprise entre <b style='color:orange;'> 6 et 50 caractères. </b>");
			} else if(mdp != mdp2){
				$(".notifmdp").html("<b style='color:orange;'> Les mots de passe ne correspondent pas. </b>");
				$(".notifmdp2").html("<b style='color:orange;'> Les mots de passe ne correspondent pas. </b>");
			} else if(pseudo.length < 2 || pseudo.length > 40){
				$(".notifpseudo").html("La longueur du <b style='color:orange;'> pseudo </b> doit être comprise entre <b style='color:orange;'> 2 et 40 caractères. </b>");
			} else if(json == "pb pseudo"){
				$(".notifpseudo").html("<b style='color:orange;'> Ce pseudo existe déjà. </b>");
			} else{ /* TOUS LES CHAMPS SONT CORRECTS */
				$(".insClic").show();
				if(insert){
					$.ajax({
						url: "insertUser.php",
						type: "POST",
						data: "mail=" + mail + "&mdp=" + mdp + "&pseudo=" + pseudo,
					}).success(function(json) {
						alert("Inscription effectué. Connectez vous à votre compte.");
						window.location.replace("connect.php");
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

function envoiMail(data){
	$(".hideOnStart").hide();

	var data = data;
	var url = "oubli.php";
	var type = "POST";
	$.ajax({
		url: url,
		type: type,
		data: data,
	}).success(function(json) {
		alert("Un mail vous à été envoyé avec de nouveaux identifiants.");
		window.location.replace("connect.php");
	}).error(function() {
		alert("erreur inattendu");
	});
}
