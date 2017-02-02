<?php
/**
 * Class vue recap
 */
/**
 * Construit la vue de récapitulatif
 * @author baptiste
 * @package vue
 */
class vueRecap{


/**
 * constructeur vide
 */
    public function __construct(){

    }

    /**
     * Génère l
     */
    public function vuePrincipale($grille){
      ?>
      <div class="container">
        <section class="row">
          <form action="" class="form col-md-6"  role="form">
              <fieldset>
                <legend>Grilles des indemnités kilométriques</legend>
                  <table class="table table-striped">
              <thead>
                <tr>
                  <th>Puissance fiscale</th>
                  <th>Jusqu'à 5 000 km</th>
                  <th>De 5 001 à 20 000 km</th>
                  <th>Au-delà de 20 000 km</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($grille as $ligne) {
                  echo "<tr>
                <td>".$ligne[1]."</td>
                <td>".$ligne[2]."</td>
                <td>".$ligne[3]."</td>
                <td>".$ligne[4]."</td>
              </tr>";
                }
              
              ?>
              </tbody>
            </table> 
              </fieldset>
          </form>

          <div class="col-md-6">
          <form action="" class="form row"  role="form">
              <fieldset>
                <legend>Génération du récapitulatif des déplacements</legend>
                  <p>...</p>
              </fieldset>
          </form>
          <form action="" class="form row"  role="form">
              <fieldset>
                <legend>Calculs des indemnités kilométriques</legend>

                  <p>...</p>

              </fieldset>
          </form>
        </div>
        </section>
      </div>

      
<?php
    }
}
?>