<?php
$casos = trim(fgets(STDIN));
$iterador = 1;
$flag = 0;
$salidaDominio = "DOMINIO INCORRECTO" . PHP_EOL;
$salidaUsuario = "USUARIO INCORRECTO" . PHP_EOL;
$regex = '/[_a-z0-9-]+(\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-@-]+(\.[A-Za-z0-9-@-]+)*(\.[A-Za-z]{2,})/';
$aaaaa = '/.*\S.*@[^-][A-Za-z0-9-@-]+(\.[A-Za-z0-9-@-]+)*(\.[A-Za-z]{2,})/';
//$newRegex = "^(?=.{1,64}@)[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-@-]+(\.[A-Za-z0-9-@-]+)*(\.[A-Za-z]{2,})$";
//$regex = '/[_a-z0-9-]+(\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-@-]+(\.[A-Za-z0-9-@-]+)*(\.[A-Za-z]{2,})/';
$flag = false;

do {
    $correo = trim(fgets(STDIN));
    $localPart = substr($correo, 0, strrpos($correo, '@'));
    $dominioPart = substr($correo, strrpos($correo, '@') + 1) . PHP_EOL;    //

    echo $localPart;
    echo $dominioPart;

    if (preg_match($aaaaa, $correo)) {
        //if ((substr_count($correo, ('@')) <= 0) || (substr_count($correo, (' ')) > 0) || (substr_count($correo, ('@')) > 1)) {
        if ((substr_count($localPart, ('.')) >= 2) || (substr_count($localPart, (' ')) > 0) || ($localPart == null)) {
            echo $salidaUsuario;
            //} elseif((substr_count($localPart, ('.')) >= 2) || (substr_count($localPart, (' ')) > 0) || ($localPart == null)){
        } elseif ((substr_count($correo, ('@')) <= 0) || (substr_count($correo, (' ')) > 0) || (substr_count($correo, ('@')) > 1)) {
            echo $salidaDominio;
        } else {    // happy path
            echo substr($correo, strrpos($correo, '@') + 1) . PHP_EOL;    //  arreglar
        }
    } else {
        echo $salidaDominio;
    }
    $iterador++;
} while ($iterador <= $casos)
?>