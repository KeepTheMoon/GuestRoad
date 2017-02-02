<?php
/**
 * Class vue client
 */
/**
 * Construit la vue des clients
 * @author baptiste
 * @package vue
 */
class vueClient{


/**
 * constructeur vide
 */
    public function __construct(){

    }

    /**
     * Génère l
     */

    public function tableau($listeClient){
//print_r($listeClient);

      echo '    <!-- Trigger the modal with a button -->
  <button type="button" class="col-md-offset-4 col-md-4 btn btn-default" id="myBtn"><span class="glyphicon glyphicon-plus"></span> Importer</button>';
      echo '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Nom complet</th>
                  <th>Couriel</th>
                  <th>Tel</th>
                  <th>Adresse complète</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>';
                foreach ($listeClient as $client) {
                  echo '<tr>';
                  
                  echo'<td>'.$client->getNom().'</td>';
                  echo'<td>'.$client->getEmail().'</td>';
                  echo'<td>'.$client->getTelephone().'</td>';
                  echo'<td>'.$client->getAdresse().'</td>';
                  if($client->getCheck()==1){
                    echo '<td><span class="glyphicon glyphicon-ok"></span></td>';
                  }
                  else{
                    echo '<td><span class="glyphicon glyphicon-remove"></span></td>';

                  }
                  

                  echo'<td><a href="#" class="btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a></td>';
                  echo'</tr>';
                }
?>
        </tbody>
            </table>
      <!--  <a href="index.php?client=nouveau" class=" col-md-offset-4 col-md-4 btn btn-default"><span class="glyphicon glyphicon-plus"></span> Ajouter un nouveau client</a>-->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pour importer une base de donnée client, selectionnez un fichier: </h4>
        </div>
        <form method="post" action="index.php?client" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="import">Fichier contacts (.CSV) :</label>
              <input type="file" name="import" class="form-control" id="import" /><br />
            </div>
            <div class="form-group">
              <label for="format">Format du fichier :</label>
              <select name="format" class="form-control" id="format" />
                <option value="o">Outlook</option>
                <option value="d">Dolibarr</option>
              </select>
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