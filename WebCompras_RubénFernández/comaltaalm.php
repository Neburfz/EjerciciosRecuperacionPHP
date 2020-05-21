<html>

<body>
<h1>ALTA ALMACEN</h1>
<?php
include "conexion.php";

if (!isset($_POST) || empty($_POST)) { 
	
echo '<form action="" method="post">';
?>
<div class="container ">
        LOCALIDAD <input type="text" name="localidad" placeholder="Localidad">
		<br/>
<?php
	echo '<div><input type="submit" value="Alta Almacen"></div>
	</form>';
} else { 
	
	$localidad = $_POST['localidad'];
	$numalm = obtenerNumAlmacen($db);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO almacen (num_almacen,localidad) VALUES ('$numalm','$localidad')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Almacén dado de alta satisfactoriamente";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
}
?>

<?php
	function obtenerNumAlmacen($db) {
	$nalmacen = 0;
	
	$sql = "SELECT num_almacen FROM almacen";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$nalmacen = $row['num_almacen'] + 10;
		}
	}
	return $nalmacen;
}
?>

</body>

</html>