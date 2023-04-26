<?php 
    require_once "../includes/redirection.php";
    require_once "../includes/helpers.php";
    require_once "../includes/conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Crear Entradas</title>
</head>
<body>

    <?php 
    /* Rutas del header */
        $header_index = '../index.php';
        $header_categorias = '../categorias.php?id=';
        $header_sobre_mi = '../sobre_mi.php';
        $header_contacto = '../contactenos.php';
        require_once "../includes/header.php"; 
    ?>
    
    <div id="container">

        <?php 
            /* Rutas del aside */
            $aside_crear_categoria = 'crear_categoria.php';
            $aside_mis_datos = '../mis_datos.php';
            $adide_crear_entradas = 'crear_entradas.php';
            $aside_cerrar_session = '../includes/cerrar.php';
            require_once "../includes/aside.php"; 
        ?>

        <div id="main">
            <h1>Crear Entradas</h1>
            <form action="guardar_entradas.php" method="post">
            </br>

                <label for="titulo">Titulo Entrada:</label>
                <input class="categoria" name="titulo" type="text" required placeholder="Titulo">
                </br>

                <label for="descripcion">Descripcion:</label>
                <input class="categoria descripcion" name="descripcion" type="text" required  placeholder="Descipcion">
                </br>

                <label for="titulo">Categoria:</label>

                <?php $listado_categorias = listar_categorias($conexionDB) ?>

                <select name="categoria" id="listaCategoria">
                    <?php while($select_categorias = mysqli_fetch_assoc($listado_categorias)): ?>
                            <option value="<?= $select_categorias['idCategorias'] ?>"><?= $select_categorias['nombre'] ?></option>
                    <?php endwhile; ?>
                </select>

                <input class="btn" type="submit" value="Crear">

            </form>

            <?php if(isset($_SESSION['ejecucion'])): ?>
                <div>
                    </br>
                    <h3> <?= $_SESSION['ejecucion'] ?> </h3>
                </div>
            <?php endif; ?>
        </div>

        <div class="clear-fix"></div>
    </div>
    

    <?php require_once "../includes/footer.php"; ?>

</body>
</html>

