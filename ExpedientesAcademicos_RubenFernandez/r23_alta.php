<?php
$DNI=$_POST['DNI'];
$NOMBRE=$_POST['NOMBRE'];
$APELLIDO1=$_POST['APELLIDO1'];
$APELLIDO2=$_POST['APELLIDO2'];
$CURSOACADEMICO=$_POST['CURSOACADEMICO'];
$DAW=$_POST['DAW'];
$DWES=$_POST['DWES'];
$DI=$_POST['DI'];
$DWEC=$_POST['DWEC'];
$INGLES=$_POST['INGLES'];
$FOL=$_POST['FOL'];
$FCT=$_POST['FCT'];
$PROYECTO=$_POST['PROYECTO'];
$DNIRepetido=false;

//Validar el DNI
if (empty($DNI)){
echo "El DNI es obligatorio";
}

//Validar el nombre
if (empty($NOMBRE)){
echo "El Nombre es obligatorio";
}

//Validar el apellido
if (empty($APELLIDO1)){
echo "El Apellido 1 es obligatorio";
}

//Funcion que valida que el DNI no exista
function validarDNI($DNIRepetido,$DNI){
	$lineas=file("alumnos.txt");
	foreach($lineas as $linea => $texto){
			$leer=explode("--", $texto);
			if ($DNI==$leer[0]){
				echo "El DNI no se puede repetir";
				$DNIRepetido=true;
			}
	}
	return $DNIRepetido;
}

$validacion=validarDNI($DNIRepetido,$DNI);

//Hacer que las notas si están vacías sean 0 por defecto
if (empty($DAW)){
	$DAW=0;
}
if (empty($DWES)){
	$DWES=0;
}
if (empty($DI)){
	$DI=0;
}
if (empty($DWEC)){
	$DWEC=0;
}
if (empty($INGLES)){
	$INGLES=0;
}
if (empty($FOL)){
	$FOL=0;
}
if (empty($FCT)){
	$FCT=0;
}
if (empty($PROYECTO)){
	$PROYECTO=0;
}

//Insertar datos en el fichero 'alumnos.txt'
if($validacion==false){
$f1=fopen("alumnos.txt","a+");
fwrite($f1,$DNI."--".$NOMBRE."--".$APELLIDO1."--".$APELLIDO2."--".$CURSOACADEMICO."--".$DAW."--".$DWES."--".$DI."--".$DWEC."--".$INGLES."--".$FOL."--".$FCT."--".$PROYECTO."\n");
fclose($f1);
}

?>