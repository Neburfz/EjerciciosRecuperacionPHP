<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center">CONSULTA CALIFICACIONES ALUMNOS</h1>

    <div class="container ">
        <!--Aplicacion-->
        <div id="App" class="row pt-6">
            <div class="col-md4-">
                <div class="card">
                    <div class="card-header">
                        Datos Alumno
                    </div>
                    <form id="product-form" name="formconsulta" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="card-body">
						<div class="form-group">
                            <input type="text" name="DNI" placeholder="DNI" class="form-control">
                        </div>
						
						<div class="form-group">
						<select name="modulo">
							   <option value="5">DAW</option> 
							   <option value="6">DWES</option> 
							   <option value="7">DI</option>
							   <option value="8">DWEC</option> 
							   <option value="9">FOL</option> 
							   <option value="10">Inglés</option> 
							   <option value="11">FCT</option> 
							   <option value="12">Proyecto</option> 
						</select>
                        </div>
                        <input type="submit" name="submit" value="Consulta" class="btn btn-outline-info btn-inline">
                        <input type="reset"  name="reset" value="Nueva Consulta" class="btn btn-outline-info btn-inline ml-5">
                    </form>
                </div>


            </div>

        </div>
        <br>

    </div>

<?php
//Validar que el campo DNI se introduce
if (empty($_POST['DNI'])){
	echo "Introduce un DNI válido";
}
else{
$validar=true;
$DNI=$_POST['DNI'];
$Buscar=$_POST['modulo'];
$lineas=file("alumnos.txt");

//Validar que el DNI introducido existe
foreach($lineas as $linea => $texto){
$escribir=explode("--", $texto);
		if ($escribir[0]==$DNI){
			$validar = false;
		}
}

//Si el DNI es correcto va a ir a la posicion de la nota, de la asignatura que queramo consultar y la va a mostrar. He aprovechado eso ya que las notas estan puestas en orden y van de la posicion 5 a la 12.
if (!$validar){
		echo "La nota del alumno ".$DNI." es: ".$escribir[$Buscar].".";
}
else{
		echo "El DNI introducido no existe";
	}
}
?>
</body>
</html>