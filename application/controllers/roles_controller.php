<?php

/**
 * Controlador del roles
 *
 * @author Alba
 */
session_start();
ob_start(); //per a que funcione el header.
require_once '../core/requires.php';
require_once '../models/roles_model.php';
$m_r= new roles_model();

if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $id=$_REQUEST['id'];

        switch ($action){
            case 'actualizar':
                $rol=new rol();
                $rol->setNombre($_POST['nombre']);                 
                if($id > 0){
                    $rol->setId($id);
                    $m_r->actualizar($rol);
                    header("Location: ../views/roles.php");
                } else {
                    $m_r->insertar($rol);
                    header("Location: ../views/roles.php");
                }
                break;
           
            case 'eliminar':
                $m_r->eliminar($_GET["id"]);
                header("Location: ../views/roles.php");
                break;
            default:
                echo $action;
                break;
        }
}



