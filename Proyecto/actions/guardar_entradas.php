<?php

INCLUDE_ONCE "../includes/helpers.php";
INCLUDE_ONCE "../includes/conexion.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['categoria']) || !empty($_POST['descripcion']) || !empty($_POST['titulo']) ){

            $titulo = limpiar_datos($_POST['titulo']);
            $descripcion = limpiar_datos($_POST['descripcion']);
            $categoria = limpiar_datos($_POST['categoria']);

            $consultaSQL = "INSERT INTO entradas VALUES (null, '".$categoria."', '".$titulo."', '".$descripcion."', CURDATE())";

            try {
                $ejecucionConsulta = mysqli_query($conexionDB, $consultaSQL);

                if ($ejecucionConsulta == true) {
                    $_SESSION['ejecucion'] = "Categoria Creada Exitosamente";
                }
            } catch (Exception $e) {
                $_SESSION['ejecucion'] = "Ocurrio un error: " . $e;
            }
        } else {
            $_SESSION['ejecucion'] = "Entrada No creada";
        }
        header("Location: crear_entradas.php");
    }


?>