<html>

<body>
<h1>COMPRA DE PRODUCTOS</h1>
<?php	
include "conexion.php";
session_start();

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
	Cantidad a Comprar <input type="integer" name="cantidad" placeholder="cantidad">
	<br/>
	Almacen <input type="integer" name="almacen" placeholder="almacen">
	<br/>
	<input type="submit" value="Comprar" name="comprar">
	<input type="submit" value="Agregar a la Cesta" name="agregar">
	<input type="submit" value="Limpiar la Cesta" name="limpiar">

<?php
	echo '</form>';
	
} else { 
	
	if(isset($_POST['comprar'])) {
	
	echo "Su compra es: ";
	
	var_dump($_SESSION['$cesta']);
	
	$longi=count($_SESSION['$cesta']);
	
	for($i=0; $i<$longi; $i++) {
	
	$producto = $_SESSION['$cesta'][$i][0];
	$cant = $_SESSION['$cesta'][$i][1];
	$almacen = $_SESSION['$cesta'][$i][2];
	
	$fecha=obtenerFecha($db);
	
	$nomb=$_SESSION['nombre'];
	
	$nif=obtenerClientes($db,$nomb);
	
	$codigoProducto = obtenerCodigoProducto($db,$producto);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	if(obtenerCantidadProducto($db,$codigoProducto)>0){
		
		if((obtenerCantidadProducto($db,$codigoProducto)-$cant)>0){
			
			$sql = "UPDATE almacena SET cantidad=cantidad-'$cant' where almacena.id_producto='$codigoProducto' and almacena.num_almacen='$almacen'";
			
			$conn->query($sql);
			
			$sql = "INSERT INTO compra (nif,id_producto,fecha_compra,unidades) VALUES ('$nif','$codigoProducto','$fecha','$cant')";
			
			if ($conn->query($sql) === TRUE) {
				echo "Producto comprado satisfactoriamente";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}	
		}
		
	} else {
		echo "No hay stock del producto";
	}
	
	}
	
	$conn->close();
	
	}
	
	if (isset($_POST['agregar']) && !empty($_POST['agregar'])) {
	  
			if (!isset($_SESSION['$cesta'])){
				
				$_SESSION['$cesta']=array(array($_POST['producto'],$_POST['cantidad'],$_POST['almacen']));
		   
			} else {
				
				array_push($_SESSION['$cesta'],array($_POST['producto'],$_POST['cantidad'],$_POST['almacen']));
		   	
			}
		
		echo "CESTA DE LA COMPRA: ";
		
		var_dump($_SESSION['$cesta']);
		
	}
	
	if(isset($_POST['limpiar'])) {
	
		$_SESSION['$cesta']=null;
		echo "Cesta vaciada";
	
	}
	
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

	function obtenerCantidadProducto($db,$producto) {

	$idProducto = null;
	
	$sql = "SELECT id_producto,cantidad FROM almacena WHERE id_producto = '$producto'";
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$idProducto = $row['cantidad'];
		}
	}
	
	return $idProducto;
}

	function obtenerClientes($db,$nombre) {
	$clientes = null;
	
	$sql = "SELECT dni,usuario FROM usuariosreg where usuario='$nombre'";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$clientes = $row['dni'];
		}
	}
	
	return $clientes;
}	

	function obtenerFecha($db) {
	
	$sql = "SELECT sysdate() as hoy";
	
	$resultado = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($resultado);
	$fecha = $row['hoy'];

	return $fecha;
}	


?>

<br/><br/>

<a href="compro.php">Comprar</a>
<a href="inicio.php">Inicio</a>

</body>

</html>