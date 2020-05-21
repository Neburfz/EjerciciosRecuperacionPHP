<?php
//Compruebo que el saldo mínimo del que disponen todos los jugadores es 100:
function comprobarSaldo(){
	$f1=file("saldo.txt");
	foreach ($f1 as $linea => $texto){
		$escribir=explode("#", $texto);
		if ($escribir[1]<100){
			echo "No se pueden hacer apuestas porque no todos los jugadores tienen mínimo 100€ de saldo.</br>";
		}
	}
}

//Funcion que retira el saldo apostado en el fichero saldo.txt
function retirarSaldo($apuestaj1,$apuestaj2,$apuestaj3,$apuestaj4){
$f1=file("saldo.txt");
foreach ($f1 as $linea => $texto){
		$j=$f1[$linea];
		echo $j."</br>";
		$j=explode("#",$j);
		$j[1]=(int)$j[1];
		$j[1]=$j[1]-$apuestaj1;
		}
}
	
//Compruebo que las apuestas de los jugadores son mínimo de 5€ y máximo de 50€:
function comprobarApuestas($apuestaj1,$apuestaj2,$apuestaj3,$apuestaj4){
	if ($apuestaj1<5 || $apuestaj1>50){
		echo "El jugador 1 debe hacer una apuesta mínimo de 5€ y máximo de 50€";
	}
	if ($apuestaj2<5 || $apuestaj2>50){
		echo "El jugador 2 debe hacer una apuesta mínimo de 5€ y máximo de 50€";
	}
	if ($apuestaj3<5 || $apuestaj3>50){
		echo "El jugador 3 debe hacer una apuesta mínimo de 5€ y máximo de 50€";
	}
	if ($apuestaj4<5 || $apuestaj4>50){
		echo "El jugador 4 debe hacer una apuesta mínimo de 5€ y máximo de 50€";
	}	
}

//Funcion que genera 10 cartas diferentes, 2 para cada jugador y la banca:
	function sacarCartas(){
		$cartas=array();
		while (count($cartas)<10){
			$aleatorio=rand(0,51);
			while (in_array($aleatorio,$cartas)){
				$aleatorio=rand(0,51);
			}
			array_push($cartas,$aleatorio);
		}
		return $cartas;
	}

?>