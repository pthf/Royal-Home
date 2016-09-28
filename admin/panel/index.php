<?php
  session_start();
  if(!isset($_SESSION['idAdmin']))
    header("Location: ../index.php");
	else{
	}
?>

<!DOCTYPE html>
<html lang="es" ng-app="RoyalHomePanel">
<head>
	<title>ROYAL HOME |  PANEL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="./../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../css/main.css">
</head>
<body>
	<div class="contenedor">
		<div class="menu-nav" style="background: white">
      <menu-nav></menu-nav>
		</div>
		<div class="panel-cont">
			<top-nav></top-nav>
			<div class="viewPanel" ng-view>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="./../js/lib/angular.min.js"></script>
	<script src="./../js/lib/angular-route.min.js"></script>
	<script src="./../js/app.js"></script>
	<script src="./../js/controllers.js"></script>
  	<script src="./../js/directives.js"></script>
	<script src="./../js/services.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  	<script type="text/javascript" src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  	<script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
  	<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/master/dist/clipboard.min.js"></script>
  	<script src="./../js/lib/ngclipboard/dist/ngclipboard.min.js"></script>
  	<script src="./../js/tinymce.js"></script>
	
</body>
</html>
