<?php
	include('connect_bd.php');
	// connect_base_de_datos();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM adminuser WHERE adminName = '$username'";
	$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error());
	if(mysqli_num_rows($result) > 0){
		$find = false;
		while($line = mysqli_fetch_array($result)){
			if(password_verify($password, $line['adminPassword'])){
				$find = true;
				date_default_timezone_set('America/Mexico_City');
				$lastDate = date("Y-m-d H:i:s");
				$query2 = "UPDATE adminuser SET adminLastConnection = '$lastDate' WHERE idAdminUser = ".$line['idAdminUser'];
				$result2 = mysqli_query(Conectar::con(),$query2) or die(mysqli_error(Conectar::con()));
				session_start();
				$_SESSION['idAdmin'] = $line['idAdminUser'];
			}
		}
		if($find)
			echo 1;
		else
		 echo -1;
	}else{
		echo 0;
	}
