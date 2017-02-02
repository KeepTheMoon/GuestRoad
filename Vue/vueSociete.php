<?php
/**
 * Class vue societe
 */
/**
 * Construit la vue de l'entreprise
 * @author baptiste
 * @package vue
 */
class vueSociete{


/**
 * constructeur vide
 */
    public function __construct(){

    }

    /**
     * Génère l
     */
    public function formulaire($entreprise, $responsable){

      ?>
      <div class="container">
    <form action="" class="form"  role="form">
        <fieldset>
            <legend>Modification des informations de mon entreprise</legend>
              <div class="container">
    
        <section class="row">
          <div class="col-md-6 form-group">
            <label class="control-label">Nom de l'entreprise</label>
            <input type='text' class="form-control" name="nomEntreprise" value='<?php echo $entreprise->getNom(); ?>' />
          </div>
          <div class="col-md-6 form-group">
          <label class="control-label">Adresse</label>
          <input type='text' class="form-control" id='adresse' name='adresse' value='<?php echo $entreprise->getAdresse(); ?>' />
        </div>
        </section>
        <section class="row">
          <div class="col-md-6 form-group">
            <label class="control-label">Fax</label>
            <input type='text' class="form-control" name="Fax" />
          </div>
          <div class="col-md-6 form-group">
            <label class="control-label">Code Postal</label>
            <input type='text' class="form-control" id='codePostal' value='<?php echo $entreprise->getCodePostal(); ?>' name='codePostal' />
          </div>
        </section>
        <section class="row">
          <div class="col-md-6 form-group">
            <label class="control-label">Téléphone</label>
            <input type='text' class="form-control" name="tel" />
          </div>
          <div class="col-md-6 form-group">
            <label class="control-label">Ville</label>
            <input type='text' class="form-control" id='ville' name='ville' value='<?php echo $entreprise->getVille(); ?>'/>
          </div>
        </section>
        <section class="row">
          <div class="col-md-6">
            <div class="form-group row">
                <label class="control-label">Email</label>
                <input type='text' class="form-control" name="email" />
            </div>
            <div class="form-group row">
              <label class="control-label">Date de début d'exercice</label>
              <input type='text' class="form-control" name="dateDebut" />
            </div>
          </div>
          <div class="col-md-6 form-group">
            <div id="googleMap" style="width:500px;height:380px;"></div>
          </div>
        </section>
          
        </fieldset>
    </form>
<input type="hidden" id="adress"/>
<input type="hidden" id="lat"/>
<input type="hidden" id="lng"/>

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var geocoder = new google.maps.Geocoder();
  document.getElementById("adress").value=document.getElementById("adresse").value+" "+document.getElementById("codePostal").value+" "+document.getElementById("ville").value;
  var address = document.getElementById("adress").value;
  var paris = new google.maps.LatLng(48.8566667, 2.3509871);
  var mapProp = {
    center:paris,
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
   var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  geocoder.geocode( { 'address': address}, function(results, status) {
    /* Si l'adresse a pu être géolocalisée */
    if (status == google.maps.GeocoderStatus.OK) {
     /* Récupération de sa latitude et de sa longitude */
     document.getElementById('lat').value = results[0].geometry.location.lat();
     document.getElementById('lng').value = results[0].geometry.location.lng();
     map.setCenter(results[0].geometry.location);
     /* Affichage du marker */
     var marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location
     });
     } else {
      alert("Le geocodage n\'a pu etre effectue pour la raison suivante: " + status);
     }
    });
 
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>






</div>

      
<?php
    }
}
?>