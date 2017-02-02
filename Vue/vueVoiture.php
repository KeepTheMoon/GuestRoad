<?php
/**
 * Class vue dossier
 */
/**
 * Construit la vue des voitures
 * @author baptiste
 * @package vue
 */
class vueVoiture{


/**
 * constructeur vide
 */
    public function __construct(){

    }


    public function tableau($listeVoiture){

      echo '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Puissance</th>
                  <th>Supprimer</th>
                </tr>
              </thead>
              <tbody>';
                foreach ($listeVoiture as $voiture) {
                  echo '<tr>';
                    echo'<td>'.$voiture[0].'</td>';
                    echo'<td>'.$voiture[1].'</td>';
                  echo'<td><a href="index.php?voiture='.$voiture[2].'&suppr" class="btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a></td>';
                  echo'</tr>';
                }
?>
         </tbody>
            </table> 



  <!-- Trigger the modal with a button -->
  <button type="button" class="col-md-offset-4 col-md-4 btn btn-default" id="myBtn"><span class="glyphicon glyphicon-plus"></span> Ajouter une nouvelle voiture</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pour ajouter une voiture veuillez remplir le formulaire suivant : </h4>
        </div>
        <form method="post" action="index.php?voiture">
          <div class="modal-body">
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" name="nom" class="form-control" id="nom">
            </div>
            <div class="form-group">
              <label for="pui">Puissance</label>
              <input type="text" name="puissance" class="form-control" id="pui">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="nouvelle" class="btn btn-success">Envoyer</button>
            <button type="button" class="btn pull-right btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  


<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});       
</script>
<?php
    }
    
}
?>