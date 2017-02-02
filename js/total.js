var total1 = 0;
var total2 = 0;
var total3 = 0;
var total4 = 0;
var total5 = 0;
var total6 = 0;
var total7 = 0;
var total8 = 0;
var total9 = 0;
var total10 = 0;
var total11 = 0;

$(".Prisedecontact").each(function(){
if($(this).text()!=""){
	var valeur = $(this).text().split("€");
	var nombre = parseInt(valeur[0], 10);
	total1 +=nombre;
}
	$("#Prisedecontact").html("<strong>"+total1+"€</strong>");
});
$(".Préétude").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total2 +=nombre;
	}
	$("#Préétude").html("<strong>"+total2+"€</strong>");
});
$(".RDV").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total3 +=nombre;
	}
	$("#RDV").html("<strong>"+total3+"€</strong>");
});
$(".ARC").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total4 +=nombre;
	}
	$("#ARC").html("<strong>"+total4+"€</strong>");
});
$(".Envoimandat").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total5 +=nombre;
	}
	$("#Envoimandat").html("<strong>"+total5+"€</strong>");
});
$(".DDP").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total6 +=nombre;
	}
	$("#DDP").html("<strong>"+total6+"€</strong>");
});
$(".Relancebanque").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total7 +=nombre;
	}
	$("#Relancebanque").html("<strong>"+total7+"€</strong>");
});
$(".RDVbanque").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total8 +=nombre;
	}
	$("#RDVbanque").html("<strong>"+total8+"€</strong>");
});
$(".Attenteédition").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total9 +=nombre;
	}
	$("#Attenteédition").html("<strong>"+total9+"€</strong>");
});
$(".Facture").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total10 +=nombre;
	}
	$("#Facture").html("<strong>"+total10+"€</strong>");
});
$(".Clos").each(function(){
	if($(this).text()!=""){
		var valeur = $(this).text().split("€");
		var nombre = parseInt(valeur[0], 10);
		total11 +=nombre;
	}
	$("#Clos").html("<strong>"+total11+"€</strong>");
});
var grosTotal1=total1+total2+total3+total4;
var grosTotal2=total5+total6+total7;
var grosTotal3=total8+total9+total10;
var superTotal=grosTotal1+grosTotal2+grosTotal3+total11;

$("#total1").html("<strong>"+grosTotal1+"€</strong>");
$("#total2").html("<strong>"+grosTotal2+"€</strong>");
$("#total3").html("<strong>"+grosTotal3+"€</strong>");
$("#total4").html("<strong>"+total11+"€</strong>");
$("#superTotal").html("<strong>"+superTotal+"€</strong>");
            