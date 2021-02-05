<?php

require 'bd.php';
$db = new Database();

$nombreArchivo = $_FILES['archivo']['name'];

if (empty($_FILES['archivo']['tmp_name'])) {
	echo 'Complete todos los campos';
} else {
	if (copy($_FILES['archivo']['tmp_name'], $_FILES['archivo']['name'])) {

		# connect to bd
		$connection = $db->getConnection();

		$estudiantes = fopen($nombreArchivo, "r"); # read the file with the data
		setlocale(LC_ALL, 'es_ES.UTF8');
		while (($datos = fgetcsv($estudiantes, 10000, ";")) !== false) # read line by line of the file up to a max of 10.000 characters by line using (;) like delimiter
		{
			if (is_numeric($datos[0])) {
				$query = "select id from user where numDocument = $datos[0]"; # select the id of the user
				if ($respuesta = mysqli_query($connection, $query)) {
					$fila = mysqli_fetch_row($respuesta);
					$idUser = $fila[0];
					mysqli_free_result($respuesta);
				}

				$linea[] = array('idUser' => $idUser, 'code' => $datos[1], 'state' => $datos[2], 'password' => $datos[3]);
			}
		}
		fclose($estudiantes); # close the file
		unlink($nombreArchivo); # The uploaded file is deleted

		$ingresado = 0; # var for save valid insertions
		$errorIng = 0; # var to store errors in insertions
		$duplicado = 0; # var for save duplicate insertions
		foreach ($linea as $indice => $value) # Iterate the array to extract each of the values stored in each item.
		{

			$idUser = $value["idUser"]; #code of the user
			$codeUser = $value["code"]; # code of the user
			$stateUser = $value["state"]; # state of the user
			$password = $value["password"]; # password of the user

			$query = "select id from student_career where idUser = '$idUser'"; # Query to find out if the user exists in the database
			$respuesta = mysqli_query($connection, $query);
			$row_cnt = mysqli_num_rows($respuesta);
			mysqli_free_result($respuesta);

			if ($row_cnt > 0) {
				echo $msj = '<font color=orange>User<b>' . $codeUser . '</b> Already registered</font><br/>';
				$duplicado += 1;
			} else {
				if ($insert = mysqli_query($connection, "insert into user (idUser, codeUser, stateUser, password) values($idUser,'$codeUser','$stateUser','$password')")) {
					echo $msj = '<font color=green>User<b>' . $codeUser . '</b> Saved</font><br/>';
					$ingresado += 1;
				} else {
					echo $msj = '<font color=red>User <b>' . $codeUser . ' </b> Not Saved ' . '</font><br/>';
					$errorIng += 1;
				}
			}
		}
		echo "<font color=green>" . number_format($ingresado, 2) . " Users successfully stored<br/>";
		echo "<font color=orange>" . number_format($duplicado, 2) . " Users who were already registered<br/>";
		echo "<font color=red>" . number_format($errorIng, 2) . " Storage errors<br/>";
	} else {
		echo 'error';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Project to load the migration of a table from a database with a .csv file">
	<meta name="author" content="Daniel Caballero">
	<link rel="icon" type="image/png" href="utils/hormiga.png" />

	<title>WonderAnt</title>

	<!-- Custom fonts for this template-->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Custom styles for this template-->

</head>

<body id="page-top">
	<br>
	<a class="btn btn-primary" href="index.php">Back</a>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>