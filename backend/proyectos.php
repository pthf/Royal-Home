<?php
require_once("conexion.php");
	$query = "SELECT * FROM Proyectos p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN imagenesInmobiliaria imi On imi.idTipo = p.idProyectos GROUP BY p.idProyectos";
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
	// echo json_encode($arrayAux);
	print_r(json_encode($arrayAux));
?>
