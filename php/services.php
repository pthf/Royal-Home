<?php
	if(isset($_GET['namefunction'])){
		require_once("../backend/conexion.php");
		$namefunction = $_GET['namefunction'];
		switch ($namefunction) {
			case 'getInfomationProjects':
				getInfomationProjects();
				break;
			case 'getProjectList':
				getProjectList();
				break;
			case 'getProjectById':
				getProjectById($_GET['id']);
				break;
			case 'getInfomationDesarrollos':
				getInfomationDesarrollos();
				break;
			case 'getDesarrolloList':
				getDesarrolloList();
				break;
			case 'getDesarrolloById':
				getDesarrolloById($_GET['id']);
				break;
			case 'getInfomationPropiedades':
				getInfomationPropiedades();
				break;
			case 'getPropiedadList':
				getPropiedadList();
				break;
			case 'getPropiedadById':
				getPropiedadById($_GET['id']);
				break;
			case 'getStatesList':
				getStatesList();
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

	function getInfomationProjects() {
		$query = "SELECT * FROM Proyectos p ORDER BY idProyectos DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux[] = array(
				'idProyecto' => $line['idProyectos'],
				'nombreProyecto' => $line['nombreProyecto'],
				'descripcion' => $line['descripProyecto'],
				'direccion' => $line['direccionProyecto'],
				'colonia' => $line['coloniaProyecto'],
				'cp' => $line['cpProyecto']
			);
		}
		echo json_encode($arrayAux);
	}

	function getProjectList(){
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

	function getProjectById($id){
		$query = "SELECT * FROM Proyectos_has_imagenesInmobiliaria phi
					INNER JOIN imagenesInmobiliaria imi On imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					INNER JOIN Proyectos p ON p.idProyectos = phi.Proyectos_idProyectos
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
					WHERE phi.Proyectos_idProyectos = $id ORDER BY idimagenesInmobiliaria DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayListProjects = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux = array(
				'idimagenesInmobiliaria' => $line['idimagenesInmobiliaria'],
				'imagenesInmobiliaria' => $line['imagenesInmobiliaria'],
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
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria']
				);
			array_push($arrayListProjects, $arrayAux);

		}
		echo json_encode($arrayListProjects);
	}

	function getInfomationDesarrollos() {
		$query = "SELECT * FROM Desarrollos d ORDER BY idDesarrollos DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux[] = array(
				'idDesarrollos' => $line['idDesarrollos'],
				'nombreDesarrollo' => $line['nombreDesarrollo'],
				'descripcion' => $line['descripDesarrollo'],
				'direccion' => $line['direccionDesarrollo'],
				'colonia' => $line['coloniaDesarrollo'],
				'cp' => $line['cpDesarrollo']
			);
		}
		echo json_encode($arrayAux);
	}

	function getDesarrolloList(){
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

	function getDesarrolloById($id){
		$query = "SELECT * FROM Desarrollos_has_imagenesInmobiliaria dhi
					INNER JOIN imagenesInmobiliaria imi On imi.idimagenesInmobiliaria = dhi.imagenesInmobiliaria_idimagenesInmobiliaria
					INNER JOIN Desarrollos d ON d.idDesarrollos = dhi.Desarrollos_idDesarrollos
					INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
					WHERE dhi.Desarrollos_idDesarrollos = $id ORDER BY idimagenesInmobiliaria DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayListProjects = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux = array(
				'idimagenesInmobiliaria' => $line['idimagenesInmobiliaria'],
				'imagenesInmobiliaria' => $line['imagenesInmobiliaria'],
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
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria']
				);
			array_push($arrayListProjects, $arrayAux);

		}
		echo json_encode($arrayListProjects);
	}

	function getInfomationPropiedades() {
		$query = "SELECT * FROM Propiedades p ORDER BY idPropiedades DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayAux = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux[] = array(
				'idPropiedades' => $line['idPropiedades'],
				'nombrePropiedad' => $line['nombrePropiedad'],
				'descripcion' => $line['descripPropiedad'],
				'direccion' => $line['direccionPropiedad'],
				'colonia' => $line['coloniaPropiedad'],
				'cp' => $line['cpPropiedad']
			);
		}
		echo json_encode($arrayAux);
	}

	function getPropiedadList(){
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
				'imagenHome' => $line['imagenesInmobiliaria']
			);
		}
		echo json_encode($arrayAux);
	}

	function getPropiedadById($id){
		$query = "SELECT * FROM Propiedades_has_imagenesInmobiliaria phi
					INNER JOIN imagenesInmobiliaria imi On imi.idimagenesInmobiliaria = phi.imagenesInmobiliaria_idimagenesInmobiliaria
					INNER JOIN Propiedades p ON p.idPropiedades = phi.Propiedades_idPropiedades
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion
					WHERE phi.Propiedades_idPropiedades = $id ORDER BY idimagenesInmobiliaria DESC";
		$result = mysql_query($query,Conectar::con()) or die(mysql_error());
		$arrayListProjects = array();
		while($line = mysql_fetch_array($result)){
			$arrayAux = array(
				'idimagenesInmobiliaria' => $line['idimagenesInmobiliaria'],
				'imagenesInmobiliaria' => $line['imagenesInmobiliaria'],
				'idPropiedad' => $line['idPropiedades'],
				'nombreDesarrollo' => $line['nombrePropiedad'],
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
				);
			array_push($arrayListProjects, $arrayAux);

		}
		echo json_encode($arrayListProjects);
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

