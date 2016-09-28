<?php
	include('connect_bd.php');
	// connect_base_de_datos();

	$username = 'Admin';
	$password = 'Admin';

	$passwordhash = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO adminuser (adminName, adminPassword, adminLastConnection) VALUES ('$username', '$passwordhash', '0000-00-00 00:00:00')";
	$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
