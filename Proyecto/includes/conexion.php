<?php

$server = "localhost";
$username = "root";
$password = "root";
$database = "proyecto";

try {
    
    $conexionDB = mysqli_connect($server,$username,$password,$database);

    #para evitar errores al traer datos con simbolos especiales (tildes, etc...)
    mysqli_query($conexionDB,"SET NAMES 'utf8'");

    /* Iniciamos la sesion */
    if(!isset($_SESSION)){
        session_start();
    }

} catch (Exception $e) {

    echo "Error al conextar a la DB: ".$e;
    
}

