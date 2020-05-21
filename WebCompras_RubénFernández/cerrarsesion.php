<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<body>
<p>Has Cerrado Sesion</p>
<br /><a href="login.php">Volver a Login</a>
</body>
</html>