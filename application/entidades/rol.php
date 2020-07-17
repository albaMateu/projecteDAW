<?php
/**
 * Classe Rol
 *
 * @author Alba
 */
class rol {
    private $id;
    private $nombre;
    
    function __construct($nombre) {
        $this->id=null;            
        $this->nombre = $nombre;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}
