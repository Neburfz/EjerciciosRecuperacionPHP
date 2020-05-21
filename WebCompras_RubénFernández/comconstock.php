<html>

<body>
<h1>CONSULTA DE STOCK</h1>
<?php
include "conexion.php";

if (!isset($_POST) || empty($_POST)) { 

	$productos = obtenerProductos($db);

	echo '<form action="" method="post">';
?>
	<label for="producto">Productos:</label>
	<select name="producto">
	<?php foreach($productos as $producto) : ?>
		<option> <?php echo $producto ?> </option>
	<?php endforeach; ?>
	</select>
	<br/>
<?php
	echo '<div><input type="submit" value="Consultar Stock"></div>
	</form>';
} else { 

	$producto = $_POST['producto'];
	
	$codigoProducto = obtenerCodigoProducto($db,$producto);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	obtenerCantidadProductos($db,$codigoProducto);
	
	$conn->close();
	
}
?>

<?php
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

function obtenerCantidadProductos($db,$id) {

	$sql = "SELECT cantidad,id_producto from almacena where id_producto='$id'";
	
	$resultado = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($resultado) > 0) {
    
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "Codigo del Producto: " . $row["id_producto"] ." <br/> Cantidad del Producto: ". $row["cantidad"]. "<br>";
    }
} else {
    echo "No hay stock del producto";
}
	
}

?>

</body>

</html>