<?php
require_once("conexion.php");
	$query = "SELECT * FROM Desarrollos d
					INNER JOIN Estados e ON e.idEstados = d.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = d.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = d.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = d.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN imagenesInmobiliaria imi On imi.idTipo = d.idDesarrollos GROUP BY d.idDesarrollos";
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
?>