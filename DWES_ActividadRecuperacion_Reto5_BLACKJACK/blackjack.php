<html>
	<head><title>BlackJack_RubénFernándezZaplana</title></head>
	<body>
	<?php
	include("funciones_blackjack.php");
	echo "<h1 align='center'>BlackJack</h1>";

	comprobarSaldo();
	
	//Apuestas de los jugadores
	$apuestaj1=$_POST["apuesta1"];
	$apuestaj2=$_POST["apuesta2"];
	$apuestaj3=$_POST["apuesta3"];
	$apuestaj4=$_POST["apuesta4"];
	
	comprobarApuestas($apuestaj1,$apuestaj2,$apuestaj3,$apuestaj4);
	
	//Defino la baraja
	$baraja=array("1P","1D","1T","1C","2P","2D","2T","2C","3P","3D","3T","3C","4P","4D","4T","4C","5P","5D","5T","5C","6P","6D","6T","6C","7P","7D","7T","7C","8P","8D","8T","8C","9P","9D","9T","9C","10P","10D","10T","10C","JP","JD","JT","JC","QP","QD","QT","QC","KP","KD","KT","KC",);
	$cartasmesa=array();
	$banca=array();
	
	//Defino los arrays que van a contener las cartas de cada jugador de manera individual
	$jugador1=array();
	$jugador2=array();
	$jugador3=array();
	$jugador4=array();
	
	$cartasmesa=sacarCartas($baraja);
	
	//For que permite saber la carta de la baraja a la que el número aleatorio generado en la anterior funcion hace referencia:
	for($i=0;$i<count($cartasmesa);$i++){
		$numero=$cartasmesa[$i];
		$carta=$baraja[$numero];
		$cartasmesa[$i]=$carta;
	}
	
	//Meto en el array de cada jugador y de la banca 2 cartas
	array_push($jugador1,$cartasmesa[0]);
	array_push($jugador2,$cartasmesa[1]);
	array_push($jugador3,$cartasmesa[2]);
	array_push($jugador4,$cartasmesa[3]);
	array_push($banca,$cartasmesa[4]);
	array_push($jugador1,$cartasmesa[5]);
	array_push($jugador2,$cartasmesa[6]);
	array_push($jugador3,$cartasmesa[7]);
	array_push($jugador4,$cartasmesa[8]);
	array_push($banca,$cartasmesa[9]);
	
//Separo el palo del número para quedarme solo con el número de carta:
for($i=0;$i<2;$i++){
	$jugador1[$i]=trim($jugador1[$i],"CDPT");
	$jugador2[$i]=trim($jugador2[$i],"CDPT");
	$jugador3[$i]=trim($jugador3[$i],"CDPT");
	$jugador4[$i]=trim($jugador4[$i],"CDPT");
	$banca[$i]=trim($banca[$i],"CDPT");
}

$contj1=0;
$contj2=0;
$contj3=0;
$contj4=0;
$contbanca=0;

retirarSaldo($apuestaj1,$apuestaj2,$apuestaj3,$apuestaj4);

//For que recorre el array de cada jugador para dar valor a las cartas que son letras y al 1 (X5):
for ($i=0;$i<count($jugador1);$i++){
	if ($jugador1[$i]==1){
			if($jugador1[$i]+$contj1>=15){
				$contj1+=11	;
			}
			else{
				$contj1+=1;
			}
	}
	else{
		if($jugador1[$i]=="K" || $jugador1[$i]=="Q" || $jugador1[$i]=="J"){
			$contj1+=10;
		}
		else{
			$contj1+=$jugador1[$i];
		}
	}
}


for ($i=0;$i<count($jugador2);$i++){
	if ($jugador2[$i]==1){
			if($jugador2[$i]+$contj2>=15){
				$contj2+=11	;
			}
			else{
				$contj2+=1;
			}
	}
	else{
		if($jugador2[$i]=="K" || $jugador2[$i]=="Q" || $jugador2[$i]=="J"){
			$contj2+=10;
		}
		else{
			$contj2+=$jugador2[$i];
		}
	}
}


for ($i=0;$i<count($jugador3);$i++){
	if ($jugador1[$i]==1){
			if($jugador3[$i]+$contj3>=15){
				$contj3+=11	;
			}
			else{
				$contj3+=1;
			}
	}
	else{
		if($jugador3[$i]=="K" || $jugador3[$i]=="Q" || $jugador3[$i]=="J"){
			$contj3+=10;
		}
		else{
			$contj3+=$jugador3[$i];
		}
	}
}

for ($i=0;$i<count($jugador4);$i++){
	if ($jugador4[$i]==1){
			if($jugador4[$i]+$contj4>=15){
				$contj4+=11	;
			}
			else{
				$contj4+=1;
			}
	}
	else{
		if($jugador4[$i]=="K" || $jugador4[$i]=="Q" || $jugador4[$i]=="J"){
			$contj4+=10;
		}
		else{
			$contj4+=$jugador4[$i];
		}
	}
}

for ($i=0;$i<count($banca);$i++){
		if($banca[$i]=="K" || $banca[$i]=="Q" || $banca[$i]=="J"){
			$contbanca+=10;
		}
		else{
			$contbanca+=$banca[$i];
		}
}

// Bucle que me permite seguir repartiendo (o no) cartas según se pase o no de 15 la suma de las cartas de cada jugador (o de 17 la banca)
while ($contj1<=15){
if ($contj1<=15){
	array_push($jugador1,$carta);
	for ($i=0;$i<count($jugador1);$i++){
	$j=count($jugador1)-1;
	$jugador1[$j]=trim($jugador1[$j],"CDPT");
	if($jugador1[$i]=="K" || $jugador1[$i]=="Q" || $jugador1[$i]=="J"){
		$contj1+=10;
	}
}
}
}

while ($contj2<=15){
if ($contj2<=15){
	array_push($jugador2,$carta);
	for ($i=0;$i<count($jugador2);$i++){
	$f=count($jugador2)-1;
	$jugador2[$f]=trim($jugador2[$f],"CDPT");
	
	if($jugador2[$i]=="K" || $jugador2[$i]=="Q" || $jugador2[$i]=="J"){
		$contj2+=10;
	}
}
}
}

while ($contj3<=15){
if ($contj3<=15){
	array_push($jugador3,$carta);
	for ($i=0;$i<count($jugador3);$i++){
	$g=count($jugador3)-1;
	$jugador3[$g]=trim($jugador3[$g],"CDPT");
	if($jugador3[$i]=="K" || $jugador3[$i]=="Q" || $jugador3[$i]=="J"){
		$contj3+=10;
	}
}
}
}

while ($contj4<=15){
if ($contj4<=15){
	array_push($jugador4,$carta);
	for ($i=0;$i<count($jugador4);$i++){
	$r=count($jugador4)-1;
	$jugador4[$r]=trim($jugador4[$r],"CDPT");
	if($jugador4[$i]=="K" || $jugador4[$i]=="Q" || $jugador4[$i]=="J"){
		$contj4+=10;
	}
}
}
}

while ($contbanca<=17){
if ($contbanca<=17){
	array_push($banca,$carta);
	for ($i=0;$i<count($banca);$i++){
	$h=count($banca)-1;
	$banca[$h]=trim($banca[$h],"CDPT");
	if($banca[$i]=="K" || $banca[$i]=="Q" || $banca[$i]=="J"){
		$contbanca+=10;
	}
}
}
}

echo "Jugador1:";
var_dump($jugador1);
echo "Contador del jugador 1:";
echo $contj1;
echo "</br>";
echo "</br>";

echo "Jugador2:";
var_dump($jugador2);
echo "Contador del jugador 2:";
echo $contj2;
echo "</br>";
echo "</br>";

echo "Jugador3:";
var_dump($jugador3);
echo "Contador del jugador 3:";
echo $contj3;
echo "</br>";
echo "</br>";

echo "Jugador4:";
var_dump($jugador4);
echo "Contador del jugador 4:";
echo $contj4;
echo "</br>";
echo "</br>";

echo "Banca:";
var_dump($banca);
echo "Contador de la banca:";
echo $contbanca;
echo "</br>";
echo "</br>";

if($contbanca>21 && $contj1<21){
	echo "El jugador 1 ha ganado</br>";
}

if($contbanca>21 && $contj2<21){
	echo "El jugador 2 ha ganado</br>";
}

if($contbanca>21 && $contj3<21){
	echo "El jugador 3 ha ganado</br>";
}

if($contbanca>21 && $contj4<21){
	echo "El jugador 4 ha ganado</br>";
}

if($contbanca<=21 && $contbanca>$contj1 && $contbanca>$contj2 && $contbanca>$contj3 && $contbanca>$contj4){
	echo "La banca ha ganado</br>";
}
?>
	</body>
	</html>