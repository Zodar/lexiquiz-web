var mouseleaveResultColor;
var data;

$('body').on("mouseleave", ".resultColor", function(){
	$(this).css('background-color', mouseleaveResultColor);
});

$('body').on("mouseenter", ".resultColor", function(){
	$(this).css('background-color', "seashell");
});

function emptyResult(){
	var compteur = 0;
	while(compteur < 10){
		$('.tmp' + compteur + " > .span1").html("");
		$('.tmp' + compteur + " > .span2").html("");
		$('.tmp' + compteur + " > .span3").html("");
		$('.tmp' + compteur + " > .span4").html("");
		$('.tmp' + compteur).hide();
		$('.tmp' + compteur).children().hide();
		compteur = compteur + 1;
	}
}

$('body').on("click", ".btn-hide", function(){
	$(this).parent().find(".search").val("");
	$(this).removeClass("glyphicon-remove");
	$(this).addClass("glyphicon-search");
	$('.turquoiseBg').children().show();
	$('.turquoiseBg').show();
	$('.resultColor').children().hide();
	$('.resultColor').hide();
});

$('body').on("keyup", ".search", function(){
	var searchTerms = $(this).val();
	$(this).parent().find(".btn-hide").removeClass("glyphicon-search");
	$(this).parent().find(".btn-hide").addClass("glyphicon-remove");
	if($(this).hasClass("searchAuteur")){
		mouseleaveResultColor = "palegreen";
		data = "searchTermsAuteur=" + searchTerms;
	} else if($(this).hasClass("searchTitre")){
		mouseleaveResultColor = "steelblue";
		data = "searchTermsTitre=" + searchTerms;
	} else if($(this).hasClass("searchQuiz")){
		mouseleaveResultColor = "blanchdalmond";
		data = "searchTermsQuiz=" + searchTerms;
	}
	emptyResult();
	search();
});

function search(){
	$.ajax({
		url: "search.php",
		type: "POST",
		data: data,
	}).success(function(json) {
		$('.turquoiseBg').children().hide();
		$('.turquoiseBg').hide();

		var data = jQuery.parseJSON(json);

		if(typeof data == 'object'){
			var quiz = data.quiz;
			if(quiz != null || quiz != [] || quiz != undefined){
				$.each(quiz, function(key, value) {
					var idQuiz = quiz[key].idQuiz;
					var titre = quiz[key].titre;
					var auteur = quiz[key].auteur;
					var image = quiz[key].icon;
					$('.tmp' + key).find(".iconQuizSearch").attr("src", image);
					$('.tmp' + key).find(".span1").html("Titre: " + titre);
					$('.tmp' + key).find(".span2").html("Auteur: " + auteur);
					$('.tmp' + key).find(".span3").html("Quiz: #" + idQuiz);
					$('.tmp' + key).find(".lien").attr("href", "questions.php?idQuiz=" + idQuiz);
					$('.tmp' + key).css("background-color", mouseleaveResultColor);
					$('.tmp' + key).show();
					$('.tmp' + key).children().show();
				});
			}
		}
	}).error(function() {
		$('.turquoiseBg').children().show();
		$('.turquoiseBg').show();
		$('.resultColor').children().hide();
		$('.resultColor').hide();
	});
}
