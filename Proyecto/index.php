<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Inicio</title>
</head>
<body>

    <?php
        require_once 'includes/helpers.php';
        require_once 'includes/conexion.php';
        $listado_entradas = listar_entradas($conexionDB, 4); /* El 4 es el limite de entradas a mostrar */
    ?>

    <?php 
        /* Rutas del header */
        $header_index = 'index.php';
        $header_categorias = 'categorias.php?id=';
        $header_sobre_mi = 'sobre_mi.php';
        $header_contacto = 'contactenos.php';
        require_once 'includes/header.php'; 
    ?>

    <!-- CONTENEDOR PRINCIPAL -->
    <div id="container">

        <!-- BARRA LATERAL -->
        
        <?php 
            /* Rutas del aside */
            $aside_crear_categoria = 'actions/crear_categoria.php';
            $aside_mis_datos = 'mis_datos.php';
            $adide_crear_entradas = 'actions/crear_entradas.php';
            $aside_cerrar_session = 'includes/cerrar.php';
            require_once 'includes/aside.php'; 
        ?>

        <!-- SECCION PRINCIPAL -->
        <div id="main">
            <h1>Ultimas Entradas</h1>

            <?php if(!empty($listado_entradas)): ?>

                <?php while($entradas = mysqli_fetch_assoc($listado_entradas)): ?>
                    <article class="inputs">
                        <a href="entradas.php?idEntrada=<?= $entradas['idEntradas'] ?>">
                            <h2><?= $entradas['titulo'] ?></h2>
                            <span><?= $entradas['categoria']." || ".$entradas['fecha'] ?></span>
                            <p><?= substr($entradas['descripcion'], 0, 250)."..."  ?></p>
                        </a>
                    </article>
                <?php endwhile; ?>

            <?php endif; ?>

            <div id="ver-todas"><a href="total_entradas.php">ver todas</a></div>
        </div>

        <div class="clear-fix"></div>
        
    </div>

    <!-- PIE DE PAGINA -->

    <?php require_once 'includes/footer.php'; ?>

</body>
</html>