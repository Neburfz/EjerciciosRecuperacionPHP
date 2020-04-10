<?php
include("r22_funciones.php");

$fechaSorteo=$_POST['fechasorteo'];
$recaudacion=$_POST['recaudacion'];
$ArrayAciertos=array(0,0,0,0,0,0,0,0);
$ArrayNumerosGanadores=array(0,0,0,0,0,0,0);

$ArrayNumerosGanadores=random($ArrayNumerosGanadores);

//Añadir reintegro:
$ArrayNumerosGanadores[7]=rand(1,8);

echo "<h3>Sorteo: ".$fechaSorteo."</br>";
echo "Recaudacion: ".$recaudacion."</h3>";
echo "Numero Ganador: <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[0]'.png>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[1]'.png>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[2]'.png>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[3]'.png>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[4]'.png>";
echo " <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[5]'.png><br>";

echo "Complementario: <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[6]'.png><br>";
echo "Reintegro: <img width='40px' src='r22_bolasprimitiva/$ArrayNumerosGanadores[7]'.png><br>";

$lineas=file("r22_primitiva.txt");
$numeroApuestas=0;

	foreach($lineas as $linea => $texto){
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

	echo "<br>";
	echo "Acertantes 0 numeros: ".($ArrayAciertos[0]-1)."<br>";
	echo "Acertantes 1 numeros: ".$ArrayAciertos[1]."<br>";
	echo "Acertantes 2 numeros: ".$ArrayAciertos[2]."<br>";
	echo "Acertantes 3 numeros: ".$ArrayAciertos[3]."<br>";
	echo "Acertantes 4 numeros: ".$ArrayAciertos[4]."<br>";
	echo "Acertantes 5 numeros: ".$ArrayAciertos[5]."<br>";
	echo "Acertantes 5 + complementario: ".$ArrayAciertos[7]."<br>";
	echo "Acertantes 6 numeros: ".$ArrayAciertos[6]."<br>";
	echo "</br>";
	echo "Apuestas jugadas: ".($numeroApuestas-1)."<br>";
	
	$recaudacion=($recaudacion*0.8);
	$seis=$recaudacion*0.4;
	$cincocomplementario=$recaudacion*0.3;
	$cinco=$recaudacion*0.15;
	$cuatro=$recaudacion*0.8;
	$tres=$recaudacion*0.05;
	$reintegro=$recaudacion*0.02;
	
	$file=fopen("premios.txt","w+");
        fwrite($file,"C6#".$seis."  ");
        fwrite($file,"C5+#".$cincocomplementario."  ");
        fwrite($file,"C5#".$cinco."  ");
        fwrite($file,"C4#".$cuatro."  ");
        fwrite($file,"C3#".$tres."  ");
        fwrite($file,"CR#".$reintegro."  ");
    fclose($file);
	
?>