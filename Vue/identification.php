<?php
/**
 * Class identification
 */
/**
 * vue de la partie connexion
 * @author baptiste
 * @package vue
 */
class identification{
  /**
   * Méthode qui s'occupe de la création de la page d'identification
   */
	public function genereVueConnexion(){
	  
		?>
		
		<div class="container">
		
		<form class="form-signin" METHOD="POST" ACTION="index.php">
		
		<h2 class="form-signin-heading">
		
		Veuillez vous connecter
		
				</h2>
				<label class="sr-only" for="inputEmail">
		
				Adrsse e-mail
		
				</label>
						<input id="inputEmail" class="form-control" name="mail" placeholder="email"></input>
								<label class="sr-only" for="inputPassword">
		
								Mot de passe
		
								</label>
								<input id="inputPassword" class="form-control" name="mdp" type="password" required="" placeholder="Mot de passe"></input>
          
		          				<button class="btn btn-lg btn-primary btn-block" type="submit" name="apresConnexion">
		
		              Connexion
		
		              </button>
		
		              </form>
		              <br>
		              <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>L'identifiant est composé de votre adresse email. </strong><a href="docs/identification.html">Pour plus d'informations</a>.
                       </div>
		              
    </div><!-- /.container -->
		
		
		    <!-- Bootstrap core JavaScript
		    ================================================== -->
		    <!-- Placed at the end of the document so the pages load faster -->
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
		    
		    <?php 
	}
	
}?>