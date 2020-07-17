<?php

/**
 * Controlador de visitas
 *
 * @author Alba
 */
session_start();
ob_start(); //per a que funcione el header.
require_once '../core/requires.php';
require_once '../models/visitas_model.php';
require_once '../entidades/visita.php';

$m_v= new visitas_model();

if(isset($_GET['action'])) {
        $mostrar=$_GET['mostrar'];
        $action = $_GET['action'];
        $id=$_POST['id']; //del input
        switch ($action){
           case 'actualizar':
                $visit= new visita();
                $visit->setId($id);
                $visit->setFechaPrevista($_POST['Fprevista']);
                $visit->setFechaReal($_POST['Freal']);
                $visit->setCliente($_POST['cliente']);
                $visit->setTrabajador($_POST['trabajador']);
                if($m_v->validarEspacios($_POST['obs']) == false){
                    header("Location: ../forms/visitas_insertar.php?action=editar&id=".$id."&mostrar=".$mostrar."&error=1");
                    exit();
                }
                $visit->setObservaciones($_POST['obs']); //camp obligat
                if($_POST['vengo'] != null){
                    $visit->setVengo($_POST['vengo']); //camp obligat
                }else{
                    $visit->setVengo("0"); //camp obligat falta automatitzar
                }
                $visit->setVoy($_POST['voy']);
                $visit->setDistancia($_POST['distancia']);
                
                if(isset($_REQUEST['estado'])){
                    $visit->setEstado(false); //finalizada                    
                }else{
                     $visit->setEstado(true); //activa
                    
                }
//                var_dump($visit->getEstado());
//                exit();
                $m_v->actualizar($visit);
               
                header("Location: ../views/visitas.php?mostrar=0");
                break;
            
           case 'insertar':
                $visit= new visita();
                $visit->setId($id);
                $visit->setFechaPrevista($_POST['Fprevista']);
                $visit->setCliente($_POST['cliente']); 
                $visit->setTrabajador($_POST['trabajador']);
                if($_POST['obs'] != null){
                    $visit->setObservaciones($_POST['obs']); //camp obligat
                }else{
                    $visit->setObservaciones(" "); //camp obligat
                }
                if($_POST['vengo'] != null){
                    $visit->setVengo($_POST['vengo']); //camp obligat
                }else{
                    $visit->setVengo(" "); //camp obligat falta automatitzar
                }
                $visit->setEstado(true);
                $m_v->insertar($visit);
                header("Location: ../views/visitas.php?mostrar=1");
                break;
            case 'eliminar':
                $m_v->eliminar($_GET["id"]); //de la URL
                header("Location: ../views/visitas.php?mostrar=".$mostrar);
                break;
        }
}
