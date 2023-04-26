<?php require_once 'includes/redirection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Mis Datos</title>
</head>
<body>


    <?php 
        /* Rutas del header */
        $header_index = 'index.php';
        $header_categorias = 'categorias.php?id=';
        $header_sobre_mi = 'sobre_mi.php';
        $header_contacto = 'contactenos.php';
        require_once 'includes/header.php';
    ?>

    <?php 
        require_once 'includes/helpers.php';
        require_once 'includes/conexion.php';
        $idUsuario = $_SESSION['usuario']['idUsuarios'];
        $datos_ususario = datos_ususario($idUsuario,$conexionDB);
    ?>

    <div id="container">
    <!-- SECCION PRINCIPAL -->

        <?php
            /* Rutas del aside */
            $aside_crear_categoria = 'actions/crear_categoria.php';
            $aside_mis_datos = 'mis_datos.php';
            $adide_crear_entradas = 'actions/crear_entradas.php';
            $aside_cerrar_session = 'includes/cerrar.php';
            require_once 'includes/aside.php';
        ?>

        <div id="main">
                <h1>Mis Datos</h1>

                </br>

                <?php if(!empty($datos_ususario)): ?>
                    <form action="actions/actualizar_datos.php" method="post">

                        <?php while($usuario = mysqli_fetch_assoc($datos_ususario)): ?>

                            <label for="nombres">Nombre: </label>
                            <input class="categoria" required name="nombres" type="text" value="<?= $usuario["nombres"] ?>">
                            </br>
                            <label for="apellidos">Apellidos:</label>
                            <input class="categoria" required name="apellidos" type="text" value="<?= $usuario["apellidos"] ?>">

                            <input class="btn" type="submit" value="Actulizar">

                        <?php endwhile; ?>
                    </form>
                <?php endif; ?>

                </br>

                <?php if(isset($_SESSION['ejecucion'])): ?>
                    <h3><?= $_SESSION['ejecucion'] ?></h3>
                <?php endif; ?>
        </div>
    </div>

    <!-- PIE DE PAGINA -->

    <?php require_once 'includes/footer.php'; ?>

</body>
</html>