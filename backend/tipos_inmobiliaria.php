<?php
require_once("conexion.php");
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
?>