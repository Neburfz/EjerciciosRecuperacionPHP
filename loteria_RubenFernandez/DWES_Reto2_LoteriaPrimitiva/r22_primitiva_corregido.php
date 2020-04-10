<?php

//Se utiliza un fichero externo para incluir las funciones:
include("r22_funciones.php");

$fechaSorteo=$_POST['fechasorteo'];
$recaudacion=$_POST['recaudacion'];

//Se generan los Arrays correspondientes:
$ArrayAciertos=array(0,0,0,0,0,0,0,0);
$ArrayNumerosGanadores=array(0,0,0,0,0,0,0);

$ArrayNumerosGanadores=random($ArrayNumerosGanadores);

//Añadir reintegro:
$ArrayNumerosGanadores[6]=9;
$ArrayNumerosGanadores[7]=rand(1,8);

echo "<h3>Sorteo: ".$fechaSorteo."</br>";
echo "Recaudacion: ".$recaudacion."</h3>";

//Se muestran las imagenes del número ganador:
echo "Numero Ganador: <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[0].png'>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[1].png'>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[2].png'>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[3].png'>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[4].png'>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[5].png'><br>";

//Se muestra el complementario:
echo "Complementario: <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[6].png'><br>";
//Se muestra el reintegro:
echo "Reintegro: <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[7].png'><br>";

//Se abre el fichero en el que se encuentran las apuestas:
$lineas=file("r22_primitiva.txt");
$numeroApuestas=0;
	 
//Ahora ya no se lee la primera linea del fichero "r22_primitiva.txt":
	$s=0;
	foreach($lineas as $linea => $texto){
		if($s>0){
		$escribir=explode("-", $texto);
		
		$numeroApuestas++;
		$aciertos=0;
		
		for($i=0;$i<6;$i++){
			for($j=1;$j<7;$j++){
				if($ArrayNumerosGanadores[$i]==$escribir[$j]){
					$aciertos++;
				}
			}
		}
		
		if($ArrayNumerosGanadores[6]==$escribir[7]){
			$complementario=true;
		}
		else {
			$complementario=false;
		}
			
		if ($aciertos==0){
			$ArrayAciertos[0]+=1;
		}
		if ($aciertos==1){
			$ArrayAciertos[1]+=1;
		}
		if ($aciertos==2){
			$ArrayAciertos[2]+=1;
		}
		if ($aciertos==3){
			$ArrayAciertos[3]+=1;
		}
		if ($aciertos==4){
			$ArrayAciertos[4]+=1;
		}
		if ($aciertos==5 && $complementario==false){
			$ArrayAciertos[5]+=1;
		}
		if ($aciertos==6){
			$ArrayAciertos[6]+=1;
		}
		if ($aciertos==5 && $complementario==true){
			$ArrayAciertos[7]+=1;
		}
		}
		$s++;
	}

	echo "<br>";
	echo "Acertantes 0 numeros: ".$ArrayAciertos[0]."<br>";
	echo "Acertantes 1 numeros: ".$ArrayAciertos[1]."<br>";
	echo "Acertantes 2 numeros: ".$ArrayAciertos[2]."<br>";
	echo "Acertantes 3 numeros: ".$ArrayAciertos[3]."<br>";
	echo "Acertantes 4 numeros: ".$ArrayAciertos[4]."<br>";
	echo "Acertantes 5 numeros: ".$ArrayAciertos[5]."<br>";
	echo "Acertantes 5 + complementario: ".$ArrayAciertos[7]."<br>";
	echo "Acertantes 6 numeros: ".$ArrayAciertos[6]."<br>";
	echo "</br>";
	echo "Apuestas jugadas: ".($numeroApuestas)."<br>";
	calcularPremios($recaudacion,$ArrayAciertos);
?>