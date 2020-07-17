<?php
/**
 * Funciones de roles
 *
 * @author Alba
 */

class roles_model extends Model{
   //Estableix la connexió.
    function __construct() {
        parent::__construct();   
    }
 
    //llistar els elements de la base de dades
     public function listar ($sql){
        $roles = array();
        $result = $this->con->query($sql);
        
        if($result){
            while ($obj = $result->fetch_object()){
                $rol= new rol();
                $rol->setId($obj->id);
                $rol->setNombre($obj->nombre);
                $roles[]=$rol;
            }
         }else{
             echo 'error lista roles:'. $this->con->connect_error.'<br>';
         }
        return $roles;
    }
    
     
    public function getRol ($id){
        $sql="SELECT * FROM Roles WHERE id=".$id;
        $result = $this->con->query($sql);
        
        if($result){
            while ($obj = $result->fetch_object()){
                $rol= new rol();
                $rol->setId($obj->id);
                $rol->setNombre($obj->nombre);
            }
         }else{
             return null;
         }
        return $rol;
    }
    
    public function insertar(rol $rol) {
        $sql = "INSERT INTO Roles (id, nombre) VALUES (?,?)";
        /* Sentencia preparada, etapa 1: preparación */
        if (!($sentencia = $this->con->prepare($sql))) {
             echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
        }

        /* Sentencia preparada, etapa 2: vinculación y ejecución */
        if (!$sentencia->bind_param("is", $rol->getId(), $rol->getNombre())) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        $sentencia->close();
     
    }
    
    
    public function actualizar(rol $rol) {
        $sql = "UPDATE Roles SET id = ?, nombre = ? WHERE id= ?";

        if (!($sentencia = $this->con->prepare($sql))) {
               echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
          }

          /* Sentencia preparada, etapa 2: vinculación y ejecución */
          if (!$sentencia->bind_param("isi", $rol->getId(), $rol->getNombre(), $rol->getId())) {
              echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
          }

          if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
          }
         $sentencia->close();
       
    }
    
    public function eliminar($id){
        try {
            $sql = "DELETE FROM Roles WHERE id = ?";
            $stmt = $this->con->prepare($sql);
            //s perque és string el tipus de dada que anem a passar
            $stmt->bind_param("i", $id);
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }
    
    
}
?>