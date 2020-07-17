<?php

/**
 * Funciones de clientes
 *
 * @author Alba
 */

class clientes_model extends Model{
   //Estableix la connexió.
    function __construct() {
        parent::__construct();   
    }
 
    //llistar els elements de la base de dades
     public function listar ($sql){
        $clientes = array();
        $result = $this->con->query($sql);
        
        if($result){
            while ($obj = $result->fetch_object()){
                $cli= new cliente();
                $cli->setId($obj->id);
                $cli->setNombre($obj->nombre);
                $cli->setNombreComercial($obj->nombre_comercial);
                $cli->setDireccion($obj->direccion);
                $cli->setTelefono($obj->telefono_fijo);
                $cli->setMovil($obj->telefono_movil);
                $cli->setEmail($obj->email);
                $cli->setLatitud($obj->latitud);
                $cli->setLongitud($obj->longitud);
                $cli->setEncargado($obj->encargado);
                $cli->setCargoEncargado($obj->cargo_encargado);
                $cli->setCp($obj->codigo_postal);
                $clientes[]=$cli;
            }
         }else{
             echo 'error lista clientes:'. $this->con->error.'<br>';
         }
        return $clientes;
    }
    
  //retorna un objecte client
    public function getCliente($id){
     $sql="SELECT * FROM Clientes WHERE id=".$id;
    
     $result = $this->con->query($sql);

     if($result){
         while ($obj = $result->fetch_object()){
             $cli= new cliente();
                $cli->setId($obj->id);
                $cli->setNombre($obj->nombre);
                $cli->setNombreComercial($obj->nombre_comercial);
                $cli->setDireccion($obj->direccion);
                $cli->setTelefono($obj->telefono_fijo);
                $cli->setMovil($obj->telefono_movil);
                $cli->setEmail($obj->email);
                $cli->setLatitud($obj->latitud);
                $cli->setLongitud($obj->longitud);
                $cli->setEncargado($obj->encargado);
                $cli->setCargoEncargado($obj->cargo_encargado);
                $cli->setCp($obj->codigo_postal);
         }
      }else{
          return null;
      }
     return $cli;
    }
     
    public function insertar(cliente $cli) {
        $sql = "INSERT INTO `Clientes`"
                . "(`id`, `nombre_comercial`, `nombre`, `direccion`, `telefono_fijo`, `telefono_movil`, `email`, `latitud`, `longitud`, `encargado`, `cargo_encargado`, `codigo_postal`)"
                . " VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        /* Sentencia preparada, etapa 1: preparación */
        if (!($sentencia = $this->con->prepare($sql))) {
             echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
        }

        /* Sentencia preparada, etapa 2: vinculación y ejecución */
        if (!$sentencia->bind_param("issssssddsss",
                $cli->getId(),
                $cli->getNombreComercial(),
                $cli->getNombre(),
                $cli->getDireccion(),
                $cli->getTelefono(),
                $cli->getMovil(),
                $cli->getEmail(),
                $cli->getLatitud(),
                $cli->getLongitud(),
                $cli->getEncargado(),
                $cli->getCargoEncargado(),
                $cli->getCp())
                ) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        $sentencia->close();
     
    }
    
    
    public function actualizar(cliente $cli) {
        $sql = "UPDATE `Clientes` SET "
                . "`id`=?,`nombre_comercial`=?,`nombre`=?,"
                . "`direccion`=?,`telefono_fijo`=?,`telefono_movil`=?,"
                . "`email`=?,`latitud`=?,`longitud`=?,"
                . "`encargado`=?,`cargo_encargado`=?,`codigo_postal`=?"
                . " WHERE id=?";

        if (!($sentencia = $this->con->prepare($sql))) {
               echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
          }

          /* Sentencia preparada, etapa 2: vinculación y ejecución */
           if (!$sentencia->bind_param("issssssddsssi",
                $cli->getId(),
                $cli->getNombreComercial(),
                $cli->getNombre(),
                $cli->getDireccion(),
                $cli->getTelefono(),
                $cli->getMovil(),
                $cli->getEmail(),
                $cli->getLatitud(),
                $cli->getLongitud(),
                $cli->getEncargado(),
                $cli->getCargoEncargado(),
                $cli->getCp(),
                $cli->getId())
                ) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

          if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
          }
         $sentencia->close();
       
    }
    //no s'eliminen clients, soles es desactiven
    
    
    public function eliminar($cp){
        try {
            $sql = "DELETE FROM Clientes WHERE id = ?";
            $stmt = $this->con->prepare($sql);
            //s perque és string el tipus de dada que anem a passar
            $stmt->bind_param("i", $cp);
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }
  
}
 
?>