<?php
  session_start();
  include('../php/connect_bd.php');
  // connect_base_de_datos();
  $query = "SELECT * FROM adminuser WHERE idAdminUser = ".$_SESSION['idAdmin'];
  $result = mysql_query($query,Conectar::con()) or die (mysql_error());
  $line = mysql_fetch_array($result);
?>
<div class="logoNav">
	<a href="#/projects"><img src="../src/images/logoRoyalHome.png" style="width: 81%; !important"></a>
</div>
<div class="msgWelcome" style="width: 90%; height: auto; text-align: center; color: #FFF;" >
</div>
<div class="menuNav" ng-controller="menuNavController">
	<div class="row">
		<div class="col-md-12">
      <ul class="nav nav-pills nav-stacked">
        <li style="background: #32a64a;" role="presentation" ng-class="{active:selected===1}" ng-click="changeNav(1)"><a href="#/proyectos" style="color: #FFF;"><span class="glyphicon glyphicon-briefcase" ></span>PROYECTOS</a></li>
  			<li style="background: #32a64a; color: #FFF;" role="presentation" ng-class="{active:selected===2}" ng-click="changeNav(2)"><a href="#/desarrollos" style="color: #FFF;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>DESARROLLOS</a></li>
        <li style="background: #32a64a; color: #FFF;" role="presentation" ng-class="{active:selected===3}" ng-click="changeNav(3)"><a href="#/propiedades" style="color: #FFF;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>PROPIEDADES</a></li>
        <li style="background: #32a64a; color: #FFF;" role="presentation" ng-class="{active:selected===4}" ng-click="changeNav(4)"><a href="#/tipo-inmobiliaria" style="color: #FFF;"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>CATEGORÍAS GENERALES</a></li>
  		</ul>
		</div>
	</div>
</div>
