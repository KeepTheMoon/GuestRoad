<?php
/**
 * Class vue employé
 */
/**
 * Vue de la partie utilisateur
 * @author baptiste
 * @package vue
 */
class vueEmploye{
/**
 * constructeur vide
 */
    public function __construct(){

    }
    /**
     * Génère la tableau qui affiche tous les utilisateurs
     * @param string[] $employes
     */
   public function tableau($listeUtilisateurs, $listeEntreprise){

        echo '<table class="table table-striped">
              <thead>
                <tr>
                  <th>Prenom</th>
                  <th>Nom</th>
                  <th>Courriel</th>
                  <th>Droits</th>
                  <th>Se connecter en tant que...</th>
                </tr>
              </thead>
              <tbody>';
                foreach ($listeUtilisateurs as $utilisateur) {
                  echo '<tr>';
                  	echo'<td>'.$utilisateur->getPrenom().'</td>';
                    echo'<td>'.$utilisateur->getNom().'</td>';
                    echo'<td>'.$utilisateur->getMail().'</td>';
                    echo'<td>'.$utilisateur->getDroits().'</td>';
                  
                  echo'<td><a href="#" class="btn-xs btn-default"><span class="glyphicon glyphicon-user"></span></a></td>';
                  echo'</tr>';
                }

        echo' </tbody>
            </table>';
        echo' <!-- Trigger the modal with a button -->
  <button type="button" class="col-md-offset-4 col-md-4 btn btn-default" id="myBtn"><span class="glyphicon glyphicon-plus"></span> Ajouter un nouvel utilisateur</button>';

        ?>


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pour ajouter un nouvel utilisateur, veuillez remplir le formulaire suivant : </h4>
              </div>
              <form method="post" action="index.php?utilisateur" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="pernom">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="prenom">
                    </div>
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" name="nom" class="form-control" id="nom">
                    </div>
                     <div class="form-group">
                        <label for="mail">Courriel</label>
                        <input type="text" name="mail" class="form-control" id="mail">
                      </div>
                      <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" id="mdp">
                      </div>
                      <div class="form-group">
                        <label for="droits">Droits</label>
                        <select name="droits" class="form-control" id="droits">
                          <option value="User">User</option>
                          <option value="Admin">Admin</option>
                          <option value="SuAdmin">SuAdmin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="entre">Entreprise</label>
                        <select name="entre" class="form-control" id="entre">
                        <?php
                        foreach ($listeEntreprise as $entreprise) {
                          echo '<option value="'.$entreprise->getId().'">'.$entreprise->getNom().'</option>';
                        }
                        ?>
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
}?>