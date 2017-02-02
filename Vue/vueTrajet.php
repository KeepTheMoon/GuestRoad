<?php
/**
 * Class vue dossier
 */
/**
 * Construit la vue tableau de suivi ainsi que le PDF
 * @author baptiste
 * @package vue
 */
class vueTrajet{


/**
 * constructeur vide
 */
    public function __construct(){

    }


    public function tableau($listeVoiture, $listeClient, $listeTrajet){
 ?>
     <script>
             $(document).ready(function(){
            $("#myBtn").click(function(){
                $("#myModal").modal();
            });
        });  

        $( document ).ready( function() {
          $(".responsive-calendar").responsiveCalendar({
    
            events: {
              <?php
              foreach ($listeTrajet as $trajet) {
                echo '"'.$trajet[0].'": {"number": '.$trajet[1].', "url": "index.php?trajet='.$trajet[0].'"},';
              }
             
              ?>},
              translateMonths:["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
          });
        });
      </script>
      <br>
        <!-- Responsive calendar - START -->
        <div class="responsive-calendar">
          <div class="controls">
               <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
                    <h4><span data-head-year></span> <span data-head-month></span></h4>
                    <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
          </div><hr/>
          <div class="day-headers">
            <div class="day header">Lun</div>
            <div class="day header">Mar</div>
            <div class="day header">Mer</div>
            <div class="day header">Jeu</div>
            <div class="day header">Ven</div>
            <div class="day header">Sam</div>
            <div class="day header">Dim</div>
          </div>
          <div class="days" data-group="days">
            <!-- the place where days will be generated -->
          </div>
        </div>
        <!-- Responsive calendar - END -->
                     <!-- Trigger the modal with a button -->
          <button type="button" class="col-md-offset-4 col-md-4 btn btn-default" id="myBtn"><span class="glyphicon glyphicon-plus"></span> Ajouter un nouveau trajet</button>
          
                     <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Pour ajouter une voiture veuillez remplir le formulaire suivant : </h4>
                    </div>
                    <form action="index.php?trajet" method='post' class="form-horizontal"  role="form">
                     <div class="modal-body">
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="datetimepicker4">Date</label>
                          <div class="col-md-4">
                            <input type='text' name='date' class="form-control input-m" id='datetimepicker4' />
                          </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="selectVoiture">Voiture</label>
                          <div class="col-md-4">
                        <select id="selectVoiture" name="selectVoiture" class="form-control">
                          <?php
                          foreach ($listeVoiture as $voiture) {
                            echo '<option value="'.$voiture->getId().'">'.$voiture->getNom().'</option>';
                          }
                          ?>
                        </select>
                          </div>
                        </div>
                         <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="selectClient">Client</label>  
                          <div class="col-md-4">
                            <select id="selectClient" name="selectClient" multiple ="multiple" class="form-control">
                              <?php
                              foreach ($listeClient as $client) {
                                echo '<option value="'.$client->getId().'">'.$client->getNom()." - ".$client->getAdresse().'</option>';
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="checkbox">
                          <label for="checkboxes-0">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            Retour entreprise 
                          </label>
                        </div>
                        <div class="jumbotron">
                          <div class="container">
                           <input type="hidden" name ="d" value = "<?php echo $_SESSION['entreprise']->getAdresse()." ".$_SESSION['entreprise']->getCodePostal()." ".$_SESSION['entreprise']->getVille(); ?>"/>
                            <div name="client1" class="client"></div>
                            <input type='hidden' name ="id1">
                            <div name ="client2" class="client"></div>
                            <input type='hidden' name ="id2" >
                            <div name ="client3" class="client"></div>
                            <input type='hidden' name ="id3" >
                            <div name ="client4" class="client"></div>
                            <input type='hidden' name ="id4" >
                            <div name ="client5" class="client"></div>
                            <input type='hidden' name ="id5" >
                          </div>
                        </div>               
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-success">Envoyer</button>
                        <button type="button" class="btn pull-right btn-default" data-dismiss="modal">Fermer</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <script>
             $(function () {
              $('#datetimepicker4').datetimepicker({language:  'fr',
                  weekStart: 1,
                  todayBtn:  1,
                  autoclose: 1,
                  todayHighlight: 1,
                  startView: 2,
                  minView: 2,
                  forceParse: 0});
          });

       var cpt = 0;

            $( "#selectClient" ).on( "change", function() {
              if(cpt<5){cpt ++;}
              
            var val = $("#selectClient option:selected").val();
            var text = $("#selectClient option:selected").text();
            console.log( $("#selectClient option:selected").val() );
            $("div[name='client"+cpt+"']").text(text);
            $("input[name='id"+cpt+"']").val(val);
            $('#selectClient option[value="'+val+'"]').prop('selected', true);
            });

             $(".client").on( "click", function() {
              if($(this).val()!=""){
                var nom = $(this).attr('name').split("");
               cpt --;
               $(this).val("");
               $("input[name='id"+nom[6]+"']").val("");
              }
            });

      </script>
            <?php
    }   
    public function jour($listeClient, $date, $voiture){
      echo '<br><br><br><br><div class="container">
        <div class="page-header">
          <h1>Récapitulatif des trajets <small>du '.$date.'</small></h1>
        </div>
        <div class="col-lg-6">
      <ul class="list-group">';
      $lettre = 65;
      foreach ($listeClient as $client) {
        echo " <li class='list-group-item'><h2>";
        echo "<span class='glyphicon glyphicon-map-marker xs'> <span class='label label-default'>".chr($lettre)."</span> - ".$client[1]."<span>";
        $lettre++;
        echo "</h2></li>";
      }
      $fin = count($listeClient);
      $etapes = $fin -2;
      echo "</ul>";
      echo "<h1>Avec la voiture <small>".$voiture."</small></h1>
      <a href='index.php?trajet=".$date."&suppr' class='btn btn-defauLt col-lg-12'>Supprimer tout le trajet</a></div>";
      ?>
    <style type="text/css">
      #map { height: 50%; }
    </style>
      <div class="col-lg-6" id="map"></div> 
      </div>
        
<script>
function initMap() {
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('map'), {
  });
  directionsDisplay.setMap(map);
  calculateAndDisplayRoute(directionsService, directionsDisplay);

 
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  directionsService.route({
    origin: <?php echo '"'.$listeClient[0][0].'"';?>,
    destination:<?php echo '"'.$listeClient[$fin-1][0].'"';?>,
    waypoints: [
    <?php
    $ligne=1;
    while ($etapes > 0) {
      echo ' {
          location:"'.$listeClient[$ligne][0].'",
          stopover:true
        },';
        $etapes--;
        $ligne++;
    }
    ?>],
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}



    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5XHCrkhWrQsR-PdKIw9gv4TpJfQ_8Phs&callback=initMap">
    </script>
  

    <?php
    }
}
?>