<!DOCTYPE html>
<?php
include("../admin/php/connect_bd.php");
if (isset($_GET['categoria']) && isset($_GET['tipo']) && isset($_GET['estado']) && isset($_GET['ciudad'])) {
  $categoria = $_GET['categoria'];
  $tipo = $_GET['tipo'];
  $estado = $_GET['estado'];
  $ciudad = $_GET['ciudad'];
} else if (isset($_GET['categoria']) && isset($_GET['tipo']) && isset($_GET['estado'])) {
  $categoria = $_GET['categoria'];
  $tipo = $_GET['tipo'];
  $estado = $_GET['estado'];
} else if (isset($_GET['categoria']) && isset($_GET['tipo'])) {
  $categoria = $_GET['categoria'];
  $tipo = $_GET['tipo'];
} else if (isset($_GET['categoria']) && isset($_GET['estado'])) {
  $categoria = $_GET['categoria'];
  $estado = $_GET['estado'];
} else if (isset($_GET['categoria'])) {
  $categoria = $_GET['categoria'];
} else if (isset($_GET['estado'])) {
  $estado = $_GET['estado'];
} else {
  header("Location: ../");
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Royal Home</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,900,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../bower_components/Swiper/dist/css/swiper.min.css" />
  <link rel="stylesheet" href="../bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="../assets/css/main.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--script src="bower_components/angular-route/angular-route.min.js"></script-->
</head>
<body>
<style media="screen">
  header#header {
    background: rgb(110, 178, 83);
  }
  .navbar-fixed-bottom, .navbar-fixed-top{
    position: relative;
  }
</style>
  <header id="header">
  <nav class="navbar navbar-default navbar-fixed-top header">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../"><img onclick="window.scrollTo(0, 0);" class="logo" src=".././assets/images/logo.svg" /></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

          </div><!--/.nav-collapse -->

      </div><!--/.container-fluid -->
  </nav>
  </header>


  <div class="proyectos search-result" id="search-result">
      <div class="container-fluid">

          <div class="grid">
            <?php if (isset($_GET['categoria']) && isset($_GET['tipo']) && isset($_GET['estado']) && isset($_GET['ciudad'])) {
              if ($categoria == 3) {
                $query = "SELECT * FROM Propiedades p
                          INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                          INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                          INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                          INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                          INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion
                          WHERE p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' AND p.Estados_idEstados = '".$estado."' AND p.Ciudades_idCiudades = '".$ciudad."'
                          ORDER BY p.idPropiedades DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomePropiedad']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchB" data-id="<?php echo $row['idPropiedades']?>">
                    <img src="../admin/src/images/imagenes-propiedades/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                          <?php echo $row['nombrePropiedad'];?>
                        </div>
                        <div class="city txt">
                          <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 2) {
                $query = "SELECT * FROM Desarrollos d
                      INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
                      INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
                      INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
                      INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                      WHERE d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' AND d.Estados_idEstados = '".$estado."' AND d.Ciudades_idCiudades = '".$ciudad."'
                      ORDER BY d.idDesarrollos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeDesarrollo']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchA" data-id="<?php echo $row['idDesarrollos']?>">
                    <img src="../admin/src/images/imagenes-desarrollos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreDesarrollo']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 1) {
                $query = "SELECT * FROM Proyectos p
                            INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                            INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                            INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                            INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                            WHERE p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' AND p.Estados_idEstados = '".$estado."' AND p.Ciudades_idCiudades = '".$ciudad."'
                            ORDER BY p.idProyectos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeProyecto']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-search" data-id="<?php echo $row['idProyectos']?>">
                    <img src="../admin/src/images/imagenes-proyectos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreProyecto']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } else if (isset($_GET['categoria']) && isset($_GET['tipo']) && isset($_GET['estado'])) {
              if ($categoria == 3) {
                $query = "SELECT * FROM Propiedades p
                          INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                          INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                          INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                          INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                          INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion
                          WHERE p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' AND p.Estados_idEstados = '".$estado."'
                          ORDER BY p.idPropiedades DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomePropiedad']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchB" data-id="<?php echo $row['idPropiedades']?>">
                    <img src="../admin/src/images/imagenes-propiedades/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                          <?php echo $row['nombrePropiedad'];?>
                        </div>
                        <div class="city txt">
                          <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 2) {
                $query = "SELECT * FROM Desarrollos d
                      INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
                      INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
                      INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
                      INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                      WHERE d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' AND d.Estados_idEstados = '".$estado."'
                      ORDER BY d.idDesarrollos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeDesarrollo']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchA" data-id="<?php echo $row['idDesarrollos']?>">
                    <img src="../admin/src/images/imagenes-desarrollos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreDesarrollo']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 1) {
                $query = "SELECT * FROM Proyectos p
                            INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                            INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                            INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                            INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                            WHERE p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' AND p.Estados_idEstados = '".$estado."'
                            ORDER BY p.idProyectos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeProyecto']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-search" data-id="<?php echo $row['idProyectos']?>">
                    <img src="../admin/src/images/imagenes-proyectos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreProyecto']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } else if (isset($_GET['categoria']) && isset($_GET['tipo'])) {
              if ($categoria == 3) {
                $query = "SELECT * FROM Propiedades p
                          INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                          INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                          INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                          INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                          INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion
                          WHERE p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' ORDER BY p.idPropiedades DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomePropiedad']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchB" data-id="<?php echo $row['idPropiedades']?>">
                    <img src="../admin/src/images/imagenes-propiedades/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                          <?php echo $row['nombrePropiedad'];?>
                        </div>
                        <div class="city txt">
                          <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 2) {
                $query = "SELECT * FROM Desarrollos d
                      INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
                      INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
                      INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
                      INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                      WHERE d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' ORDER BY d.idDesarrollos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeDesarrollo']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchA" data-id="<?php echo $row['idDesarrollos']?>">
                    <img src="../admin/src/images/imagenes-desarrollos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreDesarrollo']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 1) {
                $query = "SELECT * FROM Proyectos p
                            INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                            INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                            INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                            INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                            WHERE p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria = '".$tipo."' ORDER BY p.idProyectos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeProyecto']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-search" data-id="<?php echo $row['idProyectos']?>">
                    <img src="../admin/src/images/imagenes-proyectos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreProyecto']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } else if (isset($_GET['categoria']) && isset($_GET['estado'])) {
              if ($categoria == 3) {
                $query = "SELECT * FROM Propiedades p
                          INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                          INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                          INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                          INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                          INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion
                          WHERE p.Estados_idEstados = '".$estado."' ORDER BY p.idPropiedades DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomePropiedad']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchB" data-id="<?php echo $row['idPropiedades']?>">
                    <img src="../admin/src/images/imagenes-propiedades/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                          <?php echo $row['nombrePropiedad'];?>
                        </div>
                        <div class="city txt">
                          <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 2) {
                $query = "SELECT * FROM Desarrollos d
                      INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
                      INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
                      INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
                      INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                      WHERE d.Estados_idEstados = '".$estado."' ORDER BY d.idDesarrollos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeDesarrollo']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchA" data-id="<?php echo $row['idDesarrollos']?>">
                    <img src="../admin/src/images/imagenes-desarrollos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreDesarrollo']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 1) {
                $query = "SELECT * FROM Proyectos p
                            INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                            INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                            INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                            INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                            WHERE p.Estados_idEstados = '".$estado."' ORDER BY p.idProyectos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeProyecto']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-search" data-id="<?php echo $row['idProyectos']?>">
                    <img src="../admin/src/images/imagenes-proyectos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreProyecto']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } else if (isset($_GET['categoria'])) {
              if ($categoria == 3) {
                $query = "SELECT * FROM Propiedades p
                          INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                          INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                          INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                          INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                          INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion ORDER BY p.idPropiedades DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomePropiedad']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchB" data-id="<?php echo $row['idPropiedades']?>">
                    <img src="../admin/src/images/imagenes-propiedades/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                          <?php echo $row['nombrePropiedad'];?>
                        </div>
                        <div class="city txt">
                          <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 2) {
                $query = "SELECT * FROM Desarrollos d
                      INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
                      INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
                      INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
                      INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria ORDER BY d.idDesarrollos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeDesarrollo']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchA" data-id="<?php echo $row['idDesarrollos']?>">
                    <img src="../admin/src/images/imagenes-desarrollos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreDesarrollo']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } else if ($categoria == 1) {
                $query = "SELECT * FROM Proyectos p
                            INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                            INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                            INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                            INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria ORDER BY p.idProyectos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeProyecto']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-search" data-id="<?php echo $row['idProyectos']?>">
                    <img src="../admin/src/images/imagenes-proyectos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreProyecto']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } else {
              $query = "SELECT * FROM Propiedades p
                        INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                        INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                        INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                        INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                        INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion
                        WHERE p.Estados_idEstados = '".$_GET['estado']."' ORDER BY p.idPropiedades DESC";
              $result = mysql_query($query,Conectar::con()) or die(mysql_error());
              while ($row = mysql_fetch_array($result)) {
                $imagenes = explode(',', $row['imagenHomePropiedad']);?>
                <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchB" data-id="<?php echo $row['idPropiedades']?>">
                  <img src="../admin/src/images/imagenes-propiedades/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                  <div class="cintillo">
                      <div class="title txt">
                        <?php echo $row['nombrePropiedad'];?>
                      </div>
                      <div class="city txt">
                        <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                      </div>
                  </div>
                </div>
              <?php }
              $query = "SELECT * FROM Desarrollos d
                      INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
                      INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
                      INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
                      INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                      WHERE d.Estados_idEstados = '".$_GET['estado']."' ORDER BY d.idDesarrollos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeDesarrollo']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-searchA" data-id="<?php echo $row['idDesarrollos']?>">
                    <img src="../admin/src/images/imagenes-desarrollos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreDesarrollo']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php }
                $query = "SELECT * FROM Proyectos p
                            INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
                            INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
                            INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
                            INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
                            WHERE p.Estados_idEstados = '".$_GET['estado']."' ORDER BY p.idProyectos DESC";
                $result = mysql_query($query,Conectar::con()) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                  $imagenes = explode(',', $row['imagenHomeProyecto']);?>
                  <div class="col-md-3 col-xs-6 col-sm-4 b-grid jalisco item-search" data-id="<?php echo $row['idProyectos']?>">
                    <img src="../admin/src/images/imagenes-proyectos/<?= $imagenes[0];?>" style="height: 359px;width: 100%;"/>
                    <div class="cintillo">
                        <div class="title txt">
                            <?php echo $row['nombreProyecto']?>
                        </div>
                        <div class="city txt">
                            <?php echo $row['nombreCiudad'].', '.$row['nombreEstado'];?>
                        </div>
                    </div>
                  </div>
                <?php } ?>
            <?php } ?>

          </div>
      </div>

  <!-- Modal A -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content slideModal">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <img src=".././assets/images/arrow.png" alt="" />
                  </button>
                  <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body">
                <div class="modal-proyectos"></div>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal B -->
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content slideModal">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <img src=".././assets/images/arrow.png" alt="" />
                  </button>
                  <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body">
                <div class="modal-desarrollos"></div>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal C -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content slideModal">
              <div class="modal-header">
                  <button ng-hide="form" type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <img src=".././assets/images/arrow.png" alt="" />
                  </button>
                  <!-- <button ng-show="form" type="button" class="close" aria-label="Close" ng-click="form=false">
                      <img src=".././assets/images/close.png" alt="" />
                  </button> -->

                  <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body">
                  <div class="modal-propiedades"></div>

                  <div class="container frm-contacto" ng-show="form">
                      <div class="texto col-md-7">
                          <h1 class="contact-title">DEJANOS TUS DATOS PARA COMUNICARNOS CONTIGO</h1>
                          <br><br>
                      </div>
                      <div class="form col-md-8 col-md-offset-2">
                        <form method="post" id="formContactPropiedades">
                            <div class="row">
                                <div class="input-id-propiedad">
                                    <input hidden type="text" name="idPropiedad" value="1">
                                </div>
                                <div class="form-group col-md-12">
                                    <input required class="form-control input-lg" type="text" name="nombre" placeholder="Nombre:">
                                </div>
                                <div class="form-group col-md-12">
                                    <input required class="form-control input-lg" type="text" name="telefono" placeholder="Teléfono:">
                                </div>
                                <div class="form-group col-md-12">
                                    <input required class="form-control input-lg" type="email" name="correo" placeholder="Correo:">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea required name="mensaje" rows="8" cols="40" class="input-lg form-control" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div style="height: 0px;" class="resultado"></div>
                            <div class="text-right">
                                <button type="submit" name="button" class="btn btn-lg btn-success">Enviar</button>
                            </div>
                        </form>
                      </diva>
                  </div>

                  <ng-map id="foo" default-style="true" center="[20.710079593340588, -103.40774611976781]" style="margin-top: 30px;" scrollwheel="false" draggable="true">
                    <marker position="[20.710079593340588, -103.40774611976781]" title="how"></marker>
                  </ng-map>
              </div>
          </div>
      </div>
  </div>

  </div>

  <div class="footer" ng-controller="scroll">
      <div class="h1 col-xs-12">
          <div class="container">
              <div class="row imgs">
                  <div class="col-md-4 col-xs-4 text-left img-responsive">
                      <img src=".././assets/images/footer/f1.png" alt="" />
                  </div>
                  <div class="col-md-4 col-xs-4 text-center long img-responsive">
                      <img  src=".././assets/images/footer/f2.png" alt="" />
                  </div>
                  <div class="col-md-4 col-xs-4 text-right img-responsive">
                      <img src=".././assets/images/footer/f3.png" alt="" />
                  </div>
              </div>
          </div>
      </div>
      <div class="h2 col-xs-12">
          <div class="container">
              <div class="row vertical-align">
                  <div class="col-md-6 col-xs-6">


                      <div class="row">
                          <img class="logo" src=".././assets/images/logo.svg" alt="" />
                      </div>

                      <div class="row">
                          <div class="social col-md-6 col-xs-6">
                              <div class="col-md-2 col-xs-8">
                                  <a href="#">
                                      <img class="img-responsive" src=".././assets/images/footer/fb.png" alt="" />
                                  </a>
                              </div>
                              <div class="col-md-2 col-xs-8">
                                  <a href="#">
                                      <img class="img-responsive" src=".././assets/images/footer/ln.png" alt="" />
                                  </a>
                              </div>
                              <div class="col-md-2 col-xs-8">
                                  <a href="#">
                                      <img class="img-responsive" src=".././assets/images/footer/g.png" alt="" />
                                  </a>
                              </div>
                          </div>



                      </div>

                      <div class="row">
                          <div class="col-md-12 col-xs-12">
                              <address>
                                  Dirección 1971 int. 6 <br>
                                  Fracc. Andares <br>
                                  Guadalajara, Jal. México <br>
                                  <br>
                                  <a href="tel:33333 333 333">33333 333 333</a><br>

                                  <a href="mailto:arquitecto@contacto.com">arquitecto@contacto.com</a>
                                  <br>
                              </address>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6 col-xs-6">
                      <div class="nav col-md-5 col-xs-12 nav-footer">
                          <p class="nav-m">MENU</p>
                          <a href="../" ng-click="scrollTo($event, 'quienesomos')" ><p>Quienes somos</p></a>
                          <a href="../" ng-click="scrollTo($event, 'proyectos')"><p>Proyectos</p></a>
                          <a href="../" ng-click="scrollTo($event, 'desarrollos')"><p>Desarrollos</p></a>
                          <a href="../" ng-click="scrollTo($event, 'propiedades')"><p>Propiedades Disponibles</p></a>
                          <a href="../" ng-click="scrollTo($event, 'contacto')"><p>Contacto</p></a>
                      </div>
                      <div class="col-md-7 text-right col-xs-12 c-arrow">
                          <a href="#">
                              <img onclick="window.scrollTo(0, 0);" class="arrow" src=".././assets/images/arrow.png" alt="" />
                          </a>
                      </div>
                  </div>

              </div>
          </div>
      </div>
      <div class="h3 col-xs-12">
          <div class="container">
              <div class="row">
                  <img class="img-responsive" src=".././assets/images/footer/txt.png" alt="" />
              </div>

          </div>
      </div>
  </div>



  <script src="../bower_components/angular/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../bower_components/angular-parallax/scripts/angular-parallax.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDYC7ZQMvFXYMjseH9iR1P30rqKBo7SOFc"></script>
  <script src="../bower_components/ngmap/build/scripts/ng-map.js"></script>
  <script src="../bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="../bower_components/waypoints/lib/shortcuts/inview.min.js"></script>
  <script src="../bower_components/angular-scroll/angular-scroll.js"></script>
  <script src="../bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

  <script src="../app.js"></script>
  <script src="../controllers/home.js"></script>
  <script src="../directives/directives.js"></script>
  <script src="../services/panoramio.js"></script>
  <script src="../assets/js/fastclick.js"></script>
  <script type="text/javascript">$(function() {FastClick.attach(document.body);});</script>
  <script src="../assets/js/swiper.min.js"></script>

  <style media="screen">.proyectos .grid .b-grid, .desarrollos .grid .b-grid, .propiedades .grid .b-grid .search-result{opacity: 1;}</style>


  <script type="text/javascript">

  $( ".item-search" ).click(function() {
      var idProyecto = $(this).attr('data-id');
      var namefunction = 'modalProyecto';
      $.ajax({
        url: "../admin/php/functions.php",
        type: "POST",
        data: {
          idProyecto: idProyecto,
          namefunction: namefunction
        },
        success: function(result){
          $(".modal-proyectos").html(result);
        },
        error: function(error){
          alert(error);
        }
      });

      $('#myModal').modal({
          show: true,
          backdrop: true
      });

      $('#myModal').on('shown.bs.modal', function(event){

        setTimeout(function(){
          var galleryTop = new Swiper('.gallery-top', {
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
              spaceBetween: 10,
              keyboardControl: true,
              nested: true,
              debugger: false,
              control: galleryThumbs
          });
          var galleryThumbs = new Swiper('.gallery-thumbs', {
              spaceBetween: 10,
              centeredSlides: true,
              slidesPerView: 5,
              touchRatio: 1,
              slideToClickedSlide: true,
              debugger: false,
              nested: true,
              control: galleryTop
          });
          galleryTop.params.control = galleryThumbs;
          galleryThumbs.params.control = galleryTop;
        }, 10);

        $('body,html').css('overflow','hidden');

      });
      $('#myModal').on('hide.bs.modal	', function(event){
          $('body,html').css('overflow','visible');
      })

  });

  </script>

  <script type="text/javascript">

  $( ".item-searchA" ).click(function() {
      var idDesarrollo = $(this).attr('data-id');
      var namefunction = 'modalDesarrollo';
      $.ajax({
        url: "../admin/php/functions.php",
        type: "POST",
        data: {
          idDesarrollo: idDesarrollo,
          namefunction: namefunction
        },
        success: function(result){
          $(".modal-desarrollos").html(result);
        },
        error: function(error){
          alert(error);
        }
      });
      $('#myModal1').modal({
          show: true,
          backdrop: true
      });

      $('#myModal1').on('shown.bs.modal', function(event){

        setTimeout(function(){
          var galleryTop = new Swiper('.gallery-top', {
              nextButton: '.swiper-button-next',
              prevButton: '.swiper-button-prev',
              spaceBetween: 10,
              keyboardControl: true,
              nested: true,
              debugger: false,
              control: galleryThumbs
          });
          var galleryThumbs = new Swiper('.gallery-thumbs', {
              spaceBetween: 10,
              centeredSlides: true,
              slidesPerView: 5,
              touchRatio: 1,
              slideToClickedSlide: true,
              debugger: false,
              nested: true,
              control: galleryTop
          });
          galleryTop.params.control = galleryThumbs;
          galleryThumbs.params.control = galleryTop;
        }, 10);

        $('body,html').css('overflow','hidden');

      });
      $('#myModal1').on('hide.bs.modal ', function(event){
          $('body,html').css('overflow','visible');
      })

  });

  </script>


  <script type="text/javascript">
  $( ".item-searchB" ).click(function() {
    console.log('show slider');
    $('.container.info').removeClass('hide-content');
    $('.container.info').addClass('show-content');

    $('.container.frm-contacto').removeClass('show-content');
    $('.container.frm-contacto').addClass('hide-content');

      var idPropiedades = $(this).attr('data-id');
      var namefunction = 'modalPropiedades';
      $.ajax({
        url: "../admin/php/functions.php",
        type: "POST",
        data: {
          idPropiedades: idPropiedades,
          namefunction: namefunction
        },
        success: function(result){
          $(".modal-propiedades").html(result);
          // $( ".contactanos" ).click(function() {
          //   alert('Disponibilidad');
          //   var idPropiedad = $(".disponible").attr('data-id');
          //   var namefunction = 'modalContactanosPropiedad';
          $( "button.btn.btn-success.btn-lg.available-button" ).click(function() {
            var idPropiedad = $(this).attr('data-id');
            // $('.input-id-propiedad').html('<input hidden type="text" value='+idPropiedad+' name="idPropiedad"');
            console.log('mostrar formulario');
            $('.container.info').removeClass('show-content');
            $('.container.info').addClass('hide-content');

            $('.container.frm-contacto').removeClass('hide-content');
            $('.container.frm-contacto').addClass('show-content');

            $('#formContactPropiedades').submit(function(){
              var ajaxData = new FormData();
              ajaxData.append("namefunction","datosContactaPropiedad");
              ajaxData.append("data", $(this).serialize());
              $.ajax({
                  url: "../admin/php/functions.php",
                  type: "POST",
                  data: ajaxData,
                  processData: false,  // tell jQuery not to process the data
                  contentType: false,   // tell jQuery not to set contentType
                  success: function(result){
                    // alert(result);
                      if (result == 1) {
                          $('#formContactPropiedades')[0].reset();
                          $('.resultado').html('<p style="color:white;padding-top: 1%;">MENSAJE ENVIADO CORRECTAMENTE, PRONTO NOS PONEMOS EN CONTACTO CON USTED.</p>');
                          $('.resultado').css({'opacity' : '1'});
                          setTimeout(function () {
                              $('.resultado').css({'opacity' : '0'});
                              $('.resultado').text('');
                          }, 4000);
                      };
                  },
                  error: function(error){
                    alert(error);
                  }
              });
            });
          });
        },
        error: function(error){
          alert(error);
        }
      });
    $('#myModal2').modal({
        show: true,
        backdrop: true
    });


    $('#myModal2').on('shown.bs.modal', function(event){
          console.log('modal open');
          $('body,html').css('overflow','hidden');

          setTimeout(function(){

            $(document).ready(function () {
              var galleryTop2 = new Swiper('.gallery-top2', {
                  nextButton: '.swiper-button-next',
                  prevButton: '.swiper-button-prev',
                  spaceBetween: 10,
                  setWrapperSize: true,
                  keyboardControl: true,
                  debugger: false
              });
            });
          }, 50);

    });
    $('#myModal2').on('hide.bs.modal', function(event){
        $('body,html').css('overflow','visible');
    })
  });
  </script>

  <script type="text/javascript">
  $( "button.close" ).click(function() {
    console.log('boton cerrar');
    $('.container.info').removeClass('hide-content');
    $('.container.info').addClass('show-content');

    $('.container.frm-contacto').removeClass('show-content');
    $('.container.frm-contacto').addClass('hide-content');
  });
  </script>


  <style media="screen">
    .hide-content{
      display: none !important;
    }

    .show-content{
      display: block !important;
    }
  </style>
</body>
</html>
