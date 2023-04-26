<?php

$nombre = $apellido = $email = $password = "";


/* Recepcion de datos por post */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once "includes/conexion.php";
    include_once "includes/helpers.php";

    /* verificamos que ningun dato se vaya vacio */
    if (empty($_POST["nombres"]) || empty($_POST['apellidos']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "Datos del formulario no complatos correctamente";
    } else {
        $nombres = limpiar_datos($_POST['nombres']);
        $apellidos = limpiar_datos($_POST['apellidos']);
        $email = limpiar_datos($_POST['email']);
        $password = limpiar_datos($_POST['password']);

        echo "<script> alert('formulario llenado correctamente'); </script>";

        /* Encriptando la password (usar password_verify para contraseñas cifradas por hash) */
        $password_encrypt = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        /* validamos que el email a insertar no exista previamente */
        $validacion_email = validar_email($email, $conexionDB);

        if($validacion_email == true){
            /* realiza el insert */
            insertar_datos($nombres, $apellidos, $email, $password_encrypt, $conexionDB);
        } else {
            /* detiene laejecucion del script */
            #header("Location: index.php"); /* redirecciona al index */
            exit();
        }
    }
}

function validar_email($email,$conexionDB){
    $consultaSQL = "SELECT * FROM usuarios WHERE email = '$email'";

    $resultadoSelect = mysqli_query($conexionDB, $consultaSQL);

    if(mysqli_num_rows($resultadoSelect) > 0){
        echo "<script> alert('Ya existe un usuario con el correo insertado'); </script>";
        return false;
    } else {
        return true;
    }
}


function insertar_datos($nombres, $apellidos, $email, $password_encrypt, $conexionDB){
    $insertSQL = "INSERT INTO usuarios VALUES (null, '$nombres', '$apellidos', CURDATE(),'$email', '$password_encrypt')";

    $guardarDatos = mysqli_query($conexionDB,$insertSQL);

    if($guardarDatos == true){
        echo "<script> alert('Usuario creado exitosamente'); </script>";
        header("Location: index.php"); /* redirecciona al index */
    } else {
        echo "<script> alert('El usuario no se creo'); </script>";
        header("Location: index.php"); /* redirecciona al index */
    }
}



?>