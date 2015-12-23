<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);	

	$run = $_REQUEST["RUN_p"];
	//Conectamos la BD
	$conn = new mysqli("localhost", "root", "12Melo12", "prestamos_diarios");
	$conn->set_charset("utf8");
	if($conn->connect_errno){
		printf("falló la conexion: %s\n", $conn->connect_error);
		exit();
	}

	//Consulta si existe o no el usuario
	$consulta = sprintf("SELECT * FROM lector WHERE rut = '%s'",
		mysqli_real_escape_string($conn, $run));

	$resultado = $conn->query($consulta);

	$valid = 'true';
	if ($resultado->num_rows > 0) {
		$valid = 'true';
	}
	else{
		$valid = 'false';
	}
	echo $valid;
?>
