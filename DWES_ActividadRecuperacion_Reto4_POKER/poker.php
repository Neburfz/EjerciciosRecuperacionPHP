<html>
	<head><title>Póker_RubénFernándezZaplana</title></head>
	<body>
	<?php
	
	echo "<h1 align='center'>Póker</h1>";
	//Array que contiene todas las cartas de la baraja
	$baraja=array("1P","1D","1T","1C","2P","2D","2T","2C","3P","3D","3T","3C","4P","4D","4T","4C","5P","5D","5T","5C","6P","6D","6T","6C","7P","7D","7T","7C","8P","8D","8T","8C","9P","9D","9T","9C","10P","10D","10T","10C","JP","JD","JT","JC","QP","QD","QT","QC","KP","KD","KT","KC",);
	$cartasmesa=array();
	$mesa=array();
	//Defino los arrays que van a contener las cartas de cada jugador de manera individual
	$jugador1=array();
	$jugador2=array();
	$jugador3=array();
	$jugador4=array();
	
	//Funcion que genera 11 cartas diferentes, 2 para cada jugador y 3 para la mesa:
	function sacarCartas(){
		$cartas=array();
		while (count($cartas)<11){
			$aleatorio=rand(0,51);
			while (in_array($aleatorio,$cartas)){
				$aleatorio=rand(0,51);
			}
			array_push($cartas,$aleatorio);
		}
		return $cartas;
	}
	
	$cartasmesa=sacarCartas();
	
	//For que permite saber la carta de la baraja a la que el número aleatorio generado en la anterior funcion hace referencia:
	for($i=0;$i<count($cartasmesa);$i++){
		$numero=$cartasmesa[$i];
		$carta=$baraja[$numero];
		$cartasmesa[$i]=$carta;
	}
	//Asignación de las cartas para el jugador1:
	array_push($jugador1,$cartasmesa[0]);
	array_push($jugador1,$cartasmesa[1]);
	//Asignación de las cartas para el jugador2:
	array_push($jugador2,$cartasmesa[2]);
	array_push($jugador2,$cartasmesa[3]);
	//Asignación de las cartas para el jugador3:
	array_push($jugador3,$cartasmesa[4]);
	array_push($jugador3,$cartasmesa[5]);
	//Asignación de las cartas para el jugador4:
	array_push($jugador4,$cartasmesa[6]);
	array_push($jugador4,$cartasmesa[7]);
	//Asignación de las cartas para la mesa:
	array_push($mesa,$cartasmesa[8]);
	array_push($mesa,$cartasmesa[9]);
	array_push($mesa,$cartasmesa[10]);
	
	//Genero la tabla en la que se van a mostrar las cartas de cada jugador, junto con las de la mesa:
	echo "<table border='1px solid'>

  <tr>

    <th>Jugador</th>
    <th>Carta1</th>
    <th>Carta2</th>
    <th>Carta3</th>
	<th>Carta4</th>
	<th>Carta5</th>

  </tr>

  <tr>

    <td>Jugador1</td>
    <td><img width='50px' src=images/$jugador1[0].png></td>
    <td><img width='50px' src=images/$jugador1[1].png></td>
    <td><img width='50px' src=images/$mesa[0].png></td>
    <td><img width='50px' src=images/$mesa[1].png></td>
	<td><img width='50px' src=images/$mesa[2].png></td>

  </tr>

  <tr>

    <td>Jugador2</td>
	<td><img width='50px' src=images/$jugador2[0].png></td>
    <td><img width='50px' src=images/$jugador2[1].png></td>
	<td><img width='50px' src=images/$mesa[0].png></td>
    <td><img width='50px' src=images/$mesa[1].png></td>
	<td><img width='50px' src=images/$mesa[2].png></td>

  </tr>

  <tr>

    <td>Jugador3</td>
    <td><img width='50px' src=images/$jugador3[0].png></td>
    <td><img width='50px' src=images/$jugador3[1].png></td>
	<td><img width='50px' src=images/$mesa[0].png></td>
    <td><img width='50px' src=images/$mesa[1].png></td>
	<td><img width='50px' src=images/$mesa[2].png></td>

  </tr>
  
  <tr>

    <td>Jugador4</td>
    <td><img width='50px' src=images/$jugador4[0].png></td>
    <td><img width='50px' src=images/$jugador4[1].png></td>
	<td><img width='50px' src=images/$mesa[0].png></td>
    <td><img width='50px' src=images/$mesa[1].png></td>
	<td><img width='50px' src=images/$mesa[2].png></td>

  </tr>

</table>";

//Separo el palo del número para quedarme solo con el número de carta:
for($i=0;$i<2;$i++){
	$jugador1[$i]=trim($jugador1[$i],"CDPT");
	$jugador2[$i]=trim($jugador2[$i],"CDPT");
	$jugador3[$i]=trim($jugador3[$i],"CDPT");
	$jugador4[$i]=trim($jugador4[$i],"CDPT");
}

for($i=0;$i<count($mesa);$i++){
	$mesa[$i]=substr($mesa[$i],0,1);
}

//Añado a cada jugador las cartas repartidas a la mesa:
array_push($jugador1,$mesa[0],$mesa[1],$mesa[2]);
array_push($jugador2,$mesa[0],$mesa[1],$mesa[2]);
array_push($jugador3,$mesa[0],$mesa[1],$mesa[2]);
array_push($jugador4,$mesa[0],$mesa[1],$mesa[2]);

//Ordeno el array de cartas:
sort($jugador1);
sort($jugador2);
sort($jugador3);
sort($jugador4);

//Uso array_count_values para saber las veces que una carta se repite:
$contj1 = array_count_values($jugador1);
$contj2 = array_count_values($jugador1);
$contj3 = array_count_values($jugador1);
$contj4 = array_count_values($jugador1);

$pareja=false;
$trio=false;

//Jugador 1

echo "La carta más alta del jugador 1 es ".$jugador1[4]."</br>";
foreach($contj1 as $num => $rep) {
	if($contj1[$num]==2){
		echo "El jugador 1 ha sacado una pareja de ".$num."</br>";
		$pareja=true;
	}
	if($contj1[$num]==3){
		echo "El jugador 1 ha sacado un trío de ".$num."</br>";
		$trio=true;
	}
	if($contj1[$num]==4){
		echo "El jugador 1 ha sacado un póker";
	}
}

if ($pareja==true && $trio==true){
	echo "El jugador1 tiene un full";
}
echo "</br>";

//Jugador 2

echo "La carta más alta del jugador 2 es ".$jugador2[4]."</br>";
foreach($contj2 as $num => $rep) {
	if($contj2[$num]==2){
		echo "El jugador 2 ha sacado una pareja de ".$num."</br>";
		$pareja=true;
	}
	if($contj2[$num]==3){
		echo "El jugador 2 ha sacado un trío de ".$num."</br>";
		$trio=true;
	}
	if($contj2[$num]==4){
		echo "El jugador 2 ha sacado un póker";
	}
}

if ($pareja==true && $trio==true){
	echo "El jugador2 tiene un full";
}
echo "</br>";

//Jugador 3

echo "La carta más alta del jugador 3 es ".$jugador3[4]."</br>";
foreach($contj3 as $num => $rep) {
	if($contj3[$num]==2){
		echo "El jugador 3 ha sacado una pareja de ".$num."</br>";
		$pareja=true;
	}
	if($contj3[$num]==3){
		echo "El jugador 3 ha sacado un trío de ".$num."</br>";
		$trio=true;
	}
	if($contj3[$num]==4){
		echo "El jugador 3 ha sacado un póker";
	}
}

if ($pareja==true && $trio==true){
	echo "El jugador3 tiene un full";
}
echo "</br>";

//Jugador 4

echo "La carta más alta del jugador 4 es ".$jugador4[4]."</br>";
foreach($contj4 as $num => $rep) {
	if($contj4[$num]==2){
		echo "El jugador 4 ha sacado una pareja de ".$num."</br>";
		$pareja=true;
	}
	if($contj4[$num]==3){
		echo "El jugador 4 ha sacado un trío de ".$num."</br>";
		$trio=true;
	}
	if($contj4[$num]==4){
		echo "El jugador 4 ha sacado un póker";
	}
}

if ($pareja==true && $trio==true){
	echo "El jugador 4 tiene un full";
}
echo "</br>";

?>
	</body>
	</html>