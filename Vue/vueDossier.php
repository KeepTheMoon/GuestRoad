<?php
/**
 * Class vue dossier
 */
/**
 * Construit la vue tableau de suivi ainsi que le PDF
 * @author baptiste
 * @package vue
 */
class vueDossier{
    /**
     * total1
     * @var integer
     */
private $total1=0;
/**
 * total2
 * @var integer
 */
private $total2=0;
/**
 * total3
 * @var integer
 */
private $total3=0;
/**
 * total4
 * @var integer
 */
private $total4=0;
/**
 * total5
 * @var integer
 */
private $total5=0;
/**
 * total6
 * @var integer
 */
private $total6=0;
/**
 * total7
 * @var integer
 */
private $total7=0;
/**
 * total8
 * @var integer
 */
private $total8=0;
/**
 * total9
 * @var integer
 */
private $total9=0;
/**
 * total10
 * @var integer
 */
private $total10=0;
/**
 * total11
 * @var integer
 */
private $total11=0;

/**
 * constructeur vide
 */
    public function __construct(){

    }
    /**
     * Génère le code html util avant le tableau
     */
    public function avantTableau(){
        echo "<table id='mytable' data-toggle='table' class='table table-hover table-bordered table-striped table-condensed' >";
        echo '<thead><tr>
        <th id="Prise-de-contact" style=" text-align:center;">Nom</th>
        <th style=" text-align:center;">Prise de contact</th>
        <th style=" text-align:center;">Pré-étude</th>
        <th style=" text-align:center;">RDV</th>
        <th style=" text-align:center;">ARC</th>
        <th style=" text-align:center;">Envoi mandat</th>
        <th style=" text-align:center;">DDP</th>
        <th style=" text-align:center;">Relance banque</th>
        <th style=" text-align:center;">RDV banque</th>
        <th style=" text-align:center;">Attente édition</th>
        <th style=" text-align:center;">Facture</th>
        <th style=" text-align:center;">Réglé</th>
    </tr></thead><tbody>';
    }
    /**
     * Génère une ligne de tableau
     * @param string $nom
     * @param string $etat
     * @param integer $part
     */
    public function ligneTableau($nom, $etat, $part){
            echo "<tr>";
            echo "<td id='".$nom."'>".$nom."</td>";
            if($etat=='1'){echo"<td class='Prisedecontact'>".$part."€</td>";}else{echo"<td class='Prisedecontact'></td>";}
            if($etat=='2'){echo"<td class='Préétude'>".$part."€</td>";}else{echo"<td class='Préétude'></td>";}
            if($etat=='3'){echo"<td class='RDV'>".$part."€</td>";}else{echo"<td class='RDV'></td>";}
            if($etat=='4'){echo"<td class='ARC'>".$part."€</td>";}else{echo"<td class='ARC'></td>";}
            if($etat=='5'){echo"<td class='Envoimandat'>".$part."€</td>";}else{echo"<td class='Envoimandat'></td>";}
            if($etat=='6'){echo"<td class='DDP'>".$part."€</td>";}else{echo"<td class='DDP'></td>";}
            if($etat=='7'){echo"<td class='Relancebanque'>".$part."€</td>";}else{echo"<td class='Relancebanque'></td>";}
            if($etat=='8'){echo"<td class='RDVbanque'>".$part."€</td>";}else{echo"<td class='RDVbanque'></td>";}
            if($etat=='9'){echo"<td class='Attenteédition'>".$part."€</td>";}else{echo"<td class='Attenteédition'></td>";}
            if($etat=='10'){echo"<td class='Facture'>".$part."€</td>";}else{echo"<td class='Facture'></td>";}
            if($etat=='11'){echo"<td class='Clos'>".$part."€</td>";}else{echo"<td class='Clot'></td>";}
            echo "</tr>";
    }
    /**
     * Génère le code html util après le tableau
     */
    public function aprèsTableau(){
        echo "<tr>
                <td>Total colonne</td>
                <td id='Prisedecontact'></td>
                <td id='Préétude'></td>
                <td id='RDV'></td>
                <td id='ARC'></td>
                <td id='Envoimandat'></td>
                <td id='DDP'></td>
                <td id='Relancebanque'></td>
                <td id='RDVbanque'></td>
                <td id='Attenteédition'></td>
                <td id='Facture'></td>
                <td id='Clos'>0€</td>
            </tr>
            <tr>
                <td>Sous total</td>
            <td colspan='3'></td>
                <td id='total1'></td>
            <td colspan='2'></td>
                <td id='total2'></td>
            <td colspan='2'></td>
                <td id='total3'></td>
            <td id='total4'></td>
            </tr>
            <tr>
                <td>Total C.A. année</td>
                <td colspan='11' id='superTotal'></td>
            </tr></tbody>";
        echo "</table>";
        echo'<script type="text/javascript" src="js/total.js"></script>';
        
    }
    /**
     * Génère le code html util avant le tableau, pour le pdf. La méthode prend en paramètre la variable à remplir. 
     * @param string $html
     * @param integer $annee
     * @return string
     */
 public function avantTableauPDF($html, $annee){
     
        $html=$html.' <img src="txd.png" style="float:left;" alt="logo"><br> <p style="text-align:right;">Edité le '.date('d').'/'.date('m').'/'.date('Y').' à '.date('G').'h'.date('i').'</p><h3>Tableau de suivi de l\'année '.$annee.'</h3><table><thead><tr>
        <th style="text-align:center;with:10%;">Nom</th>
        <th style="text-align:center;">Prise de contact</th>
        <th style="text-align:center;">Pré-étude</th>
        <th style="text-align:center;">RDV</th>
        <th style="text-align:center;">ARC</th>
        <th style="text-align:center;">Envoi mandat</th>
        <th style="text-align:center;">DDP</th>
        <th style="text-align:center;">Relance banque</th>
        <th style="text-align:center;">RDV banque</th>
        <th style="text-align:center;">Attente édition</th>
        <th style="text-align:center;">Facture</th>
        <th style="text-align:center;">Réglé</th>
    </tr></thead><tbody>';
            return $html;
    }
    /**
     * Génère une ligne du tableau. Récupère la même variable, pour y ajouter chaque ligne
     * @param string $nom
     * @param string $etat
     * @param integer $part
     * @param string $html
     * @return string
     */
    public function ligneTableauPDF($nom, $etat, $part, $html){
        $html=$html."<tr>";
        $html=$html."<td id='".$nom."'>".$nom."</td>";
        if($etat=='1'){$html=$html."<td class='Prisedecontact'>".$part."€</td>";$this->total1+=$part;}else{$html=$html."<td class='Prisedecontact'></td>";}
        if($etat=='2'){$html=$html."<td class='Préétude'>".$part."€</td>";$this->total2+=$part;}else{$html=$html."<td class='Préétude'></td>";}
        if($etat=='3'){$html=$html."<td class='RDV'>".$part."€</td>";$this->total3+=$part;}else{$html=$html."<td class='RDV'></td>";}
        if($etat=='4'){$html=$html."<td class='ARC'>".$part."€</td>";$this->total4+=$part;}else{$html=$html."<td class='ARC'></td>";}
        if($etat=='5'){$html=$html."<td class='Envoimandat'>".$part."€</td>";$this->total5+=$part;}else{$html=$html."<td class='Envoimandat'></td>";}
        if($etat=='6'){$html=$html."<td class='DDP'>".$part."€</td>";$this->total6+=$part;}else{$html=$html."<td class='DDP'></td>";}
        if($etat=='7'){$html=$html."<td class='Relancebanque'>".$part."€</td>";$this->total7+=$part;}else{$html=$html."<td class='Relancebanque'></td>";}
        if($etat=='8'){$html=$html."<td class='RDVbanque'>".$part."€</td>";$this->total8+=$part;}else{$html=$html."<td class='RDVbanque'></td>";}
        if($etat=='9'){$html=$html."<td class='Attenteédition'>".$part."€</td>";$this->total9+=$part;}else{$html=$html."<td class='Attenteédition'></td>";}
        if($etat=='10'){$html=$html."<td class='Facture'>".$part."€</td>";$this->total10+=$part;}else{$html=$html."<td class='Facture'></td>";}
        if($etat=='11'){$html=$html."<td class='Clos'>".$part."€</td>";$this->total11+=$part;}else{$html=$html."<td class='Clot'></td>";}
        $html=$html. "</tr>";
         return $html;
    }
    /**
     * Ajoute le code html après le tableau dans la variable $html
     * @param string $html
     * @return string
     */
    public function aprèsTableauPDF($html){
        $tot1=$this->total1+$this->total2+$this->total3+$this->total4;
        $tot2=$this->total5+$this->total6+$this->total7;
        $tot3=$this->total8+$this->total9+$this->total10;
        $total=$tot1+$tot2+$tot3+$this->total11;
        $html=$html. "<tr>
                <td>Total colonne</td>
                <td id='Prisedecontact'>".$this->total1."€</td>
                <td id='Préétude'>".$this->total2."€</td>
                <td id='RDV'>".$this->total3."€</td>
                <td id='ARC'>".$this->total4."€</td>
                <td id='Envoimandat'>".$this->total5."€</td>
                <td id='DDP'>".$this->total6."€</td>
                <td id='Relancebanque'>".$this->total7."€</td>
                <td id='RDVbanque'>".$this->total8."€</td>
                <td id='Attenteédition'>".$this->total9."€</td>
                <td id='Facture'>".$this->total10."€</td>
                <td id='Clos'>".$this->total11."€</td>
            </tr>
            <tr>
                <td>Sous total</td>
            <td colspan='3'></td>
                <td id='total1'>".$tot1."€</td>
            <td colspan='2'></td>
                <td id='total2'>".$tot2."€</td>
            <td colspan='2'></td>
                <td id='total3'>".$tot3."€</td>
            <td id='total4'>".$this->total11."€</td>
            </tr>
            <tr>
                <td>Total C.A. année</td>
                <td colspan='11' id='superTotal'>".$total."€</td>
            </tr></tbody>";
        $html=$html. "</table>
            <style>
td{
    text-align:center;
    width:8%;
}
h3{
    text-align:center;
    margin-top:60px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

table, th, td {
    border: 1px solid black;
}
th{
    background-color:grey;
    color:white;}

            </style>";
        return $html;
    }
    /**
     * Génère les boutons "pdf" et "passage à l'année suivante"
     */
    public function bouton(){
       ?> 
        <div class="row">
            <div class="col-md-offset-3 col-md-2">
                <a href="index.php?section=dossier&pdf=true"><button class="btn btn-info" style="width:100%;">Générer un PDF</button></a>
            </div>
            <div class="col-md-offset-2 col-md-2">
                <a href="index.php?section=dossier&anneeSuiv=true"><button class="btn btn-success" style="width:100%;">Passer à l'année suivante</button></a>
            </div>
        </div><br>
        <?php 
        echo'<div class="container"><div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Ce tableau est un récapitulatif des commissions de tous les dossiers de l\'année. </strong><a href="docs/tableau.html">Pour plus d\'informations</a>.
                       </div></div>';
    }
    /**
     * Affiche les dossiers qui seront supprimés lors du passage à l'année suivante
     * @param String[] $suppr
     * @param string[] $nonSuppr
     * @param integer $annee
     */
    public function suppr($suppr, $nonSuppr, $annee){
        ?>
        <div class='container'>
            <div class="jumbotron">
                <h3>Les dossiers ci-dessous sont des dossiers facturés et payés de <?php echo $annee;?>, ils seront supprimés du tableau de suivi ainsi que de la base de données, suite au clique sur le bouton "Confirmer" :</h3>
                <p style="text-align:center"><?php foreach ($suppr as $nom){echo $nom;}?></p>
                <h3>Les dossiers suivants sont aussi de <?php echo $annee;?>, mais ne sont pas clos, ils vont donc être supprimés du tableau de suivi, mais ils ne seront pas supprimés de la page d'accueil avant d'être clos:</h3>
                <p style="text-align:center"><?php foreach ($nonSuppr as $nom){echo $nom;}?></p>
                <div class="row">
                    <p><a href="index.php?section=dossier"><button class="btn btn-danger col-md-offset-1 col-md-4">Annuler</button></a>
                    <a href="index.php?section=dossier&confirmer=true"><button class="btn btn-success col-md-offset-2 col-md-4">Confirmer</button></a></p>
          	    </div>
            </div>
            <div class="row">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Après être passé à l'année suivante, on ne plus revenir en arrière. </strong><a href="docs/annéeSuivante.html">Pour plus d'informations</a>.
                </div>
            </div>
        </div>
                       <?php 
    }
    /**
     * Génère le formulaire de création de dossier
     * @param string[string[]] $listeAgence
     */
    public function creer($listeAgence){
        ?>
        
         <div class="container">
      </div>
      <div class="row">
    		<div class="col-md-offset-4 col-md-4">
    			<h3 style="text-align:center;">Création de dossier</h3>
    	  </div>
  	  </div>
    <form class="form-horizontal" role="form" method=POST action="index.php">
      <div class="row">
        <div class="form-group">
        <label class="col-md-offset-4 col-md-2 control-label" for="nom">* Nom :</label>
            <div class="col-md-2">
              <input name="lastname" id="nom" class="form-control" onblur="verif('lastname')"  type="text" placeholder="..." value="">
            </div>
        </div>
      </div>
      
      <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="prenom">* Prénom :</label>
            <div class="col-md-2">
              <input name="firstname" id="prenom" class="form-control" onblur="verif('firstname')" type="text" placeholder="...">
            </div>
        </div>
      </div>
      
      <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="date">* Date de prise de contact :</label>
            <div class="col-md-2">
              <input name="date" id="date" class="form-control" onblur="verif('date')" type="date" placeholder="aaaa-mm-jj">
            </div>
        </div>
      </div>
      
      <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="relance">* Date de relance :</label>
            <div class="col-md-2">
              <input name="relance" id="relance" class="form-control" onblur="verif('relance')" type="date" placeholder="aaaa-mm-jj">
            </div>
        </div>
      </div>
      
      <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="part">Commission :</label>
            <div class="col-md-2">
              <input name="part" id="part" class="form-control" onblur="verifMoins('part')" type="text" placeholder="...€">
            </div>
        </div>
      </div>
      
      <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="commentaire">Commentaire :</label>
            <div class="col-md-2">
              <input name="commentaire" id="commentaire" class="form-control" onblur="verifMoins('commentaire')" type="text" placeholder="...">
            </div>
        </div>
      </div>
      
       <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="apporteur">Apporteur :</label>
            <div class="col-md-2">
              <input name="apporteur" id="apporteur" class="form-control" onblur="verifMoins('apporteur')" type="text" placeholder="...">
            </div>
        </div>
      </div> 
      
      <div class="row">
        <div class="form-group">
            <label class="col-md-offset-4 col-md-2 control-label" for="agence">* Attribution :</label>
            <div class="col-md-2">
              <select name="utilisateur" id="utilisateur" class="form-control">
                <?php 
                foreach ($listeAgence as $agence){
                    echo ' <optgroup label="'.$agence[1].'">';
                    foreach ($agence[2] as $utilisateur){
                        echo'<option value="'.$agence[0].';'.$utilisateur.'">'.$utilisateur.'</option>';
                    }
                    echo '</optgroup>';
                }?>     
              </select>
            </div>
        </div>
      </div>
                <p class="col-md-offset-4 col-md-4">Les champs marqués d'un astérisque (*) sont obligatoires. </p>
        
         <div class="row">
              <button name="envoyer" type="submit" class="col-md-offset-4 col-md-4 btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> Envoyer</button> 
          </div>
      </form><br>
        <div class="container">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Vous ne pouvez pas créer un dossier si les champs obligatoires ne sont pas remplis. </strong><a href="docs/créationDossier.html">Pour plus d'informations.</a>.
                </div>
            </div>
      
    <script type="text/javascript">
        $("button[name=envoyer]").attr("disabled", "disabled");
        var bon =false;
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
      		$('input[name="'+nom+'"]').parent().append('<span class="glyphicon glyphicon-ok form-control-feedback obligatoire"></span>');
      	}
    	$("input").parent().has('span[class="glyphicon glyphicon-ok form-control-feedback obligatoire"]').each(function(){
  		  i++;});
    	  if(i==4){ bon=true; } else{bon=false;}
      	if(bon==true){
        	$("button[name=envoyer]").removeAttr("disabled");
        }
      	else{
      		$("button[name=envoyer]").attr("disabled", "disabled");
          	}
        }
        function verifMoins(nom){
        	  if($('input[name="'+nom+'"]').parent().has("span")){
        			$('input[name="'+nom+'"]').parent().find("span").remove();
        		}
        	if($('input[name="'+nom+'"]').val()==""){
        		$('input[name="'+nom+'"]').parent().parent().attr('class', "form-group has-warning has-feedback");
        		$('input[name="'+nom+'"]').parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
        	}
        	else{
        		$('input[name="'+nom+'"]').parent().parent().attr('class', "form-group has-success has-feedback");
        		$('input[name="'+nom+'"]').parent().append('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
        	}
          }
        </script>
        <?php
    }
    
    
}
?>