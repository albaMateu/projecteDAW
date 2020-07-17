<?php

/**
 * Comprova que l'usuari i la contrasenya son correctes i el porta a la pàgina.
 *
 * @author Alba
 */

session_start();
ob_start(); //per a que funcione el header.
require_once '../core/requires.php';
require_once '../models/login_model.php';


if (!isset($_POST['user']) || !isset($_POST['password'])) {
    header("Location: ../../index.php?error=1");
}else{

    $data = [
        'user' => $_POST['user'],
        'password' => md5($_POST['password'])
    ];

    $model_login =new login_model();

    if ($model_login->login($data)) {
         $_SESSION['usuario'] = $data['user'];
         $_SESSION['pwd']= $data['password'];
         $model_login->controlRol($_SESSION['usuario']);

    } else {
       header("Location: ../../index.php?error=1");
    }
}

