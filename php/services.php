<?php
	if(isset($_GET['namefunction'])){
		require_once("../backend/conexion.php");
		$namefunction = $_GET['namefunction'];
		switch ($namefunction) {
			case 'getProjectList':
				getProjectList($_GET['idEstado']);
				break;
			case 'getCityList':
				getCityList($_GET['idEstado']);
				break;
			case 'getProjectListCity':
				getProjectListCity($_GET['idCiudad']);
				break;
			case 'getListDetailsProject':
				getListDetailsProject($_GET['id']);
				break;
			case 'getDesarrolloList':
				getDesarrolloList($_GET['idEstado']);
				break;
			case 'getCityListDes':
				getCityListDes($_GET['idEstado']);
				break;
			case 'getDesarrolloListCity':
				getDesarrolloListCity($_GET['idCiudad']);
				break;
			case 'getListDetailsDesarrollo':
				getListDetailsDesarrollo($_GET['id']);
				break;
			case 'getPropiedadList':
				getPropiedadList($_GET['idEstado']);
				break;
			case 'getCityListProp':
				getCityListProp($_GET['idEstado']);
				break;
			case 'getPropiedadListCity':
				getPropiedadListCity($_GET['idCiudad']);
				break;
			case 'getListDetailsPropiedad':
				getListDetailsPropiedad($_GET['id']);
				break;
			case 'getStatesList':
				getStatesList();
				break;	
			case 'getStatesListFront':
				getStatesListFront();
				break;
			case 'getStatesListFrontDes':
				getStatesListFrontDes();
				break;
			case 'getStatesListFrontProp':
				getStatesListFrontProp();
				break;
			case 'getCitiesList':
				getCitiesList();
				break;
			case 'getInmobiliariaList':
				getInmobiliariaList();
				break;
			case 'getTypeInmobiliariaList':
				getTypeInmobiliariaList();
				break;
			case 'getTypeOperationList':
				getTypeOperationList();
				break;
		}
	}

	function getProjectList($idEstado){
		if ($idEstado) {
			$query = "SELECT * FROM Proyectos p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN Proyectos_has_imagenesInmobiliaria phi ON phi.Proyectos_idProyectos = p.idProyectos
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE p.Estados_idEstados = '".$idEstado."' GROUP BY p.idProyectos";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error());
			$arrayAux = array();
			while($line = mysql_fetch_array($result)){
				$arrayAux[] = array(
					'idProyecto' => $line['idProyectos'],
					'nombreProyecto' => $line['nombreProyecto'],
					'descripProyecto' => $line['descripProyecto'],
					'logoProyecto' => $line['logoProyecto'],
					'direccionProyecto' => $line['direccionProyecto'],
					'colonia' => $line['coloniaProyecto'],
					'codigoPostal' => $line['cpProyecto'],
					'telefono' => $line['telProyecto'],
					'email' => $line['emailProyecto'],
					'anio' => $line['anioProyecto'],
					'estado' => $line['nombreEstado'],
					'ciudad' => $line['nombreCiudad'],
					'tipoInmobiliaria' => $line['tipoInmobiliaria'],
					'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
					'imagenHome' => $line['imagenesInmobiliaria']
				);
			}
			echo json_encode($arrayAux);
		} else {
			$query = "SELECT * FROM Proyectos p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN Proyectos_has_imagenesInmobiliaria phi ON phi.Proyectos_idProyectos = p.idProyectos
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					GROUP BY p.idProyectos";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error());
			$arrayAux = array();
			while($line = mysql_fetch_array($result)){
				$arrayAux[] = array(
					'idProyecto' => $line['idProyectos'],
					'nombreProyecto' => $line['nombreProyecto'],
					'descripProyecto' => $line['descripProyecto'],
					'logoProyecto' => $line['logoProyecto'],
					'direccionProyecto' => $line['direccionProyecto'],
					'colonia' => $line['coloniaProyecto'],
					'codigoPostal' => $line['cpProyecto'],
					'telefono' => $line['telProyecto'],
					'email' => $line['emailProyecto'],
					'anio' => $line['anioProyecto'],
					'estado' => $line['nombreEstado'],
					'ciudad' => $line['nombreCiudad'],
					'tipoInmobiliaria' => $line['tipoInmobiliaria'],
					'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
					'imagenHome' => $line['imagenesInmobiliaria']
				);
			}
			echo json_encode($arrayAux);
		}
		
	}

	function getCityList($idEstado){
		$query = "SELECT * FROM Ciudades c 
					INNER JOIN Proyectos p ON p.Ciudades_idCiudades = c.idCiudades
					WHERE c.Estados_idEstados = '".$idEstado."' GROUP BY c.nombreCiudad";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idCiudades' => $line['idCiudades'],
				'nombreCiudad' => $line['nombreCiudad'],
				'Estados_idEstados' => $line['Estados_idEstados']
			);
		}
		echo json_encode($dataStates);
	}

	function getProjectListCity($idCiudad){
		$query = "SELECT * FROM Proyectos p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN Proyectos_has_imagenesInmobiliaria phi ON phi.Proyectos_idProyectos = p.idProyectos
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE p.Ciudades_idCiudades = '".$idCiudad."' GROUP BY p.idProyectos";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux[] = array(
				'idProyecto' => $line['idProyectos'],
				'nombreProyecto' => $line['nombreProyecto'],
				'descripProyecto' => $line['descripProyecto'],
				'logoProyecto' => $line['logoProyecto'],
				'direccionProyecto' => $line['direccionProyecto'],
				'colonia' => $line['coloniaProyecto'],
				'codigoPostal' => $line['cpProyecto'],
				'telefono' => $line['telProyecto'],
				'email' => $line['emailProyecto'],
				'anio' => $line['anioProyecto'],
				'estado' => $line['nombreEstado'],
				'ciudad' => $line['nombreCiudad'],
				'tipoInmobiliaria' => $line['tipoInmobiliaria'],
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
				'imagenHome' => $line['imagenesInmobiliaria']
			);
		}
		echo json_encode($arrayAux);
	}

	function getListDetailsProject($idProyecto){
		$query = "SELECT * FROM Proyectos p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					WHERE p.idProyectos = '".$idProyecto."' ORDER BY p.idProyectos DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$array_images = explode(',', $line['imagenHomeProyecto']);
			$arrayAux[] = array(
				'idProyecto' => $line['idProyectos'],
				'nombreProyecto' => $line['nombreProyecto'],
				'descripProyecto' => $line['descripProyecto'],
				'logoProyecto' => $line['logoProyecto'],
				'imagenHome' => $array_images[0],
				'imagenes' => $array_images
			);
		}
		echo json_encode($arrayAux);
	}

	function getDesarrolloList($idEstado){
		if ($idEstado) {
			$query = "SELECT * FROM Desarrollos d
					INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN Desarrollos_has_imagenesInmobiliaria dhi ON dhi.Desarrollos_idDesarrollos = d.idDesarrollos
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = dhi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE d.Estados_idEstados = '".$idEstado."' GROUP BY d.idDesarrollos";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error());
			$arrayAux = array();
			while($line = mysql_fetch_array($result)){
				$arrayAux[] = array(
					'idDesarrollo' => $line['idDesarrollos'],
					'nombreDesarrollo' => $line['nombreDesarrollo'],
					'descripDesarrollo' => $line['descripDesarrollo'],
					'logoDesarrollo' => $line['logoDesarrollo'],
					'direccionDesarrollo' => $line['direccionDesarrollo'],
					'colonia' => $line['coloniaDesarrollo'],
					'codigoPostal' => $line['cpDesarrollo'],
					'telefono' => $line['telDesarrollo'],
					'email' => $line['emailDesarrollo'],
					'anio' => $line['anioDesarrollo'],
					'estado' => $line['nombreEstado'],
					'ciudad' => $line['nombreCiudad'],
					'tipoInmobiliaria' => $line['tipoInmobiliaria'],
					'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
					'imagenHome' => $line['imagenesInmobiliaria']
				);
			}
			echo json_encode($arrayAux);
		} else {
			$query = "SELECT * FROM Desarrollos d
					INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN Desarrollos_has_imagenesInmobiliaria dhi ON dhi.Desarrollos_idDesarrollos = d.idDesarrollos
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = dhi.imagenesInmobiliaria_idimagenesInmobiliaria
					GROUP BY d.idDesarrollos";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error());
			$arrayAux = array();
			while($line = mysql_fetch_array($result)){
				$arrayAux[] = array(
					'idDesarrollo' => $line['idDesarrollos'],
					'nombreDesarrollo' => $line['nombreDesarrollo'],
					'descripDesarrollo' => $line['descripDesarrollo'],
					'logoDesarrollo' => $line['logoDesarrollo'],
					'direccionDesarrollo' => $line['direccionDesarrollo'],
					'colonia' => $line['coloniaDesarrollo'],
					'codigoPostal' => $line['cpDesarrollo'],
					'telefono' => $line['telDesarrollo'],
					'email' => $line['emailDesarrollo'],
					'anio' => $line['anioDesarrollo'],
					'estado' => $line['nombreEstado'],
					'ciudad' => $line['nombreCiudad'],
					'tipoInmobiliaria' => $line['tipoInmobiliaria'],
					'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
					'imagenHome' => $line['imagenesInmobiliaria']
				);
			}
			echo json_encode($arrayAux);
		}
		
	}

	function getCityListDes($idEstado){
		$query = "SELECT * FROM Ciudades c 
					INNER JOIN Desarrollos d ON d.Ciudades_idCiudades = c.idCiudades
					WHERE c.Estados_idEstados = '".$idEstado."' GROUP BY c.nombreCiudad";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idCiudades' => $line['idCiudades'],
				'nombreCiudad' => $line['nombreCiudad'],
				'Estados_idEstados' => $line['Estados_idEstados']
			);
		}
		echo json_encode($dataStates);
	}

	function getDesarrolloListCity($idCiudad){
		$query = "SELECT * FROM Desarrollos d
					INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN Desarrollos_has_imagenesInmobiliaria dhi ON dhi.Desarrollos_idDesarrollos = d.idDesarrollos
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = dhi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE d.Ciudades_idCiudades = '".$idCiudad."' GROUP BY d.idDesarrollos";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux[] = array(
				'idDesarrollo' => $line['idDesarrollos'],
				'nombreDesarrollo' => $line['nombreDesarrollo'],
				'descripDesarrollo' => $line['descripDesarrollo'],
				'logoDesarrollo' => $line['logoDesarrollo'],
				'direccionDesarrollo' => $line['direccionDesarrollo'],
				'colonia' => $line['coloniaDesarrollo'],
				'codigoPostal' => $line['cpDesarrollo'],
				'telefono' => $line['telDesarrollo'],
				'email' => $line['emailDesarrollo'],
				'anio' => $line['anioDesarrollo'],
				'estado' => $line['nombreEstado'],
				'ciudad' => $line['nombreCiudad'],
				'tipoInmobiliaria' => $line['tipoInmobiliaria'],
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
				'imagenHome' => $line['imagenesInmobiliaria']
			);
		}
		echo json_encode($arrayAux);
	}

	function getListDetailsDesarrollo($idDesarrollo){
		$query = "SELECT * FROM Desarrollos d
					INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
					WHERE d.idDesarrollos = '".$idDesarrollo."' ORDER BY d.idDesarrollos DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$array_images = explode(',', $line['imagenHomeDesarrollo']);
			$arrayAux[] = array(
				'idDesarrollo' => $line['idDesarrollos'],
				'nombreDesarrollo' => $line['nombreDesarrollo'],
				'descripDesarrollo' => $line['descripDesarrollo'],
				'logoDesarrollo' => $line['logoDesarrollo'],
				'imagenHome' => $array_images[0],
				'imagenes' => $array_images
			);
		}
		echo json_encode($arrayAux);
	}

	function getPropiedadList($idEstado){
		if ($idEstado) {
			$query = "SELECT * FROM Propiedades p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion 
					INNER JOIN Propiedades_has_imagenesInmobiliaria phi ON phi.Propiedades_idPropiedades = p.idPropiedades
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE p.Estados_idEstados = '".$idEstado."' GROUP BY p.idPropiedades";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error());
			$arrayAux = array();
			while($line = mysql_fetch_array($result)){
				$arrayAux[] = array(
					'idPropiedad' => $line['idPropiedades'],
					'nombrePropiedad' => $line['nombrePropiedad'],
					'descripPropiedad' => $line['descripPropiedad'],
					'logoPropiedad' => $line['logoPropiedad'],
					'direccionPropiedad' => $line['direccionPropiedad'],
					'colonia' => $line['coloniaPropiedad'],
					'codigoPostal' => $line['cpPropiedad'],
					'telefono' => $line['telPropiedad'],
					'email' => $line['emailPropiedad'],
					'estado' => $line['nombreEstado'],
					'ciudad' => $line['nombreCiudad'],
					'tipoInmobiliaria' => $line['tipoInmobiliaria'],
					'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
					'tipoOperacion' => $line['tipoOperacion'],
					'disponibilidad' => $line['disponibilidad'],
					'imagenHome' => $line['imagenesInmobiliaria']
				);
			}
			echo json_encode($arrayAux);
		} else {
			$query = "SELECT * FROM Propiedades p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion 
					INNER JOIN Propiedades_has_imagenesInmobiliaria phi ON phi.Propiedades_idPropiedades = p.idPropiedades
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					GROUP BY p.idPropiedades";
			$result = mysql_query($query,Conectar::con()) or die(mysql_error());
			$arrayAux = array();
			while($line = mysql_fetch_array($result)){
				$arrayAux[] = array(
					'idPropiedad' => $line['idPropiedades'],
					'nombrePropiedad' => $line['nombrePropiedad'],
					'descripPropiedad' => $line['descripPropiedad'],
					'logoPropiedad' => $line['logoPropiedad'],
					'direccionPropiedad' => $line['direccionPropiedad'],
					'colonia' => $line['coloniaPropiedad'],
					'codigoPostal' => $line['cpPropiedad'],
					'telefono' => $line['telPropiedad'],
					'email' => $line['emailPropiedad'],
					'estado' => $line['nombreEstado'],
					'ciudad' => $line['nombreCiudad'],
					'tipoInmobiliaria' => $line['tipoInmobiliaria'],
					'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
					'tipoOperacion' => $line['tipoOperacion'],
					'disponibilidad' => $line['disponibilidad'],
					'imagenHome' => $line['imagenesInmobiliaria']
				);
			}
			echo json_encode($arrayAux);
		}
		
	}

	function getCityListProp($idEstado){
		$query = "SELECT * FROM Ciudades c 
					INNER JOIN Propiedades p ON p.Ciudades_idCiudades = c.idCiudades
					WHERE c.Estados_idEstados = '".$idEstado."' GROUP BY c.nombreCiudad";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idCiudades' => $line['idCiudades'],
				'nombreCiudad' => $line['nombreCiudad'],
				'Estados_idEstados' => $line['Estados_idEstados']
			);
		}
		echo json_encode($dataStates);
	}

	function getPropiedadListCity($idCiudad){
		$query = "SELECT * FROM Propiedades p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion 
					INNER JOIN Propiedades_has_imagenesInmobiliaria phi ON phi.Propiedades_idPropiedades = p.idPropiedades
					INNER JOIN imagenesInmobiliaria imi ON imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					WHERE p.Ciudades_idCiudades = '".$idCiudad."' GROUP BY p.idPropiedades";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux[] = array(
				'idPropiedad' => $line['idPropiedades'],
				'nombrePropiedad' => $line['nombrePropiedad'],
				'descripPropiedad' => $line['descripPropiedad'],
				'logoPropiedad' => $line['logoPropiedad'],
				'direccionPropiedad' => $line['direccionPropiedad'],
				'colonia' => $line['coloniaPropiedad'],
				'codigoPostal' => $line['cpPropiedad'],
				'telefono' => $line['telPropiedad'],
				'email' => $line['emailPropiedad'],
				'estado' => $line['nombreEstado'],
				'ciudad' => $line['nombreCiudad'],
				'tipoInmobiliaria' => $line['tipoInmobiliaria'],
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
				'tipoOperacion' => $line['tipoOperacion'],
				'disponibilidad' => $line['disponibilidad'],
				'imagenHome' => $line['imagenesInmobiliaria']
			);
		}
		echo json_encode($arrayAux);
	}

	function getListDetailsPropiedad($idPropiedad){
		$query = "SELECT * FROM Propiedades p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion 
					WHERE p.idPropiedades = '".$idPropiedad."'";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$array_images = explode(',', $line['imagenHomePropiedad']);
			$arrayAux[] = array(
				'idPropiedad' => $line['idPropiedades'],
				'nombrePropiedad' => $line['nombrePropiedad'],
				'descripPropiedad' => $line['descripPropiedad'],
				'logoPropiedad' => $line['logoPropiedad'],
				'direccionPropiedad' => $line['direccionPropiedad'],
				'colonia' => $line['coloniaPropiedad'],
				'codigoPostal' => $line['cpPropiedad'],
				'telefono' => $line['telPropiedad'],
				'email' => $line['emailPropiedad'],
				'estado' => $line['nombreEstado'],
				'ciudad' => $line['nombreCiudad'],
				'tipoInmobiliaria' => $line['tipoInmobiliaria'],
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
				'tipoOperacion' => $line['tipoOperacion'],
				'disponibilidad' => $line['disponibilidad'],
				'imagenHome' => $array_images[0],
				'imagenes' => $array_images
			);
		}
		echo json_encode($arrayAux);
	}

	function getStatesList(){
		$query = "SELECT * FROM Estados ORDER BY idEstados DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idEstados' => $line['idEstados'],
				'nombreEstado' => $line['nombreEstado']
			);
		}
		echo json_encode($dataStates);
	}	
	function getStatesListFront(){
		$query = "SELECT * FROM Estados e 
					INNER JOIN Proyectos p ON p.Estados_idEstados = e.idEstados
					GROUP BY e.nombreEstado ORDER BY e.nombreEstado ASC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idEstados' => $line['idEstados'],
				'nombreEstado' => $line['nombreEstado']
			);
		}
		echo json_encode($dataStates);
	}	
	function getStatesListFrontDes(){
		$query = "SELECT * FROM Estados e 
					INNER JOIN Desarrollos d ON d.Estados_idEstados = e.idEstados
					GROUP BY e.nombreEstado ORDER BY e.nombreEstado ASC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idEstados' => $line['idEstados'],
				'nombreEstado' => $line['nombreEstado']
			);
		}
		echo json_encode($dataStates);
	}	
	function getStatesListFrontProp(){
		$query = "SELECT * FROM Estados e 
					INNER JOIN Propiedades p ON p.Estados_idEstados = e.idEstados
					GROUP BY e.nombreEstado ORDER BY e.nombreEstado ASC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idEstados' => $line['idEstados'],
				'nombreEstado' => $line['nombreEstado']
			);
		}
		echo json_encode($dataStates);
	}
	function getCitiesList(){
		$query = "SELECT * FROM Ciudades ORDER BY idCiudades DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idCiudades' => $line['idCiudades'],
				'nombreCiudad' => $line['nombreCiudad'],
				'Estados_idEstados' => $line['Estados_idEstados']
			);
		}
		echo json_encode($dataStates);
	}	
	function getInmobiliariaList(){
		$query = "SELECT * FROM tipoInmobiliaria ORDER BY idtipoInmobiliaria DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idtipoInmobiliaria' => $line['idtipoInmobiliaria'],
				'tipoInmobiliaria' => $line['tipoInmobiliaria']
			);
		}
		echo json_encode($dataStates);
	}	
	function getTypeInmobiliariaList(){
		$query = "SELECT * FROM subcategoriaInmobiliaria ORDER BY idsubcategoriaInmobiliaria DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idsubcategoriaInmobiliaria' => $line['idsubcategoriaInmobiliaria'],
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria'],
				'tipoInmobiliaria_idtipoInmobiliaria' => $line['tipoInmobiliaria_idtipoInmobiliaria']
			);
		}
		echo json_encode($dataStates);
	}	
	function getTypeOperationList(){
		$query = "SELECT * FROM tipoOperacion ORDER BY idtipoOperacion DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$dataStates = array();
		while($line = mysql_fetch_array($result)){
			$dataStates[] = array(
				'idtipoOperacion' => $line['idtipoOperacion'],
				'tipoOperacion' => $line['tipoOperacion']
			);
		}
		echo json_encode($dataStates);
	}

