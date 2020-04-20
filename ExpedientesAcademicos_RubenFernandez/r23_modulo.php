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
    <h1 class="text-center">CONSULTA CALIFICACIONES MÓDULO</h1>

    <div class="container ">
        <!--Aplicacion-->
        <div id="App" class="row pt-6">
            <div class="col-md4-">
                <div class="card">
                    <div class="card-header">
                        Datos a introducir
                    </div>
                    <form id="product-form" name="formmod" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="card-body">
						<div class="form-group">
                            <input type="text" name="CURSOACADEMICO" placeholder="CURSOACADEMICO" class="form-control">
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
                        <input type="reset" name="reset" value="Nueva Consulta" class="btn btn-outline-info btn-inline ml-5">
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
$CURSOACADEMICO=$_POST['CURSOACADEMICO'];
$Buscar=$_POST['modulo'];
$lineas=file("alumnos.txt");
$nota="";

echo "<table border='1'>";
foreach($lineas as $linea => $texto){
		$escribir=explode("--", $texto);
		if ($escribir[4]==$CURSOACADEMICO){
			//La variable nota pasa a valer lo que valga la nota de cada alumno en la posicion correspondiente de 5 a 12 segun lo seleccionado en el <select>
			$nota=$escribir[$Buscar];
			//Condiciones que hacen que las notas sean aprobadas o no...
			if ($nota>=0 && $nota<5){
				$nota="Insuficiente";
			}
			if ($nota==5){
				$nota="Aprobado";
			}
			if ($nota==6){
				$nota="Bien";
			}
			if ($nota==7 || $nota==8){
				$nota="Notable";
			}
			if ($nota==9){
				$nota="Sobresaliente";
			}
			if ($nota==10){
				$nota="Matrícula de honor";
			}
			//Dibujo la tabla
			echo "<tr><td>$escribir[0]<td>
			<td>$escribir[1]<td>
			<td>$nota</td>
			</tr>";
		}
	}		
}
echo "</table>";

?>

</body>
</html>