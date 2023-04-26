<?php

/* verifica exista la sesion y en caso contrario cierra session y redirecciona */

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['usuario'])){
    session_unset();
    session_destroy();
    header('Location: ../index.php');
} 

?>