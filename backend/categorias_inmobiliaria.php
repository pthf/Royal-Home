<?php
require_once("conexion.php");
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
?>
