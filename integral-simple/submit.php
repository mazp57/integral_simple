<?php
	//VARIABLES CONSTANTE
	define('nmax', 3);
	define('nmin', 2);
	//VARIABLES INICIADAS EN 0
	$x = 0;
	$y = 0;
	$Fxmax = 0;
	$Fxmin = 0;
	$VR = 0;
	$a = 0;
	$r = 0;
	$AR = 0; 
	$ER = 0;
	$p = 0;
	$VE = 0;
	//variable obtenida del FORM
	$S = $_POST['simulaciones']; // Número de simulaciones
	//VALIDACIONES
	$number_check = preg_match("/^[0-9]+$/", $S);
	if(!$number_check || $S == 0){
		echo '<script>alertify.alert("Error :(", "El campo solo debe contener un número positivo entero y debe ser mayor a 0");</script>';	
	}else{
		//CALCULOS
		$Fxmax = CalcularDanF(nmax);
		for($i=0;$i<$S;$i++){
			$p = CalcularNumeroAleatorio(0,$Fxmax);
			$x = CalcularNumeroAleatorio(nmin, nmax);
			$y = CalcularDanF($x);
			if ($p < $y) {
                $a++;
            }
		}
        $r = $a/$S; // RESULTADO
        $VR = CalcularFdx(nmax) - CalcularFdx(nmin); // VALOR REAL
        $AR = CalcularAreaRectangulo($Fxmax, (nmax - nmin)); // AREA DEL RECTANGULO
        $VE = $r * $AR; // VALOR ESTIMADO
        $ER = CalcularErrorRelativo($VE, $VR); // ERROR RELATIVO
		// MOSTRAMOS EL RESULTADO
		echo '
			<div style="margin-top:10px;background-color: #d9edf7;padding: 23px;border-radius: 4px;">
				<div class="row">
					<div class="col-md-12 imagen" style="text-align:center;">
						<img src="resources/img/4.svg" style="height:120px;width:120px;">
					</div>
					<div class="col-md-12 texto">
						<div style="margin:14px;">
							<span style="font-size:18px;"><strong>Resultado Matemático de la integral:</strong> '.$VR.' Unidades Cuadradas</span><br>
							<span style="font-size:18px;"><strong>Resultado aproximado de la integral por el Método de Monte Carlo:</strong> '.$VE.' Unidades Cuadradas</span><br>
							<span style="font-size:18px;"><strong>% Error entre valor real y el valor aproximado:</strong> '.$ER.'%</span><br>
							<span style="font-size:18px;"><strong>% porcentaje de puntos debajo de la curva:</strong> '.($r * 100).'%</span><br>
						</div>
					</div>
				</div>
			</div>
		';
	}
	
	
// FUNCIONES NECESARIAS 

    function CalcularNumeroAleatorio($min, $max) {
		$n = mt_rand($min, $max);
        return $n;
    }
	
    function CalcularFdx($n) {
        return ($n * $n * $n) + ($n * $n);

    }
	
    function CalcularAreaRectangulo($h, $l) {
        return $h * $l;
    }
	
    function CalcularDanF($n) {
        return ((3 * ($n * $n)) + (2 * $n));
    }
	
    function CalcularErrorRelativo($valorEstimado, $valorReal) {
        return abs((($valorEstimado - $valorReal) / $valorReal) * 100);
    }
?>