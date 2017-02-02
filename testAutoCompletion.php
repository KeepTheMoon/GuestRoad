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
<link rel="stylesheet" href="multiselect/dist/css/bootstrap-multiselect.css" type="text/css" />
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

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

</head>
<body>

<style>
.autocomplete-suggestions { border: 1px solid #999; background: #f4eaea; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #f24b58; }
</style>

<p>Entrez le nom d'un pays : <input type="text" id="pays" /></p>

<script>
$(document).ready(function() {
    $('#pays').autocomplete({
        serviceUrl: 'bdd.php',
        dataType: 'json'
    });
});

</script>

<script type="text/javascript" src="js/jquery-ui.js"></script>
 
</body>

