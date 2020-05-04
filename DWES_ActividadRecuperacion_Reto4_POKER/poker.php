<html>
	<head><title>Póker_RubénFernándezZaplana</title></head>
	<body>
	<?php
	
	echo "<h1 align='center'>Póker</h1>";
	//Array que contiene todas las cartas de la baraja
	$baraja=array("1P","1D","1T","1C","2P","2D","2T","2C","3P","3D","3T","3C","4P","4D","4T","4C","5P","5D","5T","5C","6P","6D","6T","6C","7P","7D","7T","7C","8P","8D","8T","8C","9P","9D","9T","9C","10P","10D","10T","10C","JP","JD","JT","JC","QP","QD","QT","QC","KP","KD","KT","KC",);
	$mesa=array();
	//Defino los arrays que van a contener las cartas de cada jugador de manera individual
	$jugador1=array();
	$jugador2=array();
	$jugador3=array();
	$jugador4=array();
	
	//Funcion que genera un numero aleatorio para el jugador1
	function jugador1(){
		$aleatorio=rand(0,50);
		return $aleatorio;
	}
	
	function jugador2(){
		$aleatorio=rand(0,48);
		return $aleatorio;
	}
	
	function jugador3(){
		$aleatorio=rand(0,46);
		return $aleatorio;
	}
	
	function jugador4(){
		$aleatorio=rand(0,44);
		return $aleatorio;
	}
	
	function mesa(){
		$aleatorio=rand(0,42);
		return $aleatorio;
	}

	//CARTAS JUGADOR1
	$aleatorio=jugador1();
	//Inserto en el array Jugador1 la posición aleatoria escogida de la baraja de todas las cartas
	array_push($jugador1,$baraja[$aleatorio]);
	//Elimino de la baraja la posición aleatoria escogida
	unset($baraja[$aleatorio]);
	//Reordeno el array para que no queden posiciones en null
	$baraja = array_values($baraja);
	$aleatorio=jugador1();
	array_push($jugador1,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	
	//CARTAS JUGADOR2
	$aleatorio=jugador2();
	array_push($jugador2,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	$aleatorio=jugador2();
	array_push($jugador2,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	
	//CARTAS JUGADOR3
	$aleatorio=jugador3();
	array_push($jugador3,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	$aleatorio=jugador3();
	array_push($jugador3,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	
	//CARTAS JUGADOR4
	$aleatorio=jugador4();
	array_push($jugador4,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	$aleatorio=jugador4();
	array_push($jugador4,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	
	//CARTAS MESA
	$aleatorio=mesa();
	array_push($mesa,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	$aleatorio=mesa();
	array_push($mesa,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	$aleatorio=mesa();
	array_push($mesa,$baraja[$aleatorio]);
	unset($baraja[$aleatorio]);
	$baraja = array_values($baraja);
	
	//Genero la tabla en la que se van a mostrar las cartas de cada jugador
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

</table>"
	
?>
	</body>
	</html>