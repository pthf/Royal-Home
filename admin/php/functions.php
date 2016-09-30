<?php
	if(isset($_POST['namefunction'])){
		include("connect_bd.php");
		// connect_base_de_datos();
		$namefunction = $_POST['namefunction'];
		switch ($namefunction) {
			case 'logOut':
				logOut();
				break;

			case 'agregarNuevoProyecto':
				agregarNuevoProyecto();
				break;
			case 'eliminarProyecto':
				eliminarProyecto($_POST['idProyecto']);
				break;
			case 'agregarImagenesProyecto';
				agregarImagenesProyecto();
				break;
			case 'eliminarImagenProyecto':
				eliminarImagenProyecto($_POST['idImagenProyecto'],$_POST['idProyecto']);
				break;
			case 'editarProyecto':
				editarProyecto();
				break;
			case 'cambiarLogoProyecto':
				cambiarLogoProyecto();
				break;

			case 'agregarNuevoDesarrollo':
				agregarNuevoDesarrollo();
				break;
			case 'eliminarDesarrollo':
				eliminarDesarrollo($_POST['idDesarrollo']);
				break;
			case 'agregarImagenesDesarrollo':
				agregarImagenesDesarrollo();
				break;
			case 'eliminarImagenDesarrollo':
				eliminarImagenDesarrollo($_POST['idImagenDesarrollo'],$_POST['idDesarrollo']);
				break;
			case 'editarDesarrollo':
				editarDesarrollo();
				break;
			case 'cambiarLogoDesarrollo':
				cambiarLogoDesarrollo();
				break;

			case 'agregarNuevaPropiedad':
				agregarNuevaPropiedad();
				break;
			case 'eliminarPropiedad':
				eliminarPropiedad($_POST['idPropiedad']);
				break;
			case 'agregarImagenesPropiedad':
				agregarImagenesPropiedad();
				break;
			case 'eliminarImagenPropiedad':
				eliminarImagenPropiedad($_POST['idImagenPropiedad'],$_POST['idPropiedad']);
				break;
			case 'editarPropiedad':
				editarPropiedad();
				break;
			case 'cambiarLogoPropiedad':
				cambiarLogoPropiedad();
				break;

			case 'agregarTipoInmobiliaria':
				agregarTipoInmobiliaria();
				break;


			case 'addProjectName':
				addProjectName($_POST['nameCategory']);
				break;
			case 'modifyProject':
				modifyProject();
				break;
			case 'deleteProject':
				deleteProject($_POST['idProject'], $_POST['idGallery']);
				break;
			case 'deleteImage':
				deleteImage($_POST['idImage']);
				break;
			case 'addImageGalleryProyect':
				addImageGalleryProyect();
				break;
			case 'addImageSliderHome':
				addImageSliderHome();
				break;
			case 'addImageSliderPromotions':
				addImageSliderPromotions();
				break;
			case 'addImageSliderEquipment':
				addImageSliderEquipment();
				break;
			case 'addImageSliderInstalations':
				addImageSliderInstalations();
				break;
			case 'addImageSliderMaterial':
				addImageSliderMaterial();
				break;
			case 'addImageSliderPersonal':
				addImageSliderPersonal();
				break;
			case 'deleteImageSlider':
				deleteImageSlider($_POST['idImage']);
				break;
			case 'deleteImageSliderPromotions':
				deleteImageSliderPromotions($_POST['idImage']);
				break;
			case 'deleteImageSliderEquipment':
				deleteImageSliderEquipment($_POST['idImage']);
				break;
			case 'deleteImageSliderInstalations':
				deleteImageSliderInstalations($_POST['idImage']);
				break;
			case 'deleteImageSliderMaterial':
				deleteImageSliderMaterial($_POST['idImage']);
				break;
			case 'deleteImageSliderPersonal':
				deleteImageSliderPersonal($_POST['idImage']);
				break;
			case 'addService':
				addService();
				break;
			case 'editService':
				editService();
				break;
			case 'addImageGalleryService':
				addImageGalleryService();
				break;
			case 'deleteImageServices':
				deleteImageServices($_POST['idImage']);
				break;
			case 'deleteService':
				deleteService($_POST['idService'], $_POST['idGalleryRelation']);
				break;
			case 'deleteCategory':
				deleteCategory($_POST['idCategory']);
				break;
			case 'addPatient':
				addPatient();
			break;
			case 'modifyPatient':
				modifyPatient();
			break;
			case 'deletePatient':
				deletePatient($_POST['idPatient']);
				break;
			case 'addContact':
				addContact();
				break;
			case 'resultsPDF':
				resultsPDF();
				break;
			case 'addNewInterestBlog':
				addNewInterestBlog();
				break;
			case 'removeImageGallery':
				removeImageGallery($_POST['idImage']);
				break;
			case 'removeInterestPost':
				removeInterestPost($_POST['idInterestBlog']);
				break;
			case 'setImagesLibrary':
				setImagesLibrary();
				break;
			case 'editNewInterestBlog':
				editNewInterestBlog();
				break;
		}
	}

	function logOut(){
		session_start();
		session_destroy();
	}

	function agregarNuevoProyecto(){
		parse_str($_POST['data'], $data);
		$nombre = $data['nombre-proyecto'];
		$descripcion = $data['descripcion-proyecto'];
		$direccion = $data['direccion-proyecto'];
		$colonia = $data['colonia-proyecto'];
		$codigoPostal = $data['cp-proyecto'];
		$telefono = $data['telefono-proyecto'];
		$email = $data['email-proyecto'];
		$anio = $data['anio-proyecto'];
		$estado = $data['estado-proyecto'];
		$ciudad = $data['ciudad-proyecto'];
		$Inmobiliaria = $data['inmobiliaria-proyecto'];
		$tipoInmobiliaria = $data['tipo-inmobiliaria-proyecto'];

		$query = "INSERT INTO Proyectos VALUES (NULL,'".$nombre."','".$descripcion."','null','null','".$direccion."','".$colonia."','".$codigoPostal."',
												'".$telefono."','".$email."','".$anio."','1','".$estado."','".$ciudad."','".$Inmobiliaria."','".$tipoInmobiliaria."')";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
		//Obtenemos el ultimo id añadido en la tabla Productos
		$rs = mysql_query("SELECT MAX(idProyectos) AS id FROM Proyectos",Conectar::con()) or die (mysql_error());
		if ($row = mysql_fetch_row($rs)) {
			$idProyecto = trim($row[0]);
		}

      	foreach ($_FILES['logo-proyecto']["name"] as $key => $value) {
        $fileName = $_FILES["logo-proyecto"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["logo-proyecto"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["logo-proyecto"]["type"][$key];
        $fileTemp = $_FILES["logo-proyecto"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/logos-proyectos/".$fileName);
  			$query = "UPDATE Proyectos SET logoProyecto = '".$fileName."' WHERE idProyectos = '".$idProyecto."'";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}

  		foreach ($_FILES['imagenes-proyecto']["name"] as $key => $value) {
        $fileName = $_FILES["imagenes-proyecto"]["name"][$key];
        $fileType = $_FILES["imagenes-proyecto"]["type"][$key];
        $fileTemp = $_FILES["imagenes-proyecto"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/imagenes-proyectos/".$fileName);
  			$query = "INSERT INTO imagenesInmobiliaria VALUES (NULL,'".$fileName."','".$idProyecto."','1')";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  			//Obtenemos el ultimo id añadido en la tabla Proyectos
			$rs = mysql_query("SELECT MAX(idImagenesInmobiliaria) AS id FROM imagenesInmobiliaria",Conectar::con()) or die (mysql_error());
			if ($row = mysql_fetch_row($rs)) {
				$idImagenes = trim($row[0]);
			}
  			$query = "INSERT INTO Proyectos_has_imagenesInmobiliaria VALUES('".$idProyecto."','".$idImagenes."')";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}

  		$query = "SELECT p.idProyectos,img.imagenesInmobiliaria FROM Proyectos p 
					INNER JOIN Proyectos_has_imagenesInmobiliaria phi ON phi.Proyectos_idProyectos = p.idProyectos
					INNER JOIN imagenesInmobiliaria img ON img.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE p.idProyectos = '".$idProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$array_imagenes = array();
		while ($row = mysql_fetch_array($result)) {
			array_push($array_imagenes, $row['imagenesInmobiliaria']);
		}
		$imagenesProyectos = implode(',', $array_imagenes);
		$query = "UPDATE Proyectos SET imagenHomeProyecto = '".$imagenesProyectos."' WHERE idProyectos = '".$idProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}


	function eliminarProyecto($idProyecto){
		$query = "DELETE FROM Proyectos_has_imagenesInmobiliaria WHERE Proyectos_idProyectos = '".$idProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "SELECT imagenesInmobiliaria FROM imagenesInmobiliaria WHERE idTipo = '".$idProyecto."' AND Tipo = 1";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		while ($line = mysql_fetch_array($result)) {
			$imagenProyecto = $line['imagenesInmobiliaria'];
			unlink("../src/images/imagenes-proyectos/".$imagenProyecto);
		}
		$query = "DELETE FROM imagenesInmobiliaria WHERE idTipo = '".$idProyecto."' AND Tipo = '1'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "DELETE FROM Proyectos WHERE idProyectos = '".$idProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function agregarImagenesProyecto(){
		parse_str($_POST['data'], $data);
		foreach ($_FILES['imageGalleryProject']["name"] as $key => $value) {
	        $fileName = $_FILES["imageGalleryProject"]["name"][$key];
	        $fileType = $_FILES["imageGalleryProject"]["type"][$key];
	        $fileTemp = $_FILES["imageGalleryProject"]["tmp_name"][$key];
	        $query = "SELECT * FROM imagenesInmobiliaria WHERE idTipo = '".$data['idProyecto']."' AND tipo = 1 AND imagenesInmobiliaria = '".$fileName."'";
	        $result = mysql_query($query,Conectar::con()) or die(mysql_error());
	        $num_row = mysql_num_rows($result);
	        if ($num_row == 0) {
		        move_uploaded_file($fileTemp, "../src/images/imagenes-proyectos/".$fileName);
	  			$query = "INSERT INTO imagenesInmobiliaria VALUES (NULL,'".$fileName."','".$data['idProyecto']."','1')";
	  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	  			//Obtenemos el ultimo id añadido en la tabla Proyectos
				$rs = mysql_query("SELECT MAX(idImagenesInmobiliaria) AS id FROM imagenesInmobiliaria",Conectar::con()) or die (mysql_error());
				if ($row = mysql_fetch_row($rs)) {
					$idImagenes = trim($row[0]);
				}
	  			$query = "INSERT INTO Proyectos_has_imagenesInmobiliaria VALUES('".$data['idProyecto']."','".$idImagenes."')";
	  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	        }

  		}

	}

	function eliminarImagenProyecto($idImagenProyecto,$idProyecto){
		$query = "DELETE FROM Proyectos_has_imagenesInmobiliaria WHERE Proyectos_idProyectos = '".$idProyecto."' AND imagenesInmobiliaria_idimagenesInmobiliaria = '".$idImagenProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "SELECT imagenesInmobiliaria FROM imagenesInmobiliaria WHERE idimagenesInmobiliaria = '".$idImagenProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$line = mysql_fetch_array($result);
		$imagenProyecto = $line['imagenesInmobiliaria'];
		unlink("../src/images/imagenes-proyectos/".$imagenProyecto);
		$query = "DELETE FROM imagenesInmobiliaria WHERE idimagenesInmobiliaria = '".$idImagenProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function editarProyecto(){
		parse_str($_POST['data'], $data);
		$idProyecto = $data['id-proyecto'];
		$nombre = $data['nombre-proyecto'];
		$descripcion = $data['descripcion-proyecto'];
		$direccion = $data['direccion-proyecto'];
		$colonia = $data['colonia-proyecto'];
		$codigoPostal = $data['cp-proyecto'];
		$telefono = $data['telefono-proyecto'];
		$email = $data['email-proyecto'];
		$anio = $data['anio-proyecto'];
		$estado = $data['estado-proyecto'];
		$ciudad = $data['ciudad-proyecto'];
		$Inmobiliaria = $data['inmobiliaria-proyecto'];
		$tipoInmobiliaria = $data['tipo-inmobiliaria-proyecto'];
		$query = "UPDATE Proyectos SET nombreProyecto='".$nombre."',descripProyecto='".$descripcion."',direccionProyecto='".$direccion."',
							coloniaProyecto='".$colonia."',cpProyecto='".$codigoPostal."',telProyecto='".$telefono."',emailProyecto='".$email."',anioProyecto='".$anio."',
							Estados_idEstados='".$estado."',Ciudades_idCiudades='".$ciudad."',tipoInmobiliaria_idtipoInmobiliaria='".$Inmobiliaria."',
							subcategoriaInmobiliaria_idsubcategoriaInmobiliaria='".$tipoInmobiliaria."' WHERE idProyectos = '".$idProyecto."'";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	}

	function cambiarLogoProyecto(){
		parse_str($_POST['data'], $data);
		$query = "SELECT logoProyecto FROM Proyectos WHERE idProyectos = '".$data['idProyecto']."'";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
		$row = mysql_fetch_array($result);
		$logoProyecto = $row['logoProyecto'];
		unlink("../src/images/logos-proyectos/".$logoProyecto);
		foreach ($_FILES['imageLogoProject']["name"] as $key => $value) {
        $fileName = $_FILES["imageLogoProject"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["imageLogoProject"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["imageLogoProject"]["type"][$key];
        $fileTemp = $_FILES["imageLogoProject"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/logos-proyectos/".$fileName);
  			$query = "UPDATE Proyectos SET logoProyecto = '".$fileName."' WHERE idProyectos = '".$data['idProyecto']."'";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}
	}

	function agregarNuevoDesarrollo(){
		parse_str($_POST['data'], $data);
		$nombre = $data['nombre-desarrollo'];
		$descripcion = $data['descripcion-desarrollo'];
		$direccion = $data['direccion-desarrollo'];
		$colonia = $data['colonia-desarrollo'];
		$codigoPostal = $data['cp-desarrollo'];
		$telefono = $data['telefono-desarrollo'];
		$email = $data['email-desarrollo'];
		$anio = $data['anio-desarrollo'];
		$estado = $data['estado-desarrollo'];
		$ciudad = $data['ciudad-desarrollo'];
		$Inmobiliaria = $data['inmobiliaria-desarrollo'];
		$tipoInmobiliaria = $data['tipo-inmobiliaria-desarrollo'];

		$query = "INSERT INTO Desarrollos VALUES (NULL,'".$nombre."','".$descripcion."','null','null','".$direccion."','".$colonia."','".$codigoPostal."',
												'".$telefono."','".$email."','".$anio."',2,'".$estado."','".$ciudad."','".$Inmobiliaria."','".$tipoInmobiliaria."')";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
		//Obtenemos el ultimo id añadido en la tabla Productos
		$rs = mysql_query("SELECT MAX(idDesarrollos) AS id FROM Desarrollos",Conectar::con()) or die (mysql_error());
		if ($row = mysql_fetch_row($rs)) {
			$idDesarrollo = trim($row[0]);
		}

      	foreach ($_FILES['logo-desarrollo']["name"] as $key => $value) {
        $fileName = $_FILES["logo-desarrollo"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["logo-desarrollo"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["logo-desarrollo"]["type"][$key];
        $fileTemp = $_FILES["logo-desarrollo"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/logos-desarrollos/".$fileName);
  			$query = "UPDATE Desarrollos SET logoDesarrollo = '".$fileName."' WHERE idDesarrollos = '".$idDesarrollo."'";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}

  		foreach ($_FILES['imagenes-desarrollo']["name"] as $key => $value) {
        $fileName = $_FILES["imagenes-desarrollo"]["name"][$key];
        $fileType = $_FILES["imagenes-desarrollo"]["type"][$key];
        $fileTemp = $_FILES["imagenes-desarrollo"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/imagenes-desarrollos/".$fileName);
  			$query = "INSERT INTO imagenesInmobiliaria VALUES (NULL,'".$fileName."','".$idDesarrollo."','2')";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  			//Obtenemos el ultimo id añadido en la tabla Proyectos
			$rs = mysql_query("SELECT MAX(idImagenesInmobiliaria) AS id FROM imagenesInmobiliaria",Conectar::con()) or die (mysql_error());
			if ($row = mysql_fetch_row($rs)) {
				$idImagenes = trim($row[0]);
			}
  			$query = "INSERT INTO Desarrollos_has_imagenesInmobiliaria VALUES('".$idDesarrollo."','".$idImagenes."')";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}
  		$query = "SELECT d.idDesarrollos,img.imagenesInmobiliaria FROM Desarrollos d 
					INNER JOIN Desarrollos_has_imagenesInmobiliaria dhi ON dhi.Desarrollos_idDesarrollos = d.idDesarrollos
					INNER JOIN imagenesInmobiliaria img ON img.idimagenesInmobiliaria = dhi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE d.idDesarrollos = '".$idDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$array_imagenes = array();
		while ($row = mysql_fetch_array($result)) {
			array_push($array_imagenes, $row['imagenesInmobiliaria']);
		}
		$imagenesDesarrollos = implode(',', $array_imagenes);
		$query = "UPDATE Desarrollos SET imagenHomeDesarrollo = '".$imagenesDesarrollos."' WHERE idDesarrollos = '".$idDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function eliminarDesarrollo($idDesarrollo){
		$query = "DELETE FROM Desarrollos_has_imagenesInmobiliaria WHERE Desarrollos_idDesarrollos = '".$idDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "SELECT imagenesInmobiliaria FROM imagenesInmobiliaria WHERE idTipo = '".$idDesarrollo."' AND Tipo = 2";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		while ($line = mysql_fetch_array($result)) {
			$imagenDesarrollo = $line['imagenesInmobiliaria'];
			unlink("../src/images/imagenes-desarrollos/".$imagenDesarrollo);
		}
		$query = "DELETE FROM imagenesInmobiliaria WHERE idTipo = '".$idDesarrollo."' AND Tipo = '2'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "DELETE FROM Desarrollos WHERE idDesarrollos = '".$idDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function agregarImagenesDesarrollo(){
		parse_str($_POST['data'], $data);
		foreach ($_FILES['imageGalleryDesarrollo']["name"] as $key => $value) {
	        $fileName = $_FILES["imageGalleryDesarrollo"]["name"][$key];
	        $fileType = $_FILES["imageGalleryDesarrollo"]["type"][$key];
	        $fileTemp = $_FILES["imageGalleryDesarrollo"]["tmp_name"][$key];
	        $query = "SELECT * FROM imagenesInmobiliaria WHERE idTipo = '".$data['idDesarrollo']."' AND tipo = 2 AND imagenesInmobiliaria = '".$fileName."'";
	        $result = mysql_query($query,Conectar::con()) or die(mysql_error());
	        $num_row = mysql_num_rows($result);
	        if ($num_row == 0) {
		        move_uploaded_file($fileTemp, "../src/images/imagenes-desarrollos/".$fileName);
	  			$query = "INSERT INTO imagenesInmobiliaria VALUES (NULL,'".$fileName."','".$data['idDesarrollo']."','2')";
	  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	  			//Obtenemos el ultimo id añadido en la tabla Proyectos
				$rs = mysql_query("SELECT MAX(idImagenesInmobiliaria) AS id FROM imagenesInmobiliaria",Conectar::con()) or die (mysql_error());
				if ($row = mysql_fetch_row($rs)) {
					$idImagenes = trim($row[0]);
				}
	  			$query = "INSERT INTO Desarrollos_has_imagenesInmobiliaria VALUES('".$data['idDesarrollo']."','".$idImagenes."')";
	  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	        }

  		}

	}

	function eliminarImagenDesarrollo($idImagenDesarrollo,$idDesarrollo){
		$query = "DELETE FROM Desarrollos_has_imagenesInmobiliaria WHERE Desarrollos_idDesarrollos = '".$idDesarrollo."' AND imagenesInmobiliaria_idimagenesInmobiliaria = '".$idImagenDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "SELECT imagenesInmobiliaria FROM imagenesInmobiliaria WHERE idimagenesInmobiliaria = '".$idImagenDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$line = mysql_fetch_array($result);
		$imagenDesarrollo = $line['imagenesInmobiliaria'];
		unlink("../src/images/imagenes-desarrollos/".$imagenDesarrollo);
		$query = "DELETE FROM imagenesInmobiliaria WHERE idimagenesInmobiliaria = '".$idImagenDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function editarDesarrollo(){
		parse_str($_POST['data'], $data);
		$idDesarrollo = $data['id-desarrollo'];
		$nombre = $data['nombre-desarrollo'];
		$descripcion = $data['descripcion-desarrollo'];
		$direccion = $data['direccion-desarrollo'];
		$colonia = $data['colonia-desarrollo'];
		$codigoPostal = $data['cp-desarrollo'];
		$telefono = $data['telefono-desarrollo'];
		$email = $data['email-desarrollo'];
		$anio = $data['anio-desarrollo'];
		$estado = $data['estado-desarrollo'];
		$ciudad = $data['ciudad-desarrollo'];
		$Inmobiliaria = $data['inmobiliaria-desarrollo'];
		$tipoInmobiliaria = $data['tipo-inmobiliaria-desarrollo'];
		$query = "UPDATE Desarrollos SET nombreDesarrollo='".$nombre."',descripDesarrollo='".$descripcion."',direccionDesarrollo='".$direccion."',
							coloniaDesarrollo='".$colonia."',cpDesarrollo='".$codigoPostal."',telDesarrollo='".$telefono."',emailDesarrollo='".$email."',anioDesarrollo='".$anio."',
							Estados_idEstados='".$estado."',Ciudades_idCiudades='".$ciudad."',tipoInmobiliaria_idtipoInmobiliaria='".$Inmobiliaria."',
							subcategoriaInmobiliaria_idsubcategoriaInmobiliaria='".$tipoInmobiliaria."' WHERE idDesarrollos = '".$idDesarrollo."'";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	}

	function cambiarLogoDesarrollo(){
		parse_str($_POST['data'], $data);
		$query = "SELECT logoDesarrollo FROM Desarrollos WHERE idDesarrollos = '".$data['idDesarrollo']."'";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
		$row = mysql_fetch_array($result);
		$logoDesarrollo = $row['logoDesarrollo'];
		unlink("../src/images/logos-desarrollos/".$logoDesarrollo);
		foreach ($_FILES['imageLogoDesarrollo']["name"] as $key => $value) {
        $fileName = $_FILES["imageLogoDesarrollo"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["imageLogoDesarrollo"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["imageLogoDesarrollo"]["type"][$key];
        $fileTemp = $_FILES["imageLogoDesarrollo"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/logos-desarrollos/".$fileName);
  			$query = "UPDATE Desarrollos SET logoDesarrollo = '".$fileName."' WHERE idDesarrollos = '".$data['idDesarrollo']."'";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}
	}

	function agregarNuevaPropiedad(){
		parse_str($_POST['data'], $data);
		$nombre = $data['nombre-propiedad'];
		$descripcion = $data['descripcion-propiedad'];
		$direccion = $data['direccion-propiedad'];
		$colonia = $data['colonia-propiedad'];
		$codigoPostal = $data['cp-propiedad'];
		$telefono = $data['telefono-propiedad'];
		$email = $data['email-propiedad'];
		$estado = $data['estado-propiedad'];
		$ciudad = $data['ciudad-propiedad'];
		$Inmobiliaria = $data['inmobiliaria-propiedad'];
		$tipoInmobiliaria = $data['tipo-inmobiliaria-propiedad'];
		$tipoOperacionPropiedad = $data['tipo-operacion-propiedad'];

		$query = "INSERT INTO Propiedades VALUES (NULL,'".$nombre."','".$descripcion."','null','null','".$direccion."','".$colonia."','".$codigoPostal."',
												'".$telefono."','".$email."','3','".$estado."','".$ciudad."','".$tipoOperacionPropiedad."','".$Inmobiliaria."','".$tipoInmobiliaria."')";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
		//Obtenemos el ultimo id añadido en la tabla Productos
		$rs = mysql_query("SELECT MAX(idPropiedades) AS id FROM Propiedades",Conectar::con()) or die (mysql_error());
		if ($row = mysql_fetch_row($rs)) {
			$idPropiedad = trim($row[0]);
		}

      	foreach ($_FILES['logo-propiedad']["name"] as $key => $value) {
        $fileName = $_FILES["logo-propiedad"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["logo-propiedad"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["logo-propiedad"]["type"][$key];
        $fileTemp = $_FILES["logo-propiedad"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/logos-propiedades/".$fileName);
  			$query = "UPDATE Propiedades SET logoPropiedad = '".$fileName."' WHERE idPropiedades = '".$idPropiedad."'";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}

  		foreach ($_FILES['imagenes-propiedad']["name"] as $key => $value) {
        $fileName = $_FILES["imagenes-propiedad"]["name"][$key];
        $fileType = $_FILES["imagenes-propiedad"]["type"][$key];
        $fileTemp = $_FILES["imagenes-propiedad"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/imagenes-propiedades/".$fileName);
  			$query = "INSERT INTO imagenesInmobiliaria VALUES (NULL,'".$fileName."','".$idPropiedad."','3')";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  			//Obtenemos el ultimo id añadido en la tabla Proyectos
			$rs = mysql_query("SELECT MAX(idImagenesInmobiliaria) AS id FROM imagenesInmobiliaria",Conectar::con()) or die (mysql_error());
			if ($row = mysql_fetch_row($rs)) {
				$idImagenes = trim($row[0]);
			}
  			$query = "INSERT INTO Propiedades_has_imagenesInmobiliaria VALUES('".$idPropiedad."','".$idImagenes."')";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}
  		$query = "SELECT p.idPropiedades,img.imagenesInmobiliaria FROM Propiedades p 
					INNER JOIN Propiedades_has_imagenesInmobiliaria phi ON phi.Propiedades_idPropiedades = p.idPropiedades
					INNER JOIN imagenesInmobiliaria img ON img.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE p.idPropiedades = '".$idPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$array_imagenes = array();
		while ($row = mysql_fetch_array($result)) {
			array_push($array_imagenes, $row['imagenesInmobiliaria']);
		}
		$imagenesPropiedades = implode(',', $array_imagenes);
		$query = "UPDATE Propiedades SET imagenHomePropiedad = '".$imagenesPropiedades."' WHERE idPropiedades = '".$idPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function eliminarPropiedad($idPropiedad){
		$query = "DELETE FROM Propiedades_has_imagenesInmobiliaria WHERE Propiedades_idPropiedades = '".$idPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "SELECT imagenesInmobiliaria FROM imagenesInmobiliaria WHERE idTipo = '".$idPropiedad."' AND Tipo = 3";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		while ($line = mysql_fetch_array($result)) {
			$imagenPropiedad = $line['imagenesInmobiliaria'];
			unlink("../src/images/imagenes-propiedades/".$imagenPropiedad);
		}
		$query = "DELETE FROM imagenesInmobiliaria WHERE idTipo = '".$idPropiedad."' AND Tipo = '3'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "DELETE FROM Propiedades WHERE idPropiedades = '".$idPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function agregarImagenesPropiedad(){
		parse_str($_POST['data'], $data);
		foreach ($_FILES['imageGalleryPropiedad']["name"] as $key => $value) {
	        $fileName = $_FILES["imageGalleryPropiedad"]["name"][$key];
	        $fileType = $_FILES["imageGalleryPropiedad"]["type"][$key];
	        $fileTemp = $_FILES["imageGalleryPropiedad"]["tmp_name"][$key];
	        $query = "SELECT * FROM imagenesInmobiliaria WHERE idTipo = '".$data['idPropiedad']."' AND tipo = 3 AND imagenesInmobiliaria = '".$fileName."'";
	        $result = mysql_query($query,Conectar::con()) or die(mysql_error());
	        $num_row = mysql_num_rows($result);
	        if ($num_row == 0) {
		        move_uploaded_file($fileTemp, "../src/images/imagenes-propiedades/".$fileName);
	  			$query = "INSERT INTO imagenesInmobiliaria VALUES (NULL,'".$fileName."','".$data['idPropiedad']."','3')";
	  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	  			//Obtenemos el ultimo id añadido en la tabla Proyectos
				$rs = mysql_query("SELECT MAX(idImagenesInmobiliaria) AS id FROM imagenesInmobiliaria",Conectar::con()) or die (mysql_error());
				if ($row = mysql_fetch_row($rs)) {
					$idImagenes = trim($row[0]);
				}
	  			$query = "INSERT INTO Propiedades_has_imagenesInmobiliaria VALUES('".$data['idPropiedad']."','".$idImagenes."')";
	  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	        }

  		}

	}

	function eliminarImagenPropiedad($idImagenPropiedad,$idPropiedad){
		$query = "DELETE FROM Propiedades_has_imagenesInmobiliaria WHERE Propiedades_idPropiedades = '".$idPropiedad."' AND imagenesInmobiliaria_idimagenesInmobiliaria = '".$idImagenPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$query = "SELECT imagenesInmobiliaria FROM imagenesInmobiliaria WHERE idimagenesInmobiliaria = '".$idImagenPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$line = mysql_fetch_array($result);
		$imagenPropiedad = $line['imagenesInmobiliaria'];
		unlink("../src/images/imagenes-propiedades/".$imagenPropiedad);
		$query = "DELETE FROM imagenesInmobiliaria WHERE idimagenesInmobiliaria = '".$idImagenPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
	}

	function editarPropiedad(){
		parse_str($_POST['data'], $data);
		$idPropiedad = $data['id-propiedad'];
		$nombre = $data['nombre-propiedad'];
		$descripcion = $data['descripcion-propiedad'];
		$direccion = $data['direccion-propiedad'];
		$colonia = $data['colonia-propiedad'];
		$codigoPostal = $data['cp-propiedad'];
		$telefono = $data['telefono-propiedad'];
		$email = $data['email-propiedad'];
		$estado = $data['estado-propiedad'];
		$ciudad = $data['ciudad-propiedad'];
		$Inmobiliaria = $data['inmobiliaria-propiedad'];
		$tipoInmobiliaria = $data['tipo-inmobiliaria-propiedad'];
		$tipoOperacionPropiedad = $data['tipo-operacion-propiedad'];
		$query = "UPDATE Propiedades SET nombrePropiedad='".$nombre."',descripPropiedad='".$descripcion."',direccionPropiedad='".$direccion."',
							coloniaPropiedad='".$colonia."',cpPropiedad='".$codigoPostal."',telPropiedad='".$telefono."',emailPropiedad='".$email."',
							Estados_idEstados='".$estado."',Ciudades_idCiudades='".$ciudad."',tipoOperacion_idtipoOperacion='".$tipoOperacionPropiedad."',
							tipoInmobiliaria_idtipoInmobiliaria='".$Inmobiliaria."',subcategoriaInmobiliaria_idsubcategoriaInmobiliaria='".$tipoInmobiliaria."' 
							WHERE idPropiedades = '".$idPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
	}

	function cambiarLogoPropiedad(){
		parse_str($_POST['data'], $data);
		$query = "SELECT logoPropiedad FROM Propiedades WHERE idPropiedades = '".$data['idPropiedad']."'";
		$result = mysql_query($query,Conectar::con()) or die (mysql_error());
		$row = mysql_fetch_array($result);
		$logoPropiedad = $row['logoPropiedad'];
		unlink("../src/images/logos-propiedades/".$logoPropiedad);
		foreach ($_FILES['imageLogoPropiedad']["name"] as $key => $value) {
        $fileName = $_FILES["imageLogoPropiedad"]["name"][$key];
		$fileName = date("YmdHis").pathinfo($_FILES["imageLogoPropiedad"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["imageLogoPropiedad"]["type"][$key];
        $fileTemp = $_FILES["imageLogoPropiedad"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/logos-propiedades/".$fileName);
  			$query = "UPDATE Propiedades SET logoPropiedad = '".$fileName."' WHERE idPropiedades = '".$data['idPropiedad']."'";
  			$result = mysql_query($query,Conectar::con()) or die (mysql_error());
  		}
	}


	function agregarTipoInmobiliaria(){
		parse_str($_POST['data'], $data);
		$query = "SELECT * FROM subcategoriaInmobiliaria 
					WHERE subcategoriaInmobiliaria = '".$data['nombre-tipoInmobiliaria']."' AND tipoInmobiliaria_idtipoInmobiliaria = '".$data['id-tipoInmobiliaria']."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$num_row = mysql_num_rows($result);
		if ($num_row == 0) {
			$query = "INSERT INTO subcategoriaInmobiliaria VALUES (null,'".$data['nombre-tipoInmobiliaria']."','".$data['id-tipoInmobiliaria']."')";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error()); 
		}
	}

	function modifyProject(){

		parse_str($_POST['data'], $arrayData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$idnote = $arrayData['note-id'];
		$query = "UPDATE notes SET notesName = '".$arrayData['note-name']."', notesDescription = '".$arrayData['note-description']."', 
								notesDate = '".$datatime."', notesState = '".$arrayData['note-state']."', notesCity = '".$arrayData['note-city']."' WHERE idnotes =  $idnote";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function deleteImage($idImage){
		$query = "DELETE FROM imagesNotes WHERE idimagesNotes = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function addImageGalleryProyect(){

		parse_str($_POST['action'],$formData);
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/notes/".$fileName);
			$query = "INSERT INTO imagesNotes (imagesNotesName, notes_idnotes) VALUES ('".$fileName."', ".$formData['idnotes'].")";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}

	}

	function addImageSliderHome(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageBannerHome']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageBannerHome"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageGallery"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageBannerHome"]["type"][$key];
			$fileTemp = $_FILES["insertImageBannerHome"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderHome/".$fileName);
			$query = "INSERT INTO bannersHome VALUES ('','".$fileName."','".$formData['home-url']."','".$formData['home-name']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function addImageSliderPromotions(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageBannerPromotions']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageBannerPromotions"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageBannerPromotions"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageBannerPromotions"]["type"][$key];
			$fileTemp = $_FILES["insertImageBannerPromotions"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderPromotions/".$fileName);
			$query = "INSERT INTO bannersPromotions VALUES ('','".$fileName."','".$formData['promotions-url']."','".$formData['promotions-name']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function addImageSliderEquipment(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderEquipment']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderEquipment"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderEquipment"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderEquipment"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderEquipment"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderEquipment/".$fileName);
			$query = "INSERT INTO bannersEquipment VALUES ('','".$fileName."','".$formData['equipment-url']."','".$formData['equipment-name']."','".$formData['equipment-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function addImageSliderInstalations(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderInstalations']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderInstalations"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderInstalations"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderInstalations"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderInstalations"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderInstalations/".$fileName);
			$query = "INSERT INTO bannersInstalations VALUES ('','".$fileName."','".$formData['instalations-url']."','".$formData['instalations-name']."','".$formData['instalations-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function addImageSliderMaterial(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderMaterial']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderMaterial"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderMaterial"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderMaterial"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderMaterial"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderMaterial/".$fileName);
			$query = "INSERT INTO bannersMaterial VALUES ('','".$fileName."','".$formData['material-url']."','".$formData['material-name']."','".$formData['material-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function addImageSliderPersonal(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderPersonal']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderPersonal"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderPersonal"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderPersonal"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderPersonal"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderPersonal/".$fileName);
			$query = "INSERT INTO bannersPersonal VALUES ('','".$fileName."','".$formData['personal-url']."','".$formData['personal-name']."','".$formData['personal-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function deleteImageSlider($idImage){
		$query = "DELETE FROM bannersHome WHERE idbannersHome = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderPromotions($idImage){
		$query = "DELETE FROM bannersPromotions WHERE idbannersPromotions = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderEquipment($idImage){
		$query = "DELETE FROM bannersEquipment WHERE idbannersEquipment = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderInstalations($idImage){
		$query = "DELETE FROM bannersInstalations WHERE idbannersInstalations = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderMaterial($idImage){
		$query = "DELETE FROM bannersMaterial WHERE idbannersMaterial = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderPersonal($idImage){
		$query = "DELETE FROM bannersPersonal WHERE idbannersPersonal = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function addService(){

		parse_str($_POST['action'],$formData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		
		$query = "INSERT INTO services VALUES ('','".$formData['service-name']."','".$formData['service-description']."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

		// $id_service = mysql_insert_id(); 
		$rs = mysqli_query(Conectar::con(),"SELECT MAX(idservices) AS id FROM services") or die (mysql_error());
		if ($row = mysqli_fetch_row($rs)) {
			$id_service = trim($row[0]);

			foreach ($_FILES['imageSlidersServices']["name"] as $key => $value) {
				$fileName = $_FILES["imageSlidersServices"]["name"][$key];
				$fileType = $_FILES["imageSlidersServices"]["type"][$key];
				$fileTemp = $_FILES["imageSlidersServices"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../src/images/services/".$fileName);
				$query1 = "INSERT INTO imagesServices VALUES ('','".$fileName."','".$id_service."')";
				$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));
			}
		}
	}
		
	function addImageGalleryService(){
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageGallery"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/services/".$fileName);
			$query = "INSERT INTO  imagegalleryservices (imageGallery, idGalleryRelation) VALUES ('".$fileName."', ".$_POST["idGalleryRelation"].")";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function deleteImageServices($idImage){
		$query = "DELETE FROM imagegalleryservices WHERE idImageGallery = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function editService(){

		parse_str($_POST['data'], $arrayData);

		$idservice = $arrayData['service-id'];
		$query = "UPDATE services SET servicesName = '".$arrayData['service-name']."', servicesDescription = '".$arrayData['service-description']."' WHERE idservices =  $idservice";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function deleteService($idService, $idGalleryRelation){
		$query = "DELETE FROM imagegalleryservices WHERE idGalleryRelation = $idGalleryRelation";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$query = "DELETE FROM services WHERE idService = $idService";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$query = "DELETE FROM galleryrelationservices WHERE idGalleryRelation = $idGalleryRelation ";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function addPatient () {

		parse_str($_POST['action'], $formData);

		foreach ($_FILES['pdfResults']["name"] as $key => $value) {
			$fileName = $_FILES["pdfResults"]["name"][$key];
			$fileName = date("YmdHis").$fileName;
			$fileType = $_FILES["pdfResults"]["type"][$key];
			$fileTemp = $_FILES["pdfResults"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/files/pdf/".$fileName);
		}

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$query = "INSERT INTO resultsPatient VALUES('','".$formData['patient-name']."','".$formData['patient-last-name']."','".$formData['patient-company']."','".$formData['patient-type-result']."','".$datatime."','".$formData['patient-ticket']."','".$fileName."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function modifyPatient () {

		parse_str($_POST['action'], $formData);

		$query = "SELECT * FROM resultsPatient WHERE idresultsPatient = '".$formData['patient-id']."' AND resultsPatientPDF = '".$_FILES["pdfResults"]["name"][0]."'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$num_row = mysqli_num_rows($result);

		if ($num_row == 0) {
			
			foreach ($_FILES['pdfResults']["name"] as $key => $value) {
				$fileName = $_FILES["pdfResults"]["name"][$key];
				$fileName = date("YmdHis").$fileName;
				$fileType = $_FILES["pdfResults"]["type"][$key];
				$fileTemp = $_FILES["pdfResults"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../src/files/pdf/".$fileName);
			}

			date_default_timezone_set('UTC');
		    date_default_timezone_set("America/Mexico_City");
		    $datatime = date("Y-m-d H:i:s");

			$query1 = "UPDATE resultsPatient SET resultsPatientName = '".$formData['patient-name']."', resultsPatientLastName = '".$formData['patient-last-name']."', resultsPatientCompany = '".$formData['patient-company']."', 
												resultsPatientTypeResult = '".$formData['patient-type-result']."', resultsPatientDate = '".$datatime."', 
												resultsPatientTicket = '".$formData['patient-ticket']."', resultsPatientPDF = '".$fileName."' WHERE idresultsPatient = '".$formData['patient-id']."'";
			$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));

		} else {

			date_default_timezone_set('UTC');
		    date_default_timezone_set("America/Mexico_City");
		    $datatime = date("Y-m-d H:i:s");

			$query1 = "UPDATE resultsPatient SET resultsPatientName = '".$formData['patient-name']."', resultsPatientLastName = '".$formData['patient-last-name']."', resultsPatientCompany = '".$formData['patient-company']."', 
			 									resultsPatientTypeResult = '".$formData['patient-type-result']."', resultsPatientDate = '".$datatime."', 
			 									resultsPatientTicket = '".$formData['patient-ticket']."' WHERE idresultsPatient = '".$formData['patient-id']."'";
			$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));

		}

	}

	function deletePatient ($id) {

		$query = "DELETE FROM resultsPatient WHERE idresultsPatient = '".$id."'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function addContact () {

		parse_str($_POST['action'], $formData);
		
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$query = "INSERT INTO contact VALUES('','".$formData['name']."','".$formData['email']."','".$formData['message']."','".$datatime."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function resultsPDF () {

		$query = "SELECT * FROM resultsPatient WHERE resultsPatientTicket = '".$_POST['ticket']."'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$row_num = mysqli_num_rows($result);

		if ($row_num == 0) {
			echo 0;
		} else {
			$row = mysqli_fetch_array($result) or die(mysql_error());
			// $idresultsPatient = $row['idresultsPatient'];
			// echo $idresultsPatient;
			$resultsPatientPDF = $row['resultsPatientPDF'];
			echo $resultsPatientPDF;
		}
	}

	function addNewInterestBlog(){
      parse_str($_POST['data'], $data);

      $name = $data['name'];
      $description = $data['description'];
      $cover = $data['cover'];
      $post = $data['post'];
      date_default_timezone_set('UTC');
      date_default_timezone_set("America/Mexico_City");
      $datatime = date("Y-m-d H:i:s");
      $query = "INSERT INTO interestblog (blogName, blogDate, blogCover, blogShortDescription, blogDocument) VALUES ('$name', '$datatime', '$cover', '$description', '$post')";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
    }

    function removeImageGallery($id){
      // $idImage = $_POST['idImage'];
      $query = "SELECT imageslibraryName FROM imageslibrary WHERE idimageslibrary =".$id;
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $line = mysql_fetch_array($result);
      $nameImage = $line['imageslibraryName'];
      unlink("../src/images/document/".$nameImage);
      $query1 = "DELETE FROM imageslibrary WHERE idimageslibrary = ".$id;
      $result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));
    }

    function removeInterestPost($id){
      // $idInterestBlog = $_POST['idInterestBlog'];
      $query = "DELETE FROM interestblog WHERE idInterestBlog = $id";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
    }

    function setImagesLibrary(){

      foreach ($_FILES['setImage']["name"] as $key => $value) {
		$fileName = $_FILES["setImage"]["name"][$key];
		// $fileName = date("YmdHis").pathinfo($_FILES["setImage"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["setImage"]["type"][$key];
        $fileTemp = $_FILES["setImage"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/document/".$fileName);
        $query = "INSERT INTO  imageslibrary (idimageslibrary, imageslibraryName) VALUES (NULL,'".$fileName."')";
        $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      }

    }

    function editNewInterestBlog(){
      parse_str($_POST['data'], $data);
      $id = $data['id'];
      $name = $data['name'];
      $description = $data['description'];
      $cover = $data['cover'];
      $post = $data['post'];
      $query = "UPDATE interestblog SET blogName = '$name', blogCover = '$cover', blogShortDescription = '$description', blogDocument = '$post' WHERE  idInterestBlog = $id";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
    }
