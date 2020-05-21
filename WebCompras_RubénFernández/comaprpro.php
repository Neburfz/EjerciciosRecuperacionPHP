<html>

<body>
<h1>APROVISIONAR</h1>
<?php	
include "conexion.php";

if (!isset($_POST) || empty($_POST)) { 

	$almacenes = obtenerAlmacenes($db);
	$productos = obtenerProductos($db);
	
	echo '<form action="" method="post">';
?>
    CANTIDAD <input type="integer" name="cantidad" placeholder="cantidad">
	<br/>
	<label for="almacen">Almacenes:</label>
	<select name="almacen">
	<?php foreach($almacenes as $almacen) : ?>
		<option> <?php echo $almacen ?> </option>
	<?php endforeach; ?>
	</select>
	<br/>
	<label for="producto">Productos:</label>
	<select name="producto">
	<?php foreach($productos as $producto) : ?>
		<option> <?php echo $producto ?> </option>
	<?php endforeach; ?>
	</select>
	<br/>
<?php
	echo '<div><input type="submit" value="Aprovisionar Producto"></div>
	</form>';
} else { 
	
	$cant = $_POST['cantidad'];
	$almacen = $_POST['almacen'];
	$producto = $_POST['producto'];
	
	$codigoProducto = obtenerCodigoProducto($db,$producto);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO almacena (num_almacen,id_producto,cantidad) VALUES ('$almacen','$codigoProducto','$cant')";

	if ($conn->query($sql) === TRUE) {
		echo "Aprovisionamiento satisfactorio";
	} else {
		
		$sql = "UPDATE almacena SET cantidad=cantidad+'$cant' where almacena.id_producto='$codigoProducto' and almacena.num_almacen='$almacen'";
		
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
	
}
?>

<?php
	function obtenerAlmacenes($db) {
	$almacenes = array();
	
	$sql = "SELECT num_almacen,localidad FROM almacen";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$almacenes[] = $row['num_almacen'];
		}
	}
	return $almacenes;
}

	function obtenerProductos($db) {
	$productos = array();
	
	$sql = "SELECT id_producto,nombre from producto";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$productos[] = $row['nombre'];
		}
	}
	return $productos;
}

	function obtenerCodigoProducto($db,$producto) {

	$idProducto = null;
	
	$sql = "SELECT id_producto,nombre FROM producto WHERE nombre = '$producto'";
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$idProducto = $row['id_producto'];
		}
	}
	
	return $idProducto;

}

?>

</body>

</html>