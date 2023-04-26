
<?php 

/* verifica exista la sesion y en caso contrario redirecicona al index */

if(!isset($_SESSION)){
    session_start();
} else {
    if(!isset($_SESSION['usuarios'])){
        header("Location: ../index.php");
    }    
}

?>