
<?php

/* Script con funciones utiles para reautilizar */

function limpiar_datos($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

function listar_categorias($conexionDB){

    $condultaSQL = "SELECT idCategorias, nombre FROM categorias";

    $ejecucionConsulta = mysqli_query($conexionDB, $condultaSQL);
    
    $resultado = array();

    if(mysqli_num_rows($ejecucionConsulta) >= 1){

        $resultado = $ejecucionConsulta;

        return $resultado;

    } else {

        return $resultado;

    }
}

function listar_por_categoria($conexionDB, $id){

    $condultaSQL = "SELECT * FROM entradas WHERE categoria_id = '".$id."'";

    $ejecucionConsulta = mysqli_query($conexionDB, $condultaSQL);
    
    $resultado = array();

    if(mysqli_num_rows($ejecucionConsulta) >= 0){

        $resultado = mysqli_fetch_assoc($ejecucionConsulta);

        return $resultado;

    }
}


function validar_categoria($conexionDB, $categoria){

    $consultaSelect = "SELECT idCategorias, nombre FROM categorias";

    $ejecucionConsulta = mysqli_query($conexionDB,$consultaSelect);

    if(mysqli_num_rows($ejecucionConsulta) >= 1){

        return true;
    }
    return false;
}


function listar_entradas($conexionDB, $limit = null, $categoria = null){

    $consultaSQL = "SELECT e.idEntradas, e.titulo, e.descripcion, e.fecha, c.nombre AS 'categoria' FROM entradas AS e ".
                   "INNER JOIN categorias AS c ON e.categoria_id = c.idCategorias ORDER BY e.fecha desc";

    if($limit){
        $consultaSQL.=" LIMIT 4";
    }

    $ejecucionConsulta = mysqli_query($conexionDB, $consultaSQL);
    
    $resultado = array();

    if(mysqli_num_rows($ejecucionConsulta) >= 1){

        $resultado = $ejecucionConsulta;

        return $resultado;

    } else {
        return $resultado;
    }
}


function datos_ususario($idUsuario, $conexionDB) {

    $consultaSQL = "SELECT nombres, apellidos FROM usuarios WHERE idUsuarios = '".$idUsuario."'";

    $ejecucionSQL = mysqli_query($conexionDB, $consultaSQL);

    $resultado = array();

    if(mysqli_num_rows($ejecucionSQL) == 1){
        $resultado = $ejecucionSQL;
        return $resultado;
    }
    else {
        return $resultado;
    }
}





?>