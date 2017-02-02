<?php
/**
 * Class util
 */

/**
 * Utilitaire html
 * @author baptiste
 * @package vue
 */
class util
{
    /**
     * constructeur vide
     */
    public function __construct(){
        
    }
    /**
     * Affiche le code html pour faire le header de chaque page
     * @param string $titre
     */
    public function header($titre)
    {
        ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">
<title><?php echo$titre;?></title>
<!-- Bootstrap core CSS -->
<link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="starter-template.css" rel="stylesheet">
<!--Première version du calendrier-->
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<!--Deuxième version du calendrier-->
<link href="css/responsive-calendar.css" rel="stylesheet" media="screen">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->


<link rel="stylesheet" type="text/css"
	href="font-awesome/css/font-awesome.min.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src="js/responsive-calendar.js"></script>
<script src='js/lang/fr.js'></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

</head>
<body>
  <?php
    }
/**
 * Affiche le footer pour chaque page
 */
    public function footer()
    {
        ?>



</body>
</html>
<?php
    }
/**
 * Affiche la barre de navigation pour chaque page
 * @param string $titre
 */
    public function navbar($section, $login, $droits)
    {
        ?>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">GestDep</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
	            		<?php
       
          if ($droits == "Admin" || $droits == "SuAdmin"){
              echo '<li';if($section=="Util"){echo' class="active"';}echo'><a href="index.php?utilisateur">Utilisateurs</a></li>';
              echo '<li';if($section=="Entre"){echo' class="active"';}echo'><a href="index.php?entreprise">Entreprise</a></li>';
            }
            echo'<li';if($section=="Clients"){echo' class="active"';}echo'><a href="index.php?client">Liste des clients</a></li>';
            echo '<li';if($section=="Voitures"){echo' class="active"';}echo'><a href="index.php?voiture">Liste des véhicules</a></li>';
            echo '<li';if($section=="Trajets"){echo' class="active"';}echo'><a href="index.php?trajet">Déplacements</a></li>';
            echo'<li';if($section=="Recap"){echo' class="active"';}echo'><a href="index.php?recap">Récapitulatifs</a></li>';
            echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$login.' <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li';if($section=="Compte"){echo' class="active"';}echo'><a href="index.php?compte">Mon compte</a></li>
                      <li><a href="index.php?deconnexion">Déconnexion</a></li>
                    </ul>
                  </li>';
            if($droits=='SuAdmin'){
            echo '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-wrench"></span></a>
                    <ul class="dropdown-menu">
                      <li';if($section=="AdminUtil"){echo' class="active"';}echo'><a href="index.php?adminu">Administration des utilisateurs</a></li>
                      <li';if($section=="AdminEntre"){echo' class="active"';}echo'><a href="index.php?admine">Administration des entreprises</a></li>
                      <li';if($section=="Grille"){echo' class="active"';}echo'><a href="index.php?grille">Grilles des indemnitées kilométrique</a></li>
                      <li';if($section=="Config"){echo' class="active"';}echo'><a href="index.php?config">Configuration général</a></li>
                    </ul>
                  </li>';
            
        }
        ?>
	            		</ul>
		</div>
		<!--/.nav-collapse -->
	</div>
</div>
<?php
    }

   
           
}
?>