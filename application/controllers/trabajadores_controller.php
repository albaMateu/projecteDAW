<?php

/**
 * Controlador de trabajadores
 *
 * @author Alba
 */
session_start();
ob_start(); //per a que funcione el header.
require_once '../core/requires.php';
require_once '../entidades/trabajador.php';

$m_t= new trabajadores_model();

if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $user=$_POST['user']; //del input
        
        switch ($action){
           case 'actualizar':
                $trab= new trabajador();
                $trab->setUsuario($_POST['user']);
                if($m_t->validarEspacios($_POST['nombre']) == false){
                    header("Location: ../forms/trabajadores_insertar.php?error=4");
                }
                $trab->setNombre($_POST['nombre']);
                $trab->setDireccion($_POST['direccion']);
                $trab->setContrato($_POST['contrato']);
                $trab->setTelefono($_POST['telefono']);
                $trab->setEmail($_POST['email']);
                $trab->setSuperior($_POST['jefe']);
                $trab->setActivo(true);
                $trab->setCp($_POST['cp']);
                //si les contrasenyes no son iguals, no edita
                $pwd1=md5($_POST['pwd1']);
                $pwd2=md5($_POST['pwd2']);
                if(strcmp($pwd1,$pwd2)==0){
                     $trab->setContrasenya(md5($_POST['pwd1']));
                     if($_POST['rol']== 1 || $_POST['rol']== 2 || $_POST['rol'] == 3){
                        $trab->setRol($_POST['rol']);
                    }else{
                        header("Location: ../forms/trabajadores_insertar.php?action=editar&user=".$user."&error=3");
                    }
                     $m_t->actualizar($trab);
                }else{
                    header("Location: ../forms/trabajadores_insertar.php?action=editar&user=".$user."&error=1");
                }
                header("Location: ../views/trabajadores.php?act=1");
                break;
            
           case 'insertar':
               if($m_t->existUser($user)){
                   header("Location: ../forms/trabajadores_insertar.php?error=2");
               }else{
                    $trab= new trabajador();
                    $trab->setUsuario($_POST['user']);
                    if($m_t->validarEspacios($_POST['nombre']) == false){
                        header("Location: ../forms/trabajadores_insertar.php?error=4");
                    }
                    $trab->setNombre($_POST['nombre']);
                    $trab->setDireccion($_POST['direccion']);
                    $trab->setContrato($_POST['contrato']);
                    $trab->setTelefono($_POST['telefono']);
                    $trab->setEmail($_POST['email']);
                    $trab->setSuperior($_POST['jefe']);
                    $trab->setActivo(true);
                    $trab->setCp($_POST['cp']);
                    //si les contrasenyes no son iguals, no inserta
                    $pwd1=md5($_POST['pwd1']);
                    $pwd2=md5($_POST['pwd2']);
                   if(strcmp($pwd1,$pwd2)==0){
                         $trab->setContrasenya(md5($_POST['pwd1']));
                         if($_POST['rol']== 1 || $_POST['rol']== 2 || $_POST['rol'] == 3){
                            $trab->setRol($_POST['rol']);
                            $m_t->insertar($trab);
                            header("Location: ../views/trabajadores.php?act=1");
                         }else{
                             header("Location: ../forms/trabajadores_insertar.php?error=3");
                         }
                    }else{
                        header("Location: ../forms/trabajadores_insertar.php?error=1");
                    }
               }
                break;
            case 'eliminar':
                $trab= $m_t->getTrabajador($_GET["user"]); //de la URL
                $m_t->desactivar($trab); //desactiva treballadors
               // $m_t->eliminar($_GET['user']); //elimina treballadors
                 header("Location: ../views/trabajadores.php?act=0"); 
                 break;
           case 'activar':
                $trab= $m_t->getTrabajador($_GET["user"]); //de la URL
                $m_t->activar($trab); 
                header("Location: ../views/trabajadores.php?act=1");
                break;
        }
}


