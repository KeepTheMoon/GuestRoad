$(document).on("dblclick", "td:not(:has('input'))[class='nom'], td:not(:has('input'))[class='prenom']", function () {
	$('button[name="enregistrer"]').css("visibility", "visible");
	$('button[name="reset"]').css("visibility", "visible"); 
	var valeur = $(this).html();
	    $(this).html('<input type="text" value="'+valeur+'">'); 
	    $(this).children().focus();
	});
	$(document).on("dblclick", "td:has('input')[class='agence']", function () {
		$('button[name="enregistrer"]').css("visibility", "visible"); 
		$('button[name="reset"]').css("visibility", "visible"); 
		 var valeur = $(this).find('p').css("display", "none");
		 $(this).find('select').css("display", "");
		 $(this).find('select').focus();
	});
	$(document).on("click", 'button[name="reset"]', function () {
		$(location).attr('href',"index.php?section=employe");
	});
$(document).on("blur", "td:has('input')[class='nom']", function () {
    var valeur = $(this).children().val();
    $(this).html(valeur);
    var ligne = $(this).parent().index();
    ligne ++;
    $("tr:eq("+ligne+") td:eq(5)").find('input[id="nom"]').val(valeur);
});
$(document).on("blur", "td:has('input')[class='prenom']", function () {
    var valeur = $(this).children().val();
    $(this).html(valeur);
    var ligne = $(this).parent().index();
    ligne ++;
    $("tr:eq("+ligne+") td:eq(5)").find('input[id="prenom"]').val(valeur);
});
///------------------------------------------------------
$(document).on("blur", "td[class='agence']", function () {
	var valeur = $(this).find('select').val();
    $(this).html(valeur);
    var ligne = $(this).parent().index();
    ligne ++;
    $("tr:eq("+ligne+") td:eq(5)").find('input[id="agence"]').val(valeur);
});
$(document).on("click", "button[class='mdp btn-sm btn-default']", function () {
	var num =$(this).attr('id');
   $(this).parent().html("<input class='btn-xs btn-default' type='button' onclick='generationmdp("+num+")' value='Générer'> <input type='text' id='mdp"+num+"' placeholder='...''> <button class='btn-xs btn-default' onclick='valider("+num+")'>OK</button>");
});

$(document).on("click", "span", function () {
    var nom = $(this).data('nom');
    var prenom = $(this).data('prenom');
    $(".modal-body #nom").val( nom );
    $(".modal-body #prenom").val( prenom );
});

function modifEmploye(num){
		var etat = $('tr:eq('+num+')').find("td:eq(1)").html();
		var noms = $('tr:eq('+num+')').find("td:eq(3)").html();
    var categ = $('tr:eq('+num+')').find("td:eq(2)").html();
		var nomDec = noms.split("<br>"); 
    var nom = $('tr:eq('+num+')').find("td:eq(0)").html();
    var prenom = $('tr:eq('+num+')').find("td:eq(1)").html();
    $('tr:eq('+num+')').find("td:eq(0)").html('<input type="text" value="'+nom+'">');
    $('tr:eq('+num+')').find("td:eq(1)").html('<input type="text" value="'+prenom+'">');
		$('tr:eq('+num+')').find("td:eq(3)").html('<select class="multiple" multiple="multiple" style="min-width:150px;"></select> ');
    $('tr:eq('+num+')').find("td:eq(2)").html('<select class="simple'+num+'" style="min-width:150px;"></select> ');
    selectEmploye(categ, num);
		multiSelect(nomDec);
		$('#'+num).html('<span class="glyphicon glyphicon-ok-sign"></span> Enregistrer');
		$("#"+num).attr("onclick","enrEmploye("+num+")");
		$('.multiple').multiselect({includeSelectAllOption: true, enableClickableOptGroups: true});
	}

	function enrEmploye(num){
		$('tr:eq('+num+')').find("td:eq(1)").find("button").remove();
		$('tr:eq('+num+')').find("td:eq(1)").find("br").remove();
		$('#'+num).html('Modifier');
		$("#"+num).attr("onclick","modifEmploye("+num+")");

	}
	function multiSelect(nom){
		
		$('.multiple').append('<option>Dupont</option>');
		$('.multiple').append('<option>Hérivau</option>');
		$('.multiple').append('<option>Prod\'homme</option>');
		for (i=0; i<nom.length; i++){
			$('.multiple').find('option:contains('+nom[i]+')').attr("selected", "selected");
		}
	}
  function selectEmploye(categ, num){
    $('.simple'+num+'').append('<option>Directeur</option>');
    $('.simple'+num+'').append('<option>Commercial</option>');
    $('.simple'+num+'').append('<option>Assistant commercial</option>');
    $('.simple'+num+'').find('option:contains('+categ+')').attr("selected", "selected");
  }
  function valider(num){
	  $('button[name="enregistrer"]').css("visibility", "visible"); 
	  $('button[name="reset"]').css("visibility", "visible"); 
	  var val = $("#mdp"+num).val();
	  var ligne = $("#mdp"+num).parent().parent().index()+1;
	  $("tr:eq("+ligne+") td:eq(5)").find('input[id="mdp"]').val(val);
	  $("#mdp"+num).parent().html(val);
  }
  
  function change(num){
    $('tr:eq('+num+')').find("td:eq(3)").html("<button onclick='mdp("+num+")'>Générer</button><input type='password' id='mdp"+num+"' placeholder='...''>");
  }
  function generationmdp(num){
  	$("#mdp"+num).attr("value", generate());
  }
  function verif(nom){
	  var i=0;
	  if($('input[name="'+nom+'"]').parent().has("span")){
			$('input[name="'+nom+'"]').parent().find("span").remove();
		}
	if($('input[name="'+nom+'"]').val()==""){
		$('input[name="'+nom+'"]').parent().parent().attr('class', "form-group has-error has-feedback");
		$('input[name="'+nom+'"]').parent().append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
	}
	else{
		$('input[name="'+nom+'"]').parent().parent().attr('class', "form-group has-success has-feedback");
		$('input[name="'+nom+'"]').parent().append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
	}
	$("input").parent().has('span[class="glyphicon glyphicon-ok form-control-feedback"]').each(function(){
		  i++;});
	 if(i==4){ bon=true; } else{bon=false;}
 	if(bon==true){
   	$("button[name=envoyer]").removeAttr("disabled");
   }
 	else{
 		$("button[name=envoyer]").attr("disabled", "disabled");
     	}
  }
  function verifconf(nom){
	  var i=0;
	  if($("#conf").parent().has("span")){
		  $("#conf").parent().find("span").remove();
		}
	if($("#conf").val()==$("#mdpn").val() && $("#conf").val()!=""){
		$("#conf").parent().parent().attr('class', "form-group has-success has-feedback");
		$("#conf").parent().append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
	}
	else{
		$("#conf").parent().parent().attr('class', "form-group has-error has-feedback");
		$("#conf").parent().append('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
	}
	$("input").parent().has('span[class="glyphicon glyphicon-ok form-control-feedback"]').each(function(){
		  i++;});
	 if(i==4){ bon=true; } else{bon=false;}
   	if(bon==true){
     	$("button[name=envoyer]").removeAttr("disabled");
     }
   	else{
   		$("button[name=envoyer]").attr("disabled", "disabled");
       	}
  }
  $("button[name=envoyer]").attr("disabled", "disabled");
 