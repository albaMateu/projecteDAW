<?php

/**
 * Funciones de pueblos
 *
 * @author Alba
 */

class pueblos_model extends Model{
   //Estableix la connexió.
    function __construct() {
        parent::__construct();   
    }
 
    //llistar els elements de la base de dades
     public function listar ($sql){
        $pueblos = array();
        $result = $this->con->query($sql);
        
        if($result){
            while ($obj = $result->fetch_object()){
                $pueb= new pueblo();
                $pueb->setCodigo_postal($obj->codigo_postal);
                $pueb->setPoblacion($obj->poblacion);
                $pueb->setProvincia($obj->provincia);
                $pueblos[]=$pueb;
            }
         }else{
             echo  $this->con->error.'<br>';
         }
        return $pueblos;
    }
    
    //retorna el nom de la població passant-li un codi postal
    public function getPoblacion($cp) {
        $pueblo=null;
        $sql="SELECT poblacion FROM Pueblos WHERE codigo_postal=".$cp."";
        $result=$this->con->query($sql);
        if($result){
            $poblacion=$result->fetch_array();
            $pueblo=$poblacion['poblacion'];
        }
        return $pueblo;
    }
    
    //retorna un objecte poble
    public function getPueblo ($cp){
     $sql="SELECT * FROM Pueblos WHERE codigo_postal=".$cp;
     $result = $this->con->query($sql);

     if($result){
         while ($obj = $result->fetch_object()){
             $pueblo=new pueblo();
             $pueblo->setCodigo_postal($obj->codigo_postal);
             $pueblo->setPoblacion($obj->poblacion);
             $pueblo->setProvincia($obj->provincia);
         }
      }else{
          return null;
      }
     return $pueblo;
    }
     
    public function insertar(pueblo $pueblo) {
        $sql = "INSERT INTO Pueblos (codigo_postal, poblacion, provincia) VALUES (?,?,?)";
        /* Sentencia preparada, etapa 1: preparación */
        if (!($sentencia = $this->con->prepare($sql))) {
             echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
        }

        /* Sentencia preparada, etapa 2: vinculación y ejecución */
        if (!$sentencia->bind_param("sss",
                $pueblo->getCodigo_postal(), 
                $pueblo->getPoblacion(), 
                $pueblo->getProvincia())) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        $sentencia->close();
     
    }
    
    
    public function actualizar(pueblo $pueb) {
        $sql = "UPDATE Pueblos SET codigo_postal = ?, poblacion = ?, provincia = ? WHERE codigo_postal= ?";

        if (!($sentencia = $this->con->prepare($sql))) {
               echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
          }

          /* Sentencia preparada, etapa 2: vinculación y ejecución */
          if (!$sentencia->bind_param("ssss",
                  $pueb->getCodigo_postal(), 
                  $pueb->getPoblacion(), 
                  $pueb->getProvincia(), 
                  $pueb->getCodigo_postal())) {
              echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
          }

          if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
          }
         $sentencia->close();
       
    }
    
    public function eliminar($cp){
        try {
            $sql = "DELETE FROM Pueblos WHERE codigo_postal = ?";
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