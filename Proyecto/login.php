<?php

include_once "includes/conexion.php";
include_once "includes/helpers.php";

$usuario = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_SESSION['login_error'])){
        session_unset();
    }

    /* Verificamos que ningun campo se vaya vacio */
    if (empty($_POST["usuario"]) || empty($_POST['password'])) {
        header('Location: index.php');
    }else {

        $correo_usuario = limpiar_datos($_POST['usuario']);
        $password = limpiar_datos($_POST['password']);

        /* enviamos los datos a la funcion para validar los datos */
        validacion_usuario($correo_usuario, $password, $conexionDB);
    }
}

function validacion_usuario($correo_usuario, $password, $conexionDB){

    try{

        $consultaSQL = "SELECT idUsuarios, nombres, apellidos, email, contraseña FROM usuarios WHERE email = '".$correo_usuario."'";

        $ejecucionConsulta = mysqli_query($conexionDB, $consultaSQL);

        if(mysqli_num_rows($ejecucionConsulta) == 1){

            $resultadoConsulta = mysqli_fetch_assoc($ejecucionConsulta);

            $verificacionContraseña = password_verify($password, $resultadoConsulta["contraseña"]);

            if($verificacionContraseña == true){

                $_SESSION['usuario'] = $resultadoConsulta;
                #echo "<script>alert('sesion iniciada');</script>";               
                #echo "<script>alert('".$_SESSION['usuario']['nombres']."');</script>";
            } else {
                $_SESSION['login_error'] = "Login Incorrecto";
                #echo "<script>alert('sesion no iniciada');</script>";
            }
        }
    } catch(Exception $e){
        $_SESSION["login_error"] = "A ocurrido un Error: ".$e;
    }

    header('Location: index.php');
}


?>