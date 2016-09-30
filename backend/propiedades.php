<?php
require_once("conexion.php");

	$query = "SELECT * FROM Propiedades p
					INNER JOIN Estados e ON e.idEstados = p.Estados_idEstados
					INNER JOIN Ciudades c ON c.idCiudades = p.Ciudades_idCiudades
					INNER JOIN tipoInmobiliaria ti ON ti.idtipoInmobiliaria = p.tipoInmobiliaria_idtipoInmobiliaria
					INNER JOIN subcategoriaInmobiliaria si ON si.idsubcategoriaInmobiliaria = p.subcategoriaInmobiliaria_idsubcategoriaInmobiliaria 
					INNER JOIN tipoOperacion tpo ON tpo.idtipoOperacion = p.tipoOperacion_idtipoOperacion 
					INNER JOIN imagenesInmobiliaria imi On imi.idTipo = p.idPropiedades GROUP BY p.idPropiedades";
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
?>