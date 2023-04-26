<?php 
    require_once "../includes/redirection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Crear Categorias</title>
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
            <h1>Crear Categorias</h1>
            </br>
            <form action="guardar_categoria.php" method="post">
                <label for="categoria">Nombre:</label>
                <input class="categoria" name="categoria" type="text" required pattern="[A-Za-z]+" placeholder="Nombre Categoria">

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





