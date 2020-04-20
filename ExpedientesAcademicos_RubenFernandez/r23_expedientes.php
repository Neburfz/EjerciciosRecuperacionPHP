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
    <h1 class="text-center">CONSULTA EXPEDIENTES ALUMNOS</h1>

    <div class="container ">
        <!--Aplicacion-->
        <div id="App" class="row pt-6">
            <div class="col-md4-">
                <div class="card">
                    <div class="card-header">
                        Curso Académico
                    </div>
                    <form id="product-form" name="formexp" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="card-body">
						<div class="form-group">
                            <input type="text" name="CURSOACADEMICO" placeholder="CURSOACADEMICO" class="form-control">
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
//Validar que el curso no esté vacío
if (empty($_POST['CURSOACADEMICO'])){
	echo "Introduce un Curso Académico válido";
	}
else{
$CURSOACADEMICO=0;
$CURSOACADEMICO=$_POST['CURSOACADEMICO'];
$lineas=file("alumnos.txt");
$contador1=0;
$porcentaje=0;
$validar=true;
$c=0;
$CURSOACADEMICO=$_POST['CURSOACADEMICO'];

//Creo la tabla
echo "<table border='1'>";
$alumnos=0;
foreach($lineas as $linea => $texto){
		$escribir=explode("--", $texto);
		
		if ($escribir[4]==$CURSOACADEMICO){
			echo "<tr>
			<td>$escribir[0]<td>
			<td>$escribir[1]<td>
			<td>$escribir[2]<td>
			<td>$escribir[3]<td>
			<td>$escribir[4]<td>
			<td>$escribir[5]<td>
			<td>$escribir[6]<td>
			<td>$escribir[7]<td>
			<td>$escribir[8]<td>
			<td>$escribir[9]<td>
			<td>$escribir[10]<td>
			<td>$escribir[11]<td>
			<td>$escribir[12]<td>
			</tr>";
			$alumnos++;
			
			//Validar que el alumno ha aprobado todas las asignaturas
			for ($j=5;$j<13;$j++){
				if ($escribir[$j] >= 5){
					$c++;
				}
				if ($c==8){
				$contador1++;
				}
			}
		}
}

//Calculo el porcentaje de alumnos con todas las asignaturas aprobadas
$porcentaje=($contador1/$alumnos)*(100);
echo "</table>";

//Resultado final
echo "<br>Hay: ".$alumnos." alumnos matriculados en el curso.";
echo "<br>Hay un ".$porcentaje."% de alumnos con todas las asignaturas aprobadas";

}
?>

</body>
</html>