<html>

<body>
<h1>CONSULTA DE COMPRAS</h1>
<?php
include "conexion.php";

if (!isset($_POST) || empty($_POST)) { 

	$clientes = obtenerClientes($db);
	
	echo '<form action="" method="post">';
?>
	<label for="cliente">Clientes:</label>
	<select name="cliente">
	<?php foreach($clientes as $cliente) : ?>
		<option> <?php echo $cliente ?> </option>
	<?php endforeach; ?>
	</select>
	<br/>
	Fecha 1 <input type="date" name="fecha1" class="form-control">
    <br/>
	Fecha 2 <input type="date" name="fecha2" class="form-control">
	
	<br/>
	
	
<?php
	echo '<div><input type="submit" value="Consulta Compras"></div>
	</form>';
} else { 
	
	$cliente = $_POST['cliente'];
	$fecha1 = $_POST['fecha1'];
	$fecha2 = $_POST['fecha2'];
			
		obtenerCompras($db,$cliente,$fecha1,$fecha2);

	$conn->close();
	
}

?>

<?php
	function obtenerClientes($db) {
	$clientes = array();
	
	$sql = "SELECT nif,nombre FROM cliente";
	
	$resultado = mysqli_query($db, $sql);
	if ($resultado) {
		while ($row = mysqli_fetch_assoc($resultado)) {
			$clientes[] = $row['nif'];
		}
	}
	return $clientes;
}	

	function obtenerCompras($db,$cliente,$fecha1,$fecha2) {

		$sql = "SELECT nif,id_producto,fecha_compra,unidades from compra where nif='$cliente' and fecha_compra>'$fecha1' and fecha_compra<'$fecha2'";
	
		$resultado = mysqli_query($db, $sql);
	
		if ($resultado) {
			while($row = mysqli_fetch_assoc($resultado)) {
				echo "Codigo del Cliente: " . $row["nif"] ." | Codigo del Producto: ". $row["id_producto"]. " | Unidades: ". $row["unidades"]." | Fecha: ". $row["fecha_compra"]."<br>";
			}
		}
	}


?>

<a href="inicio.php">Inicio</a>

</body>

</html>