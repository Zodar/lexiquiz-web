var mdp;
var pseudo;

$("body").on("click", ".click-modify-pseudo", function(){
	$('#myModalLabel').html("Modification du pseudo");
	$('.hideOnStart').hide();
	verify();
});

$("body").on("click", ".click-modify-mdp", function(){
	$('#myModalLabel').html("Modification du mot de passe");
	$('.hideOnStart').hide();
	verifyMdp();
});

$("body").on("click", ".saveMdp", function(){
	updateMdp();
});

$("body").on("click", ".savePseudo", function(){
	updatePseudo();
});

function verify(){
	$(".notif").html("");
	pseudo = $(".pseudo").val();
	if(pseudo.length < 2 || pseudo.length > 40){
		$(".notifpseudo").html("La longueur du <b style='color:orange;'> pseudo </b> doit être comprise entre <b style='color:orange;'> 2 et 40 caractères. </b>");
	}else {
		$.ajax({
			url: "verification.php",
			type: "POST",
			data: "pseudo=" + pseudo,
		}).success(function(json) {
			if(json == "pb pseudo"){
				$(".notifpseudo").html("<b style='color:orange;'> Ce pseudo existe déjà. </b>");
			} else{
				$('.hideOnStart').show();
				$('.save').addClass("savePseudo");
				$('.save').removeClass("saveMdp");
			}
		}).error(function() {
			alert("erreur inattendu");
		});
	}
}

function verifyMdp(){
	$(".notif").html("");
	mdp = $(".mdp").val();
	mdp2 = $(".mdp2").val();

	if(mdp.length < 6 || mdp.length > 50){
		$(".notifmdp").html("La longueur du <b style='color:orange;'> mot de passe </b> doit être comprise entre <b style='color:orange;'> 6 et 50 caractères. </b>");
	} else if(mdp != mdp2){
		$(".notifmdp").html("<b style='color:orange;'> Les mots de passe ne correspondent pas. </b>");
		$(".notifmdp2").html("<b style='color:orange;'> Les mots de passe ne correspondent pas. </b>");
	} else{
		$('.hideOnStart').show();
		$('.save').addClass("saveMdp");
		$('.save').removeClass("savePseudo");
	}
}

function updateMdp(){
	var oldMdp = $("#oldMdp").val();
	$.ajax({
		url: "updateMdp.php",
		type: "POST",
		data: "mdp=" + mdp + "&oldMdp=" + oldMdp,
	}).success(function(json) {
		if(json == "pb mdp")
			alert("Mot de passe incorrect");
		else
			alert("Votre mot de passe est maintenant modifié.");
	}).error(function() {
		alert("erreur inattendu");
	});
}

function updatePseudo(){
	var oldMdp = $("#oldMdp").val();
	$.ajax({
		url: "updatePseudo.php",
		type: "POST",
		data: "pseudo=" + pseudo + "&oldMdp=" + oldMdp,
	}).success(function(json) {
		if(json == "pb mdp")
			alert("Mot de passe incorrect");
		else
			alert("Votre pseudo est maintenant modifié.");
	}).error(function() {
		alert("erreur inattendu");
	});
}
