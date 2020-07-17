<?php

/**
 * Classe pare dels models. Connexió a la base de dades
 *
 * @author Alba
 */

class Model {
    protected $con = null;

    function __construct() {
        try {
            if (($this->con == null)) {
                $this->con = conectar::conexion();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            exit();
        }
    }

    function getCon() {
        return $this->con;
    }

    function setCon($con) {
        $this->con = $con;
    }
    //valida que els inputs no soles siguen espais
    function validarEspacios($valor) {
        $trim=trim($valor," ");
        $long=strlen($trim);
        if($long == 0){
            return false;
        }
        return true;
    }

}
