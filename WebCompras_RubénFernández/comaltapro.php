<html>
<body>
<h1>ALTA PRODUCTOS</h1>
<?php
include "conexion.php";

if (!isset($_POST) || empty($_POST)) { 

	$categorias = obtenerCategorias($db);
	
echo '<form action="" method="post">';
?>
		ID PRODUCTO <input type="text" name="idproducto" placeholder="idproducto">
		<br/>
        NOMBRE PRODUCTO <input type="text" name="nombre" placeholder="nombre">
		<br/>
        PRECIO PRODUCTO <input type="text" name="precio" placeholder="precio">
		<br/>
	
		<label for="categoria">Categorías:</label>
		<select name="categoria">
		<?php foreach($categorias as $categoria) : ?>
			<option> <?php echo $categoria ?> </option>
		<?php endforeach; ?>
		</select>
		<br/>
<?php
	echo '<div><input type="submit" value="Alta Producto"></div>
	</form>';
} else { 
	
	$idprod = $_POST['idproducto'];
	$nombre = $_POST['nombre'];
	$prec = $_POST['precio'];
	$categoria = $_POST['categoria'];
	
	$codigo = obtenerCodigo($db,$categoria);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('$idprod','$nombre','$prec','$codigo')";

	if ($conn->query($sql) === TRUE) {
		echo "Producto dado de alta satisfactoriamente";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
}
?>

<?php
	function obtenerCategorias($db) {
	$categorias = array();
	
	$sql = "SELECT id_categoria,nombre FROM categoria";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$categorias[] = $row['nombre'];
		}
	}
	return $categorias;
}

	function obtenerCodigo($db,$categoria) {

	$idCategoria = null;
	
	$sql = "SELECT id_categoria FROM categoria WHERE nombre = '$categoria'";
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$idCategoria = $row['id_categoria'];
		}
	}
	
	return $idCategoria;

}

?>

</body>

</html>