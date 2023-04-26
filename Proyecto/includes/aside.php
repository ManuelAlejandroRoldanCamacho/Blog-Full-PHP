
<aside id="sidebar">

    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="login_status" class="block-aside">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombres'] ?> </h3>

            <a class="btn" href="<?= $aside_crear_categoria ?>">Crear Nuevas Categorias</a> </br>
            <a class="btn" href="<?= $aside_mis_datos ?>">Mis Datos</a> </br>
            <a class="btn" href="<?= $adide_crear_entradas ?>">Crear Nuevas Entradas</a> </br>
            <a class="btn" href="<?= $aside_cerrar_session ?>">Cerrar Session</a>

            
        </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="block-aside">

            <?php if(isset($_SESSION['login_error'])): ?>
                <div id="login_error">
                    <h3> <?= $_SESSION['login_error'] ?> </h3>
                </div>
            <?php endif; ?>

            <h3>Identificate</h3>

            <form action="login.php" method="post">
                <label class="label" for="usuario">Email</label>
                <input class="input_f1" name="usuario" type="email" />

                <label class="label" for="password">Contraseña</label>
                <input class="input_f1" name="password" type="password" />

                <input class="btn" type="submit" name="btnInicioSesion" value="Iniciar Sesion" />
            </form>
        </div>

        <div id="register" class="block-aside">

            <h3>Registrate</h3>
            <form action="registro.php" method="post">
                <label class="label" for="nombres">Nombres</label>
                <input class="input_f2" required name="nombres" type="text" pattern ="[A-Za-z]+" />

                <label class="label" for="apellidos">Apellidos</label>
                <input class="input_f2" required name="apellidos" type="text" pattern ="[A-Za-z]+" />

                <label class="label" for="email">Email</label>
                <input class="input_f2" required name="email" type="email" />

                <label class="label" for="password">Contraseña</label>
                <input class="input_f2" required name="password" type="password" />

                <input class="btn" type="submit" name="btnRegistrarse" value="Registrarse" />
            </form>
        </div>
     <?php endif; ?>
     
</aside>