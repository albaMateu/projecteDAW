<?php

/**
 * Controlador de clientes
 *
 * @author Alba
 */
session_start();
ob_start(); //per a que funcione el header.
require_once '../core/requires.php';
require_once '../models/clientes_model.php';
require_once '../entidades/cliente.php';

$m_c= new clientes_model();

if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $id=$_POST['id']; //del input
        
        switch ($action){
           case 'actualizar':
                $cliente=new cliente();
                $cliente->setId($id); //del input
                if($m_c->validarEspacios($_POST['nombre']) == false){
                    header("Location: ../forms/clientes_insertar.php?error=1");
                }
                $cliente->setNombre($_POST['nombre']);
                $cliente->setNombreComercial($_POST['Ncomercial']); 
                $cliente->setDireccion($_POST['direccion']);
                $cliente->setTelefono($_POST['telefono']);
                $cliente->setMovil($_POST['movil']);
                $cliente->setEmail($_POST['email']);
                $cliente->setLatitud($_POST['latitud']);
                $cliente->setLongitud($_POST['longitud']);
                $cliente->setEncargado($_POST['encargado']);
                $cliente->setCargoEncargado($_POST['cargo_encargado']);
                $cliente->setCp($_POST['cp']);
                $m_c->actualizar($cliente);
                header("Location: ../views/clientes.php");
                break;
            
           case 'insertar':
                $cliente=new cliente();
                $cliente->setId($id); //del input
                 if($m_c->validarEspacios($_POST['nombre'])== false){
                    header("Location: ../forms/clientes_insertar.php?error=1");
                }
                $cliente->setNombre($_POST['nombre']);
                $cliente->setNombreComercial($_POST['Ncomercial']); 
                $cliente->setDireccion($_POST['direccion']);
                $cliente->setTelefono($_POST['telefono']);
                $cliente->setMovil($_POST['movil']);
                $cliente->setEmail($_POST['email']);
                $cliente->setLatitud($_POST['latitud']);
                $cliente->setLongitud($_POST['longitud']);
                $cliente->setEncargado($_POST['encargado']);
                $cliente->setCargoEncargado($_POST['cargo_encargado']);
                $cliente->setCp($_POST['cp']);
                $m_c->insertar($cliente);
                header("Location: ../views/clientes.php");
                 break;
           
            case 'eliminar':
                $m_c->eliminar($_GET["id"]); //de la URL
                header("Location: ../views/clientes.php");
                break;
            
        }
}
