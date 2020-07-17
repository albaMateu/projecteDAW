<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['contrasenya']);
    session_destroy();
    header("Location: ../../index.php");
?>

