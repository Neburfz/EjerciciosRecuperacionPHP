<?php
function numeroRandom(){
return $numeroRandom=rand(1,49);
}

function random($ArrayNumerosGanadores){
$contador=0;
do {
        $contador1=0;
        $aleatorio=numeroRandom();
        for ($i=0;$i<7;$i++){
            if($ArrayNumerosGanadores[$i]==$aleatorio){
                $contador1=1;
            }
        }
        if($contador1==0){
            $ArrayNumerosGanadores[$contador] = $aleatorio;
            $contador++;
        }
    } while($contador<7);
	return $ArrayNumerosGanadores;
}

//Se ha generado la funcion calcularPremios que calcula y escribe en el fichero "premios.txt" los premios correspondientes y corrigiendo los errores anteriores:
function calcularPremios($recaudacion,$ArrayAciertos){
	$recaudacion=($recaudacion*0.8);
	$seis=($recaudacion*0.4);
	$cincocomplementario=($recaudacion*0.3);
	$cinco=($recaudacion*0.15);
	$cuatro=($recaudacion*0.8);
	$tres=($recaudacion*0.05);
	$reintegro=($recaudacion*0.02);
	
	$file=fopen("premios.txt","w+");
	
	if($ArrayAciertos[6]>0){
		$seiss=$seis/$ArrayAciertos[6];
		fwrite($file,"C6# ".$seis."  ");
	}else{fwrite ($file,"C6# 0");}
		
	fwrite($file,"\n");
		
	if($ArrayAciertos[7]>0){
		$cincocomplementarioo=$cincocomplementario/$ArrayAciertos[7];
		fwrite($file,"C5+# ".$cincocomplementarioo."  ");
	}else{fwrite ($file,"C5+# 0");}
		
		fwrite($file,"\n");
		
	if($ArrayAciertos[5]>0){
		$cincoo=$cinco/$ArrayAciertos[5];
		fwrite($file,"C5# ".$cincoo."  ");
	}else{fwrite ($file,"C5# 0");}
	
		fwrite($file,"\n");
		
	if($ArrayAciertos[4]>0){
		$cuatroo=$cuatro/$ArrayAciertos[4];
		fwrite($file,"C4# ".$cuatroo."  ");
	}else{fwrite ($file,"C4# 0");}
	
		fwrite($file,"\n");
		
	if($ArrayAciertos[3]>0){
		$tress=$tres/$ArrayAciertos[3];
		fwrite($file,"C3# ".$tress."  ");
	}else{fwrite ($file,"C3# 0");}

		fwrite($file,"\n");
		
    fclose($file );
	}

?>