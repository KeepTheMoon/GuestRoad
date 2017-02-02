<?php
/**
 * Class vue Agence
 */
/**
 * vue de la partie agence
 * @author baptiste
 * @package vue
 */
class vueAgence{
/**
 * Créer les différents rectangles représentant les agences
 * @param string[] $liste
 */
   public function tableau($liste){
       ?>
       
<div class="container">
<h4>Gestion des agences</h4>
    
<div class="modal fade" id="suppression" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Voulez vous vraiment supprimer l'agence ?</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="index.php?section=agence&suppr=true"> 
            <input type="hidden"  name="supprAgence" id="agence">
            <button class="btn btn-xs btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
            <button type="submit" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-ok"></span> Confirmer</button>
            </form>
            </div>
          </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modifNom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-s">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Veuillez entrer un nouveau nom pour cette agence</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="index.php?section=agence&modif=true"> 
            <input type='text' class="form-control" name='nom' id='nom' placeholder='Nom'><br>
            <input type="hidden"  name="modifAgence" id="agence">
            <button class="btn btn-xs btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
            <button type="submit" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-ok"></span> Confirmer</button>
            </form>
            </div>
          </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="nouvelleAgence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-s">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Veuillez entrer un nom pour cette nouvelle agence</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="index.php?section=agence&nouveau=true"> 
          
            <input type='text' class="form-control" name='nom' id='nom' placeholder='Nom'><br>
            <button class="btn btn-xs btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
            <button type="submit" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-ok"></span> Confirmer</button>
            </form>
            </div>
          </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php foreach($liste as $agence){?>
    <div class="col-md-6">
        <div style="text-align: center" class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Agence de <?php echo $agence[0];?></h1>
                <br>
                <span class="clickable btn btn-xs btn-primary">Utilisateurs <span class="badge badge-success"><?php echo sizeof($agence[1])?></span></span>
    				<button class="modal-supprAgence btn btn-xs btn-primary" data-agence="<?php echo $agence[0];?>" data-toggle="modal" data-target="#suppression"><span class="glyphicon glyphicon-remove"></span> Supprimer l'agence</button>
      				<button class="modal-modifAgence btn btn-xs btn-primary" data-agence="<?php echo $agence[0];?>" data-toggle="modal" data-target="#modifNom"><span class="glyphicon glyphicon-repeat"></span> Modifier le nom</button>
               </div>
           <div class="panel-body">
           <?php foreach ($agence[1] as $agenceEmploye){
                    echo $agenceEmploye."<br>";
           }?>
           </div>
        </div>
    </div>
<?php }?> 
</div>
       

 <script type="text/javascript">
        jQuery(function ($) {
    
            $('.panel-heading span.clickable').parents('.panel').find('.panel-body').slideUp();
            $('.panel-heading span.clickable').addClass('panel-collapsed');
            $('.panel-heading span.clickable').find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            $('.panel-heading span.clickable').on("click", function (e) {
                if ($(this).hasClass('panel-collapsed')) {
                    // expand the panel
                    $(this).parents('.panel').find('.panel-body').slideDown();
                    $(this).removeClass('panel-collapsed');
                    $(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                }
                else {
                    // collapse the panel
                    $(this).parents('.panel').find('.panel-body').slideUp();
                    $(this).addClass('panel-collapsed');
                    $(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
                }
            });
        });
        $(document).on("click", ".modal-supprAgence", function () {
        	var agence = $(this).data('agence');
            $(".modal-body #agence").val( agence );
        });
        $(document).on("click", ".modal-modifAgence", function () {
        	var agence = $(this).data('agence');
        	$(".modal-body #agence").val( agence );
            $(".modal-body #nom").attr('placeholder', agence );
        });
    </script>


           <div class="row">
                   <button class="col-md-offset-4 col-md-4 btn btn-primary" data-toggle="modal" data-target="#nouvelleAgence">Créer une nouvelle agence</button>
           </div>
           <br>
    <div class="container">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>Cliquer sur le bouton "Utilisateurs" pour les faire apparaître. </strong><a href="docs/tableauAgence.html">Pour plus d'informations.</a>
            </div>
        </div>
   
 
        <?php 
   }
}?>