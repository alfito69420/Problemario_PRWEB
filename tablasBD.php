<?php
// class TablasBd
// {
$conexion;
$servidor;
$usuario;
$password;
$nombreBaseDatos;
$consulta;

principal();

function principal()
{
    datosh();
} //close function

function datosh()
{
    $servidor = trim(fgets(STDIN));
    $usuario = trim(fgets(STDIN));
    $password = trim(fgets(STDIN));
    $nombreBaseDatos = trim(fgets(STDIN));
    conexion($servidor, $usuario, $password, $nombreBaseDatos);
}

function conexion($servidor, $usuario, $password, $nombreBaseDatos)
{
    $conexion = mysqli_connect($servidor, $usuario, $password, $nombreBaseDatos);
    consulta($nombreBaseDatos, $conexion);
}

function consulta($nombreBaseDatos, $conexion)
{
    $consulta = "SELECT table_name
            FROM INFORMATION_SCHEMA.TABLES
            WHERE TABLE_SCHEMA='" . $nombreBaseDatos . "'";

    mostrar($conexion, $consulta);
} //close function

function mostrar($conexion, $consulta)
{
    $result = mysqli_query($conexion, $consulta);
    $tablas = array();
    $i = 0;

    while ($resultCheck = mysqli_fetch_assoc($result)) {
        $tablas[$i] = $resultCheck["table_name"];
        $i++;
    }

    rsort($tablas);

    for ($i = 0; $i < sizeof($tablas); $i++) {
        $cont = $i + 2;

        if ($cont > sizeof($tablas)) {
            echo $tablas[$i];
        } else {
            echo $tablas[$i] . ':';
        }
    }

    //mysqli_close($conexion);
}//close function 

