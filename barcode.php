<?php
$barCode = trim(fgets(STDIN));

//floor() -> redondea al menor
//ceil() -> redondea al mayor

if ($barCode == 0) {

} else {
    do {
        $barCodeAux = $barCode;
        $barCode = str_split($barCode);
        $len = count($barCode);


        //if ($barCode[0] !== end($barCode)) {
        //
        if ($len % 2 != 0) {    //  impar
            if ($barCode[0] !== end($barCode)) {

                //$numStr = strval($barCodeAux);
                //$strLen = strlen($numStr);

                if ($len < 4) {
                    echo "INCORRECTO IMPAR" . PHP_EOL;
                } else {
                    $first = $barCode[0];
                    $last = end($barCode);

                    // echo $first . "n";
                    // echo $last . "n";

                    $producto = $first * $last;

                    if ($first > $last) {
                        $resta = abs($first - $last);
                    } else {
                        $resta = abs($last - $first);
                    }

                    //$resta = abs($first - $last);
                    $resultado = $producto % $resta;

                    //echo "n" . $resultado;

                    $arrSize = count($barCode);
                    $lastIndex = $arrSize - 1;
                    $middleIndex = floor($lastIndex / 2);

                    // echo "n" . $middleIndex;
                    // echo "n" . $barCode[$middleIndex];

                    if ($resultado == $barCode[$middleIndex]) {
                        echo "CORRECTO IMPAR" . PHP_EOL;
                    } else {
                        echo "INCORRECTO IMPAR" . PHP_EOL;
                    }
                }
            } else {
                echo "INCORRECTO IMPAR" . PHP_EOL;
            }

        } else {
            if ($barCode[0] !== end($barCode)) {

                $len = count($barCode);

                if ($len < 4) {
                    echo "INCORRECTO PAR" . PHP_EOL;
                } else {
                    $arrSize = count($barCode);
                    $lastIndex = $arrSize - 1;
                    $middleIndex = ceil($lastIndex / 2);

                    $primerMitad = array_slice($barCode, 0, $middleIndex);
                    $segundaMitad = array_slice($barCode, $middleIndex);

                    $sumFirst = 0;
                    $sumLast = 0;

                    for ($i = 0; $i <= count($primerMitad) - 1; $i++) {
                        $sumFirst += $primerMitad[$i];
                    }

                    for ($i = 0; $i <= count($segundaMitad) - 1; $i++) {
                        $sumLast += $segundaMitad[$i];
                    }

                    $resultadoImpar = $sumFirst & $sumLast;

                    if ($resultadoImpar % 2 != 0) {
                        echo "CORRECTO PAR" . PHP_EOL;
                    } else {
                        echo "INCORRECTO PAR" . PHP_EOL;
                    }
                }


            } else {
                echo "INCORRECTO PAR" . PHP_EOL;
            }
            //echo $sumLast;
        }
        //} else {
        //

        // }

        $barCode = trim(fgets(STDIN));
    } while ($barCode != 0);
}


function sumarArray($arr)
{
    $sum = 0;
    for ($i = 0; $i <= count($arr) - 1; $i++) {
        $sum += $arr[$i];
    }
    return $arr;
}//close function
