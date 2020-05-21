<html>
<body>
<h1>ALTA CATEGORÍAS</h1>
<?php
include "conexion.php";

if (!isset($_POST) || empty($_POST)) {
	
echo '<form action="" method="post">';
?>
        ID CATEGORIA <input type="text" name="idcategoria" placeholder="idcategoria">
		<br/>
        NOMBRE CATEGORIA <input type="text" name="nombre" placeholder="nombre">
		<br/>
<?php
	echo '<div><input type="submit" value="Alta Categoría"></div>
	</form>';
} else { 

	$idcat = $_POST['idcategoria'];
	$nombre = $_POST['nombre'];

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO categoria (id_categoria,nombre) VALUES ('$idcat','$nombre')";

	if ($conn->query($sql) === true) {
		echo "Categoría dada de alta satisfactoriamente";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>

</body>

</html>