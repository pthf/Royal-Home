<?php
	if(isset($_GET['namefunction'])){
		include("connect_bd.php");
		// connect_base_de_datos();
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


			case 'getCategory':
				getCategory($_GET['id']);
				break;
			case 'getSliderHome':
				getSliderHome();
				break;
			case 'getSliderPromotions':
				getSliderPromotions();
				break;
			case 'sliderEquipment':
				sliderEquipment();
				break;
			case 'sliderInstalations':
				sliderInstalations();
				break;
			case 'sliderMaterial':
				sliderMaterial();
				break;
			case 'sliderPersonal':
				sliderPersonal();
				break;
			case 'getServicesList':
				getServicesList();
				break;
			case 'getServiceById':
				getServiceById($_GET['id']);
				break;
			case 'getPatientList':
				getPatientList();
				break;
			case 'getPatientById':
				getPatientById($_GET['id']);
				break;
			case 'getImagesLibrary':
				getImagesLibrary();
				break;
			case 'getListInterestBlog':
				getListInterestBlog();
				break;
			case 'getInformationPost':
				getInformationPost($_GET['id']);
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
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria ORDER BY p.idProyectos DESC";
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
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria']
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
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria ORDER BY d.idDesarrollos DESC";
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
				'subcategoriaInmobiliaria' => $line['subcategoriaInmobiliaria']
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
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion ORDER BY p.idPropiedades DESC";
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













	

	function getCategory($id){
		$query = "SELECT * FROM category";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataCategory = array();
		while($line = mysqli_fetch_array($result)){
			$verify = false;
			$query2 = "SELECT * FROM project_has_category WHERE idProject = ".$id." AND idCategory = ".$line['idCategory'];
			$result2 = mysqli_query(Conectar::con(),$query2) or die(mysqli_error(Conectar::con()));
			if(mysqli_num_rows($result2)>0)
				$verify = true;
			$dataCategory[] = array(
				'idCategory' => $line['idCategory'],
				'nameCategory' => $line['nameCategory'],
				'verify' => $verify
			);
		}
		echo json_encode($dataCategory);
	}

	function getSliderHome(){
		$query = "SELECT * FROM bannersHome ORDER BY idbannersHome DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersHome' => $line['idbannersHome'],
				'bannersHomeImage' => $line['bannersHomeImage'],
				'bannersHomeUrl' => $line['bannersHomeUrl'],
				'bannersHomeName' => $line['bannersHomeName']
			);
		}
		echo json_encode($dataBanners);
	}

	function getSliderPromotions(){
		$query = "SELECT * FROM bannersPromotions ORDER BY idbannersPromotions DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersPromotions' => $line['idbannersPromotions'],
				'bannersPromotionsImage' => $line['bannersPromotionsImage'],
				'bannersPromotionsUrl' => $line['bannersPromotionsUrl'],
				'bannersPromotionsName' => $line['bannersPromotionsName']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderEquipment(){
		$query = "SELECT * FROM bannersEquipment ORDER BY idbannersEquipment DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersEquipment' => $line['idbannersEquipment'],
				'bannersEquipmentImage' => $line['bannersEquipmentImage'],
				'bannersEquipmentUrl' => $line['bannersEquipmentUrl'],
				'bannersEquipmentName' => $line['bannersEquipmentName'],
				'bannersEquipmentDescription' => $line['bannersEquipmentDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderInstalations(){
		$query = "SELECT * FROM bannersInstalations ORDER BY idbannersInstalations DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersInstalations' => $line['idbannersInstalations'],
				'bannersInstalationsImage' => $line['bannersInstalationsImage'],
				'bannersInstalationsUrl' => $line['bannersInstalationsUrl'],
				'bannersInstalationsName' => $line['bannersInstalationsName'],
				'bannersInstalationsDescription' => $line['bannersInstalationsDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderMaterial(){
		$query = "SELECT * FROM bannersMaterial ORDER BY idbannersMaterial DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersMaterial' => $line['idbannersMaterial'],
				'bannersMaterialImage' => $line['bannersMaterialImage'],
				'bannersMaterialUrl' => $line['bannersMaterialUrl'],
				'bannersMaterialName' => $line['bannersMaterialName'],
				'bannersMaterialDescription' => $line['bannersMaterialDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderPersonal(){
		$query = "SELECT * FROM bannersPersonal ORDER BY idbannersPersonal DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersPersonal' => $line['idbannersPersonal'],
				'bannersPersonalImage' => $line['bannersPersonalImage'],
				'bannersPersonalUrl' => $line['bannersPersonalUrl'],
				'bannersPersonalName' => $line['bannersPersonalName'],
				'bannersPersonalDescription' => $line['bannersPersonalDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function getServicesList(){
		$query = "SELECT * FROM services ORDER BY idservices DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataServices = array();
		while($line = mysqli_fetch_array($result)){
			$dataServices[] = array(
				'idservices' => $line['idservices'],
				'servicesName' => $line['servicesName'],
				'servicesDescription' => $line['servicesDescription']
			);
		}
		echo json_encode($dataServices);
	}

	function getServiceById($id){
		$query = "SELECT * FROM services WHERE idservices = ".$id;
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataServices = array();
		while($line = mysqli_fetch_array($result)){
			$dataServices[] = array(
				'idservices' => $line['idservices'],
				'servicesName' => $line['servicesName'],
				'servicesDescription' => $line['servicesDescription']
			);
		}
		echo json_encode($dataServices);
	}

	function getPatientList(){
		$query = "SELECT * FROM resultsPatient ORDER BY idresultsPatient DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$arrayAux = array();
		while($line = mysqli_fetch_array($result)){
			$arrayAux[] = array(
				'idresultsPatient' => $line['idresultsPatient'],
				'resultsPatientName' => $line['resultsPatientName'],
				'resultsPatientLastName' => $line['resultsPatientLastName'],
				'resultsPatientCompany' => $line['resultsPatientCompany'],
				'resultsPatientTypeResult' => $line['resultsPatientTypeResult'],
				'resultsPatientTicket' => $line['resultsPatientTicket']
			);
		}
		echo json_encode($arrayAux);
	}

	function getPatientById($id){
		$query = "SELECT * FROM resultsPatient WHERE idresultsPatient = $id  ORDER BY idresultsPatient DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$arrayAux = array();
		while($line = mysqli_fetch_array($result)){
			$arrayAux[] = array(
				'idresultsPatient' => $line['idresultsPatient'],
				'resultsPatientName' => $line['resultsPatientName'],
				'resultsPatientLastName' => $line['resultsPatientLastName'],
				'resultsPatientCompany' => $line['resultsPatientCompany'],
				'resultsPatientTypeResult' => $line['resultsPatientTypeResult'],
				'resultsPatientTicket' => $line['resultsPatientTicket']
			);
		}
		echo json_encode($arrayAux);
	}

	function getImagesLibrary(){
      $query = "SELECT * FROM imageslibrary ORDER BY idimageslibrary ASC";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $listImages = array();
      while($line = mysqli_fetch_array($result)){
        $listImages[] = array(
          'idimageslibrary' => $line['idimageslibrary'],
          'imageslibraryName' => $line['imageslibraryName'],
        );
      }
      print_r(json_encode($listImages));
    }

    function getListInterestBlog(){
      $query = "SELECT * FROM interestblog ORDER BY idInterestBlog DESC";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $listInterestBlog = array();
      while($line = mysqli_fetch_array($result)){
        $listInterestBlog[] = array(
          'idInterestBlog' => $line['idInterestBlog'],
          'blogName' => $line['blogName'],
          'blogDate' => $line['blogDate'],
          'blogCover' => $line['blogCover'],
          'blogShortDescription' => $line['blogShortDescription'],
          'blogDocument' => $line['blogDocument']
        );
      }
      print_r(json_encode($listInterestBlog));
    }

    function getInformationPost($id){
      $query = "SELECT * FROM interestblog WHERE idInterestBlog = ".$id;
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $line = mysqli_fetch_array($result);
      $informationPost = array();
      $informationPost[] = array(
        'idInterestBlog' => $line['idInterestBlog'],
        'blogName' => $line['blogName'],
        'blogDate' => $line['blogDate'],
        'blogCover' => $line['blogCover'],
        'blogShortDescription' => $line['blogShortDescription'],
        'blogDocument' => $line['blogDocument']
      );
      print_r(json_encode($informationPost));
    }
