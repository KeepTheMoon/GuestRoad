
<!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
    <script src="todo.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
    .autocomplete-suggestions { border: 1px solid #999; background: #f4eaea; overflow: auto; }
    .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #F0F0F0; }
    .autocomplete-suggestions strong { font-weight: normal; color: #f24b58; }
    .done-true {
  text-decoration: line-through;
  color: grey;
}

    </style>

  </head>
  <body>
    <h2>Clients</h2>
    <div ng-controller="TodoListController as todoList">
      <form ng-submit="todoList.addTodo()">
        <input type="text" id="client" ng-model="todoList.todoText"  size="30"
               placeholder="Nom ou adresse du client">
        <input class="btn-primary" type="submit" value="ajouter">
      </form>
      <span>{{todoList.todos.length-todoList.remaining()}} sur {{todoList.todos.length}} selectionné(s)</span>
      [ <a href="" ng-click="todoList.archive()">supprimer</a> ]
      <ul class="unstyled">
        <li ng-repeat="todo in todoList.todos">
          <label class="checkbox">
            <input type="checkbox" ng-model="todo.done">
            <span class="done-{{todo.done}}">{{todo.text}}</span>
          </label>
        </li>
      </ul>

    </div>
    <script>
    $('#client').autocomplete({
        source : 'bdd.php'
    });

    </script>
  </body>
</html>
