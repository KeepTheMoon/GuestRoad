<!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

    <script src="todo.js"></script>
    <link rel="stylesheet" href="todo.css">
  </head>
  <body>
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
              <form ng-submit="todoList.addTodo()">
                <input type="text" id='clientautocomplete' class='auto'ng-model="todoList.todoText"  size="30"
                       placeholder="nom ou adresse du client">
                <button class="btn-primary" type="button" value="ajouter">
              </form>
            </div>
          </div>
          <div class="checkbox">
            <label for="checkboxes-0">
              <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
              Retour entreprise
            </label>
          </div>
          <div class="jumbotron">
            <h2>Liste de clients</h2>
            <div ng-controller="TodoListController as todoList">
              <span>{{todoList.remaining()}} sur {{todoList.todos.length}} selectionnés</span>
              [ <a href="" ng-click="todoList.archive()">Supprimer</a> ]
              <ul class="unstyled">
                <li ng-repeat="todo in todoList.todos">
                  <label class="checkbox">
                    <input type="checkbox" ng-model="todo.done">
                    <span class="done-{{todo.done}}">{{todo.text}}</span>
                  </label>
                </li>
              </ul>
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


    </div>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function() {
	//autocomplete
	$(".auto").autocomplete({
		source: "bdd.php",
		minLength: 1
	});
  $( ".auto" ).autocomplete( "option", "appendTo", ".modal-content" );

});
document.getElementById("mySubmit").disabled = true;
</script>
  </body>
</html>
