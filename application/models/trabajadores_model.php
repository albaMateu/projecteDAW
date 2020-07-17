<?php

/**
 * Funcions de treballadors
 *
 * @author Alba
 */

class trabajadores_model extends Model {
 
    //Estableix la connexió.
    function __construct() {
        parent::__construct();   
    }
        //retorna un array amb la informació del rol de l'usuari (id i nom del rol)
    public function rol($user){
        $sql= "SELECT id_rol FROM Trabajadores WHERE usuario='".$user."'";
        if($result = $this->con->query($sql)){
            $idRol= $result-> fetch_array();
        }else{
            echo 'ERROR: '.$this->con->error;
            exit();
        }
        $sql2= "SELECT * FROM Roles WHERE id='".$idRol['id_rol']."'";
        if($result2 = $this->con->query($sql2)){
            while($obj=$result2->fetch_object()){
                $rol= new rol();
                $rol->setId($obj->id);
                $rol->setNombre($obj->nombre);
            }
        }
        return $rol;
    }

    //llistar els elements de la base de dades
     public function listar ($sql){
         
        $trabajadores = array();
        if($result = $this->con->query($sql)){
            while ($obj = $result->fetch_object()){
                $trab= new trabajador();
                $trab->setUsuario($obj->usuario);
                $trab->setContrasenya($obj->contrasenya);
                $trab->setNombre($obj->nombre);
                $trab->setDireccion($obj->direccion);
                $trab->setContrato($obj->contrato);
                $trab->setTelefono($obj->telefono);
                $trab->setEmail($obj->email);
                $trab->setRol($obj->id_rol);
                $trab->setSuperior($obj->jefe_superior);
                $trab->setActivo($obj->activo);
                $trab->setCp($obj->codigo_postal);
                $trabajadores[]=$trab;
            }
         }else{
             echo 'error:'.$this->con->error.'<br>';
         }
        return $trabajadores;
    }
    public function existUser($user){
        $sql="SELECT * FROM `Trabajadores` WHERE usuario='".$user."'";
     
        $result = $this->con->query($sql);
        if($result->num_rows == 1){
            return true;
        }
        return false;
    }
  
     //retorna un objecte treballador
    public function getTrabajador($user){
     $sql="SELECT * FROM `Trabajadores` WHERE usuario='".$user."'";
     
     $result = $this->con->query($sql);

     if($result){
         while ($obj = $result->fetch_object()){
                $trab= new trabajador();
                $trab->setUsuario($obj->usuario);
                $trab->setContrasenya($obj->contrasenya);
                $trab->setNombre($obj->nombre);
                $trab->setDireccion($obj->direccion);
                $trab->setContrato($obj->contrato);
                $trab->setTelefono($obj->telefono);
                $trab->setEmail($obj->email);
                $trab->setRol($obj->id_rol);
                $trab->setSuperior($obj->jefe_superior);
                $trab->setActivo($obj->activo);
                $trab->setCp($obj->codigo_postal);
         }
      }else{
          return null;
      }
     return $trab;
    }
    
     public function insertar(trabajador $trab) {
        $sql = "INSERT INTO `Trabajadores`"
                . "(`usuario`, `contrasenya`, `nombre`, `direccion`, `contrato`, `telefono`, `email`, `id_rol`, `jefe_superior`, `activo`, `codigo_postal`)"
                . " VALUES (?,?,?,?,?,?,?,?,?,".true.",?)";
        /* Sentencia preparada, etapa 1: preparación */
        if (!($sentencia = $this->con->prepare($sql))) {
             echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
        }

        /* Sentencia preparada, etapa 2: vinculación y ejecución */
        if (!$sentencia->bind_param("sssssssiss",
                $trab->getUsuario(),
                $trab->getContrasenya(),
                $trab->getNombre(),
                $trab->getDireccion(),
                $trab->getContrato(),
                $trab->getTelefono(),
                $trab->getEmail(),
                $trab->getRol(),
                $trab->getSuperior(),
                $trab->getCp())
                ) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        $sentencia->close();
     
    }
    
    
    public function actualizar(trabajador $trab) {
        $sql = "UPDATE `Trabajadores` SET "
                . "`usuario`=?,"
                . "`contrasenya`=?,"
                . "`nombre`=?,"
                . "`direccion`=?,"
                . "`contrato`=?,"
                . "`telefono`=?,"
                . "`email`=?,"
                . "`id_rol`=?,"
                . "`jefe_superior`=?,"
                . "`activo`= ".true.","
                . "`codigo_postal`=?"
                . " WHERE usuario=?";

        if (!($sentencia = $this->con->prepare($sql))) {
               echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
          }

          /* Sentencia preparada, etapa 2: vinculación y ejecución */
           if (!$sentencia->bind_param("sssssssisss",
                $trab->getUsuario(),
                $trab->getContrasenya(),
                $trab->getNombre(),
                $trab->getDireccion(),
                $trab->getContrato(),
                $trab->getTelefono(),
                $trab->getEmail(),
                $trab->getRol(),
                $trab->getSuperior(),
                $trab->getCp(),
                $trab->getUsuario())
                ) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

          if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
          }
         $sentencia->close();
       
    }
    
    //no s'eliminen treballadors, soles es desactiven
    public function desactivar(trabajador $trab){
        try {
            $trab->setActivo(false);
            $sql = "UPDATE `Trabajadores` SET `activo`=false WHERE usuario=?";
            $stmt = $this->con->prepare($sql);
            //i perque és integer el tipus de dada que anem a passar
            $stmt->bind_param("s",$trab->getUsuario());
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }
     
    public function activar(trabajador $trab){
        try {
            $trab->setActivo(true);
            $sql = "UPDATE `Trabajadores` SET `activo`=true WHERE usuario=?";
            $stmt = $this->con->prepare($sql);
            //i perque és integer el tipus de dada que anem a passar
            $stmt->bind_param("s",$trab->getUsuario());
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }
    
    //elimina treballador (no s'utilitza)
    public function eliminar($user){
        try {
            $sql = "DELETE FROM Trabajadores WHERE usuario = ?";
            $stmt = $this->con->prepare($sql);
            //s perque és string el tipus de dada que anem a passar
            $stmt->bind_param("s", $user);
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }

}
