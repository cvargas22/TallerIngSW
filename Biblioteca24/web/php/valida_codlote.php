<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);	

	$codlote = $_REQUEST["CodLote"];
	//Conectamos la BD
	$conn = new mysqli("localhost", "root", "12Melo12", "prestamos_diarios");
	$conn->set_charset("utf8");
	if($conn->connect_errno){
		printf("falló la conexion: %s\n", $conn->connect_error);
		exit();
	}

	//Consulta si existe o no el usuario
	$consulta = sprintf("SELECT * FROM diario WHERE codigo = '%s'",
		mysqli_real_escape_string($conn, $codlote));

	$resultado = $conn->query($consulta);

	$valid = 'true';
	if ($resultado->num_rows > 0) {
		$valid = 'false';
	}
	else{
		$valid = 'true';
	}
	echo $valid;
?>
