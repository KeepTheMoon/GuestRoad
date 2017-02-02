// TRie
tinysort.defaults.order = 'asc';
tinysort.defaults.attr = 'id';
//fin trie
$(document).ready(function(){

	$('.multiple').multiselect({includeSelectAllOption: true, enableClickableOptGroups: true});
	calculPart();
	trie();


});
// calcul des totaux------------------------------------------------------------------------------------------------------------------------------

//fin de calcul des totaux ----------------------------------------------------------------------------------------------------------------------

$(document).on("click", ".modal-prec", function () {
    var idEtat = $(this).data('etat');
    var idDossier = $(this).data('dossier');
    $(".modal-body #etat").val( idEtat );
    $(".modal-body #dossier").val( idDossier );
});
$(document).on("click", ".modal-pass", function () {
	
    var part = $(this).data('part');
    var idDossier = $(this).data('dossier');
    $(".modal-body #part").val( part );
    $(".modal-body #dossier").val( idDossier );
	if (typeof $(this).data('nom') != "undefined"){
		var nom = $(this).data('nom');
		$(".modal-body #nomDossier").html( nom );
	}
});
$(document).on("click", ".modal-relance", function () {
    var idDossier = $(this).data('dossier');
    var relance = $(this).data('relance');
    var etat = $(this).data('etat');
    $(".modal-body #relance").val(relance);
    $(".modal-body #dossier").val(idDossier);
    if(etat==2){
    	$(".modal-header #titreRelance").html('Date appel ou rappel du client : ');
    }
    else if(etat==3){
    	$(".modal-header #titreRelance").html('Solution à transmettre le : ');
    }
    else if(etat==4){
    	$(".modal-header #titreRelance").html('Relance réponse client : ');
    }
    else if(etat==5){
    	$(".modal-header #titreRelance").html('Relance client document : ');
    }
    else if(etat==6){
    	$(".modal-header #titreRelance").html('DDP à faire le : ');
    }
    else if(etat==7){
    	$(".modal-header #titreRelance").html('Relance BQ simul à faire le : ');
    	$(".modal-body #commentaire").attr("placeholder", "commentaire...");
    }
    else if(etat==8){
    	$(".modal-header #titreRelance").html('RDV banque / Client à prendre le : ');
    	$(".modal-body #commentaire").attr("placeholder", "RDV banque pris le ...");
    }
    else if(etat==9){
    	$(".modal-header #titreRelance").html("Relance pour l'édition de l'offre : ");
    	$(".modal-body #commentaire").attr("placeholder", "commentaire...");
    }
    else if(etat==10){
    	$(".modal-header #titreRelance").html('Envoi de facture H + Bq ou relance paiement Bq / cli : ');
    	$(".modal-body #commentaire").attr("placeholder", "Date envoi facture si envoyée");
    }
    
});
$(document).on("click", ".modal-suppr", function () {
    var idDossier = $(this).data('dossier');
    $(".modal-body #dossier").val( idDossier );
});


$("#ordre-trie").on("click", function(){
	if($("#ordre-trie").html()=="Ordre décroissant"){
		$("#ordre-trie").html("Ordre croissant");
		tinysort.defaults.order = 'desc';
		trie();	
	}
	else{
		$("#ordre-trie").html("Ordre décroissant");
		tinysort.defaults.order = 'asc';
		trie();	
	}
	
});
//Début de la fonction de recherche ------------------------------------------
$.extend($.expr[":"], {
	"containsIN": function(elem, i, match, array) {
	return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
	});
$("#search").on("input propertychange", function(){
	$(".search").parent().parent().parent().show();
    var val=$(this).val();
    console.log(val);
	$(".search:not(:containsIN("+val+"))").each(function(){ 
    		$(this).parent().parent().parent().hide();		  
		});
	    });
// Fin de la recherche -------------------------------------------------------
//filtre
$("#filtre-rouge").on("click", function(){
	$(".orange").hide();
	$(".rouge").show();
	$(".gris").hide();
});
$("#filtre-orange").on("click", function(){
	$(".orange").show();
	$(".rouge").hide();
	$(".gris").hide();
});
$("#filtre-gris").on("click", function(){
	$(".orange").hide();
	$(".rouge").hide();
	$(".gris").show();
});
$("#filtre").on("click", function(){
	$(".orange").show();
	$(".rouge").show();
	$(".gris").show();
});
//fin filtre
//calcul des part tableau

function calculPart(){
	var tableau= ['Prise-de-contact', 'Pré-étude', 'Rendez-vous', 'Envoi-mandat', 'ARC', 'DDP', 'Relance-Banque', 'RDV-Banque', 'Attente-édition', 'Facture'];
	
	for(var i=0;i<=10;i++){
		var total=0;
	$("."+tableau[i]+"").each(function(){ 
		  var test =$(this).html();
		  var res =test.split(" ");
		  total = total +parseInt(res[0]);
		});
	$(".total-"+tableau[i]+"").append('Total commissions : '+total+' €');
	}
}
function modifDossier(num){
		var etat = $('tr:eq('+num+')').find("td:eq(1)").html();
		$('tr:eq('+num+')').find("td:eq(1)").html(etat+"<br/><button>Précédent</button>");
		var nom = $('tr:eq('+num+')').find("td:eq(2)").html();
		var nomDec = nom.split("<br>"); 
		$('tr:eq('+num+')').find("td:eq(2)").html('<select multiple="multiple" style="min-width:150px;"></select> ');
		selectDossier(nomDec);
		$('#'+num).html('<span class="glyphicon glyphicon-ok-sign"></span> Enregistrer');
		$("#"+num).attr("onclick","enrDossier("+num+")");
		$('select').multiselect({includeSelectAllOption: true, enableClickableOptGroups: true});
	}
function modifDossierUser(num){
	var etat = $('tr:eq('+num+')').find("td:eq(1)").html();
	$('tr:eq('+num+')').find("td:eq(1)").html(etat+"<br/><button>Précédent</button>");
}
	function enrDossier(num){
		$('tr:eq('+num+')').find("td:eq(1)").find("button").remove();
		$('tr:eq('+num+')').find("td:eq(1)").find("br").remove();
		$('#'+num).html('Modifier');
		$("#"+num).attr("onclick","modifDossier("+num+")");

	}
	function selectDossier(nom){
		$('select').append('<optgroup label="Agence 1"></optgroup>');
		$('select').append('<option>Michel</option>');
		$('select').append('<option>Céline</option>');
		$('select').append('<option>Hervé</option>');
		$('select').append('<optgroup label="Agence 2"></optgroup>');
		$('select').append('<option>Gérard</option>');
		$('select').append('<option>Thomas</option>');
		$('select').append('<option>Martin</option>');
		$('select').append('<option>Maël</option>');
		for (i=0; i<nom.length; i++){
			$('select').find('option:contains('+nom[i]+')').attr("selected", "selected");
		}
	}
	function trie(){
		tinysort($("#Prise-de-contact").children().children());
		tinysort($("#Pré-étude").children().children());
		tinysort($("#Rendez-vous").children().children());
		tinysort($("#ARC").children().children());
		tinysort($("#Envoi-mandat").children().children());
		tinysort($("#DDP").children().children());
		tinysort($("#Relance-Banque").children().children());
		tinysort($("#RDV-Banque").children().children());
		tinysort($("#Attente-édition").children().children());
		tinysort($("#Facture").children().children());
	}