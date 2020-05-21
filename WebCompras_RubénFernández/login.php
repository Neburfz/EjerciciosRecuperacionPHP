<?php
session_start();
?>
<html>
<body>
<h1>LOGIN</h1>
<?php

if(isset($_SESSION['nombre'])){

echo "<p>Usuario: " . $_SESSION['nombre'] . "";

echo "<p><a href='inicio.php'>Continuar Comprando</a></p>";

echo "<p><a href='cerrarsesion.php'>Cerrar Sesion</a></p>";

}else {

?>

<form action="inicio.php" method="POST">
Usuario:
<input type="text" placeholder="Introduce usuario" name="nombre" required/>
<br/>
Password:
<input type="text" placeholder="Introduce password" name="password" required/>
<br/>
<input type="submit" value="Login"/>
</form>

<?php
}
?>

</body>

</html>