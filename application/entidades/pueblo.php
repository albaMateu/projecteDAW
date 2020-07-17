<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pueblo
 *
 * @author Alba
 */
class pueblo {
    private $codigo_postal;
    private $poblacion;
    private $provincia;
    
    //constructor
    function __construct($codigo_postal, $poblacion, $provincia) {
        $this->codigo_postal = $codigo_postal;
        $this->poblacion = $poblacion;
        $this->provincia = $provincia;
    }
    
    //getters i setters
    function getCodigo_postal() {
        return $this->codigo_postal;
    }

    function getPoblacion() {
        return $this->poblacion;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function setCodigo_postal($codigo_postal) {
        $this->codigo_postal = $codigo_postal;
    }

    function setPoblacion($poblacion) {
        $this->poblacion = $poblacion;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }



    
}
