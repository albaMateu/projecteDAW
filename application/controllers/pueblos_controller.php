<?php

/**
 * Controlador de pueblos
 *
 * @author Alba
 */
session_start();
ob_start(); //per a que funcione el header.
//els fitxers que necessitem
require_once '../core/requires.php';
require_once '../models/pueblos_model.php';
require_once '../entidades/pueblo.php';

$m_p= new pueblos_model();

if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $cp=$_POST['cp']; //del input
        
        switch ($action){
           case 'actualizar':
                $pueblo=new pueblo();
                $pueblo->setCodigo_postal($_POST['cp']); //del input
                if($m_p->validarEspacios($_POST['poblacion']) == false){
                    header("Location: ../forms/pueblos_insertar.php?action=editar&id=".$_POST['cp']."&error=1");
                    exit();
                 }
                $pueblo->setPoblacion($_POST['poblacion']); 
                $pueblo->setProvincia($_POST['provincia']);
                $m_p->actualizar($pueblo);
                header("Location: ../views/pueblos.php");
                break;
           case 'insertar':
               $pueblo=new pueblo();
                $long=strlen($cp);
               if($long == 5){
                    $pueblo->setCodigo_postal($_POST['cp']); //del input
                     if($m_p->validarEspacios($_POST['poblacion']) == false){
                       header("Location: ../forms/pueblos_insertar.php?error=1");
                       exit();
                    }
                    $pueblo->setPoblacion($_POST['poblacion']); 
                    $pueblo->setProvincia($_POST['provincia']);
                    $m_p->insertar($pueblo);
                    header("Location: ../views/pueblos.php");
                }else{
                    header("Location: ../forms/pueblos_insertar.php?error=2");
                }
               break;
           
           case 'eliminar':
                $m_p->eliminar($_GET["id"]); //de la URL
                header("Location: ../views/pueblos.php");
                break; 
        }
}


