<?php
/**
 * @author Alba
 */
class cliente {
    private $id;
    private $nombreComercial;
    private $nombre;
    private $direccion;
    private $telefono;
    private $movil;
    private $email;
    private $latitud;
    private $longitud;
    private $encargado;
    private $cargoEncargado;
    private $cp;
    
    //constructor
    function __construct($nombreComercial, $nombre, $direccion, $telefono,$movil, $email, $latitud, $longitud, $encargado, $cargoEncargado, $cp) {
        $this->nombreComercial = $nombreComercial;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->movil = $movil;
        $this->email = $email;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->encargado = $encargado;
        $this->cargoEncargado = $cargoEncargado;
        $this->cp = $cp;
    }
    
    //getters i setters
    
    function getId() {
        return $this->id;
    }

    function getNombreComercial() {
        return $this->nombreComercial;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getLatitud() {
        return $this->latitud;
    }

    function getLongitud() {
        return $this->longitud;
    }

    function getEncargado() {
        return $this->encargado;
    }

    function getCargoEncargado() {
        return $this->cargoEncargado;
    }

    function getCp() {
        return $this->cp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombreComercial($nombreComercial) {
        $this->nombreComercial = $nombreComercial;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    function setEncargado($encargado) {
        $this->encargado = $encargado;
    }

    function setCargoEncargado($cargoEncargado) {
        $this->cargoEncargado = $cargoEncargado;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }
    function getMovil() {
        return $this->movil;
    }

    function setMovil($movil) {
        $this->movil = $movil;
    }

}
