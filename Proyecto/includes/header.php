<?php 

require_once 'conexion.php'; 
require_once 'helpers.php';

$lista_categorias = listar_categorias($conexionDB);

?>

    <!-- CABEZERA -->

    <header id="header">

        <div id="logo">
            <a href="index.php">
                Blog de VideoJuegos
            </a>
        </div>

        <!-- MENU -->
        <nav id="nav">
            <ul>
                <li> <a href="<?= $header_index ?>">Inicio</a> </li>
                
                <? if(empty($lista_categorias)): ?>

                    <?php while($categorias = mysqli_fetch_assoc($lista_categorias)): ?>
                        <li> <a href="<?php $header_categorias.=$categorias['idCategorias'] ?>"><?= $categorias['nombre'] ?></a> </li>
                    <?php endwhile; ?>
            
                <? endif; ?>

                <li> <a href="<?= $header_sobre_mi ?>">Sobre Mi</a> </li>
                <li> <a href="<?= $header_contacto ?>">Contacto</a> </li>

            </ul>
        </nav>

        <div class="clear-fix"></div>

    </header>
