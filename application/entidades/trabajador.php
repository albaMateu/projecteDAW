<?php
/**
 * @author Alba
 */

class trabajador {
    private $usuario;
    private $contrasenya;
    private $nombre;
    private $direccion;
    private $contrato;
    private $telefono;
    private $email;
    private $activo;
    private $rol;
    private $superior;
    private $cp;
    
    function __construct( $usuario, $contrasenya, $nombre, $direccion, $contrato, $telefono, $email,$activo, $rol, $superior, $cp) {
        $this->usuario = $usuario;
        $this->contrasenya = $contrasenya;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->contrato = $contrato;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->activo=$activo;
        $this->rol = $rol;
        $this->superior = $superior;
        $this->cp = $cp;
    }
    
    //getters i setters
    function getUsuario() {
        return $this->usuario;
    }

    function getContrasenya() {
        return $this->contrasenya;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getContrato() {
        return $this->contrato;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getRol() {
        return $this->rol;
    }

    function getSuperior() {
        return $this->superior;
    }

    function getCp() {
        return $this->cp;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasenya($contrasenya) {
        $this->contrasenya = $contrasenya;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setContrato($contrato) {
        $this->contrato = $contrato;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setSuperior($superior) {
        $this->superior = $superior;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }
    function getActivo() {
        return $this->activo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }
}
