<html>
<body>
<h1>ALTA CLIENTES</h1>
<?php
session_start();

include "conexion.php";

if (!isset($_POST) || empty($_POST)) { 
	
echo '<form action="" method="post">';
?>
        NIF <input type="text" name="nif" placeholder="nif" required>
		<br/>	
        NOMBRE <input type="text" name="nombre" placeholder="nombre">
        <br/>
        APELLIDO <input type="text" name="apellido" placeholder="apellido">
        <br/>
        CP <input type="text" name="cp" placeholder="cp" class="form-control">
        <br/>
        DIRECCION <input type="text" name="direccion" placeholder="direccion">
        <br/>
        CIUDAD <input type="text" name="ciudad" placeholder="ciudad">
        <br/>
<?php
	echo '<div><input type="submit" value="Alta Cliente"></div>
	</form>';
} else { 
	$nif = $_POST['nif'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cp = $_POST['cp'];
	$direccion = $_POST['direccion'];
	$ciudad = $_POST['ciudad'];
	
	$_SESSION["nombre"]=$nombre;
	$_SESSION["contraseña"]=strrev($apellido);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$validar=comprobarDNI($db,$nif);
	
	if($validar==true){
	$sql = "INSERT INTO cliente (nif,nombre,apellido,cp,direccion,ciudad) VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad')";
	$conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
		echo "Cliente dado de alta satisfactoriamente";
	}

	$conn->close();
	}
	else{
		echo "El NIF debe contener 8 números y 1 letra para ser válido";
	}
}
?>

<?php
	function comprobarDNI($db,$nif){
		$validar=false;
		$letra = substr($nif, -1);
		$numeros = substr($nif, 0, -1);
		if (strlen($numeros)==8 && strlen($letra)==1){
			$validar=true;
		}
		return $validar;
	}
?>

</body>

</html>