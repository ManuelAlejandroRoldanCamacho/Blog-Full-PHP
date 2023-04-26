<?php

INCLUDE_ONCE "../includes/helpers.php";
INCLUDE_ONCE "../includes/conexion.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['nombres']) || !empty($_POST['apellidos'])){

            $nuevo_nombre = limpiar_datos($_POST['nombres']);

            $nuevo_apellido = limpiar_datos($_POST['apellidos']);

            $consultaSQL = "INSERT INTO categorias VALUES (null, '".$categoria."')";

            $validar_categoria = validar_categoria($conexionDB,$categoria);

            if($validar_categoria == false){
                try{

                    $ejecucionConsulta = mysqli_query($conexionDB,$consultaSQL);
    
                    if($ejecucionConsulta == true){
                        $_SESSION['ejecucion'] = "Categoria Creada Exitosamente";
                        header("Location: ../index.php");
                    }
                    
                } catch(Exception $e){
                    $_SESSION['ejecucion'] = "Ocurrio un error: ".$e;
                }
            } else {
                $_SESSION['ejecucion'] = "Ya existe una categoria con ese nombre";
            }
            header("Location: crear_categoria.php");
        }
    }

?>