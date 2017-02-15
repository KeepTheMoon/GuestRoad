<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<style>
.autocomplete-suggestions { border: 1px solid #999; background: #f4eaea; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #f24b58; }
</style>

<div class="ui-widget">
    <label for="client">Clients: </label>
    <input id="client">
</div>

<script>
$(function() {
    $( "#client" ).autocomplete({
        source: 'bdd.php'
    });
});

</script>
