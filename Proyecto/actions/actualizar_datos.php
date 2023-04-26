
<?php 

INCLUDE_ONCE "../includes/helpers.php";
INCLUDE_ONCE "../includes/conexion.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['nombres']) || !empty($_POST['apellidos'])){

            $nuevo_nombre = limpiar_datos($_POST['nombres']);
            $nuevo_apellido = limpiar_datos($_POST['apellidos']);
            $idUsuario = $_SESSION['usuario']['idUsuarios'];

            $consultaSQL = "UPDATE usuarios SET nombres='".$nuevo_nombre."', apellidos='".$nuevo_apellido."' WHERE idUsuarios='".$idUsuario."'";
            
            $ejecucionConsulta = mysqli_query($conexionDB,$consultaSQL);
    
            if($ejecucionConsulta){
                $_SESSION['ejecucion'] = "Datos Actualizados Correctamente";
                header("Location: ../mis_datos.php");
                #echo "<script>alert('consulta ejecutada');</script>";
            }
            else {
                $_SESSION['ejecucion'] = "Datos no actualizados";
                #echo "<script>alert('consulta NO ejecutada');</script>";
                header("Location: ../mis_datos.php");
            }
        }
    }




?>