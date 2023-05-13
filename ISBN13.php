<?php

class Isbn13
{

    var $salidaResultado;

    function principal()
    {
        $this->datosh();
    } //close method

    function datosh()
    {
        $numeroCasos = trim(fgets(STDIN));
        for ($i = 1; $i <= $numeroCasos; $i++) {

            if ($numeroCasos > 0 && $numeroCasos <= 10) {
                $isbn = trim(fgets(STDIN));
                $isbn_2 = $isbn;

                $isbn = str_replace(' ', '', $isbn);
                $isbn = str_replace('-', '', $isbn);

                $isbnArr = str_split($isbn);

                $this->salidaResultado = "INCORRECTO".PHP_EOL;

                $resto = 0;
                $DC = 0;

                if ((substr_count($isbn_2, ('-')) > 0) && (substr_count($isbn_2, ' ') > 0)) {
                    //  ISBN INCORRECTO: contiene espacios y giones
                } else if (count($isbnArr) > 13) {
                    //  ISBN INCORRECTO: el isbn tiene más de 13 digitos
                } else {
                    $this->verificacion($isbn_2, $isbnArr, $resto, $DC);
                }
                echo $this->salidaResultado;
            }
        }
    } //close method

    function verificacion($isbn_2, $isbnArr, $resto, $DC)
    {
        if (((substr_count($isbn_2, ('-')) == 4) && (substr_count($isbn_2, ' ') == 0)) || ((substr_count($isbn_2, ('-')) == 0) && (substr_count($isbn_2, ' ') == 4)) || ((substr_count($isbn_2, ('-')) == 0) && (substr_count($isbn_2, ' ') == 0))) {
            if (!preg_match("'/^[0-9]+$/'", $isbn_2)) {

                $totalIsbn = 0;
                $resto;
                $DC;

                for ($k = 0; $k <= count($isbnArr) - 2; $k++) {
                    if ($k % 2 == 0) {
                        $temp = $isbnArr[$k] * 1;
                    } else {
                        $temp = $isbnArr[$k] * 3;
                    }

                    $totalIsbn += $temp;
                }

                $resto = $totalIsbn % 10;

                if ($resto == 0) {
                    $DC = $resto;
                } else {
                    $DC = 10 - $resto;
                }

                if ($DC == substr($isbn_2, -1)) {
                    $this->salidaResultado = "CORRECTO".PHP_EOL;
                    // } else {
                    //     echo "INCORRECTO";
                }
                //echo $i . "\n";
            }
        }
    } //close method
} //close class

$obj = new Isbn13();

$obj->principal();


// $numeroCasos = trim(fgets(STDIN));
// for ($i = 1; $i <= $numeroCasos; $i++) {

//     if ($numeroCasos > 0 && $numeroCasos <= 10) {
//         $isbn = trim(fgets(STDIN));
//         $isbn_2 = $isbn;

//         $isbn = str_replace(' ', '', $isbn);
//         $isbn = str_replace('-', '', $isbn);

//         $isbnArr = str_split($isbn);

//         $salidaResultado = "INCORRECTO";

//         if ((substr_count($isbn_2, ('-')) > 0) && (substr_count($isbn_2, ' ') > 0)) {
//             //  ISBN INCORRECTO: contiene espacios y giones
//         } else if (count($isbnArr) > 13) {
//             //  ISBN INCORRECTO: el isbn tiene más de 13 digitos
//         } else {


//             if (((substr_count($isbn_2, ('-')) == 4) && (substr_count($isbn_2, ' ') == 0)) || ((substr_count($isbn_2, ('-')) == 0) && (substr_count($isbn_2, ' ') == 4)) || ((substr_count($isbn_2, ('-')) == 0) && (substr_count($isbn_2, ' ') == 0))) {
//                 if (!preg_match("'/^[0-9]+$/'", $isbn_2)) {

//                     $totalIsbn = 0;
//                     $resto;
//                     $DC;

//                     for ($k = 0; $k <= count($isbnArr) - 2; $k++) {
//                         if ($k % 2 == 0) {
//                             $temp = $isbnArr[$k] * 1;
//                         } else {
//                             $temp = $isbnArr[$k] * 3;
//                         }

//                         $totalIsbn += $temp;
//                     }

//                     $resto = $totalIsbn % 10;

//                     if ($resto == 0) {
//                         $DC = $resto;
//                     } else {
//                         $DC = 10 - $resto;
//                     }

//                     if ($DC == substr($isbn_2, -1)) {
//                         $salidaResultado = "CORRECTO";
//                         // } else {
//                         //     echo "INCORRECTO";
//                     }
//                     //echo $i . "\n";
//                 }
//             }
//         }
//         echo $salidaResultado;
//     }
// }
