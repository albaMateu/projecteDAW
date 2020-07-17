<?php
/**
 * @author Alba
 */
class visita {
    private $id;
    private $fechaPrevista;
    private $fechaReal;
    private $estado;
    private $distancia;
    private $vengo;
    private $voy;
    private $observaciones;
    private $cliente;
    private $trabajador;
    
    //constructor
    function __construct($fechaPrevista, $fechaReal, $estado, $distancia, $vengo, $voy, $observaciones, $cliente, $trabajador) {
        $this->fechaPrevista = $fechaPrevista;
        $this->fechaReal = $fechaReal;
        $this->estado = $estado;
        $this->distancia = $distancia;
        $this->vengo = $vengo;
        $this->voy = $voy;
        $this->observaciones = $observaciones;
        $this->cliente = $cliente;
        $this->trabajador = $trabajador;
    }

    //getters i setters
    
    function getId() {
        return $this->id;
    }

    function getFechaPrevista() {
        return $this->fechaPrevista;
    }

    function getFechaReal() {
        return $this->fechaReal;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDistancia() {
        return $this->distancia;
    }

    function getVengo() {
        return $this->vengo;
    }

    function getVoy() {
        return $this->voy;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFechaPrevista($fechaPrevista) {
        $this->fechaPrevista = $fechaPrevista;
    }

    function setFechaReal($fechaReal) {
        $this->fechaReal = $fechaReal;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    function setVengo($vengo) {
        $this->vengo = $vengo;
    }

    function setVoy($voy) {
        $this->voy = $voy;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    function getCliente() {
        return $this->cliente;
    }

    function getTrabajador() {
        return $this->trabajador;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setTrabajador($trabajador) {
        $this->trabajador = $trabajador;
    }

}