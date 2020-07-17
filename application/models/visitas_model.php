<?php

/**
 * Funcions de visites
 *
 * @author Alba
 */
//INFORMACIÓ hoy= date('d/m/Y H:i:s');

class visitas_model extends Model {
   
    //Estableix la connexió.
    function __construct() {
        parent::__construct();
    }
     
            
    public function mostrarEstado($estado){
        if($estado){
            return 'Pendiente';
        }else{
            return 'Finalizada';
        }
    }

    //llistar els elements de la base de dades
     public function listar ($sql){
        
        $visitas = array();   
        
        if($result = $this->con->query($sql)){
 
            while ($obj = $result->fetch_object()){
                $visit= new visita();
                $visit->setId($obj->id);
                $visit->setFechaPrevista($obj->fecha_prevista);
                $visit->setFechaReal($obj->fecha_real);
                $visit->setCliente($obj->id_cliente);
                $visit->setTrabajador($obj->usuario_trabajador);
                $visit->setObservaciones($obj->observaciones);
                $visit->setVengo($obj->cliente_vengo);
                $visit->setVoy($obj->cliente_voy);
                $visit->setDistancia($obj->distancia);
                $visit->setEstado($obj->estado);           
                $visitas[]=$visit;
            }
         }else{
             echo 'error (visita model listar):'. $this->con->error.'<br>';
         }
        return $visitas;
    }
    
    //retorna un objecte visita
    public function getVisita($id){
     $sql="SELECT * FROM Visitas WHERE id=".$id;
     $result = $this->con->query($sql);

     if($result){
         while ($obj = $result->fetch_object()){
             $visit= new visita();
                 $visit->setId($obj->id);
                $visit->setFechaPrevista($obj->fecha_prevista);
                $visit->setFechaReal($obj->fecha_real);
                $visit->setCliente($obj->id_cliente);
                $visit->setTrabajador($obj->usuario_trabajador);
                $visit->setObservaciones($obj->observaciones);
                $visit->setVengo($obj->cliente_vengo);
                $visit->setVoy($obj->cliente_voy);
                $visit->setDistancia($obj->distancia);
                $visit->setEstado($obj->estado);
         }
      }else{
          return null;
      }
     return $visit;
    }
     
    public function insertar(visita $visita) {
        $sql = "INSERT INTO `Visitas`"
                . "(`id`, `usuario_trabajador`, `fecha_prevista`, `fecha_real`, `estado`, `distancia`, `cliente_vengo`, `cliente_voy`, `observaciones`, `id_cliente`)"
                . " VALUES (?,?,?,?,true,?,?,?,?,?)";
        /* Sentencia preparada, etapa 1: preparación */
        if (!($sentencia = $this->con->prepare($sql))) {
             echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
        }

        /* Sentencia preparada, etapa 2: vinculación y ejecución */
        if (!$sentencia->bind_param("isssssssi",
                $visita->getId(),
                $visita->getTrabajador(),
                $visita->getFechaPrevista(),
                $visita->getFechaReal(),
                $visita->getDistancia(),
                $visita->getVengo(),
                $visita->getVoy(),
                $visita->getObservaciones(),
                $visita->getCliente())
                ) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        $sentencia->close();
     
    }
    
    
    public function actualizar(visita $visita) {
        if($visita->getEstado()){
              $estado=1;
          }else{
              $estado=0;
          }
        $sql = "UPDATE `Visitas` SET "
                . "`id`=?,"
                . "`usuario_trabajador`=?,"
                . "`fecha_prevista`=?,"
                . "`fecha_real`=?,"
                . "`estado`=".$estado.","
                . "`distancia`=?,"
                . "`cliente_vengo`=?,"
                . "`cliente_voy`=?,"
                . "`observaciones`=?,"
                . "`id_cliente`=?"
                . " WHERE id=?";

        if (!($sentencia = $this->con->prepare($sql))) {
               echo "Falló la preparación: (" . $this->con->errno . ") " . $this->con->error;
          }
          
          /* Sentencia preparada, etapa 2: vinculación y ejecución */
           if (!$sentencia->bind_param("isssssssii",
                $visita->getId(),
                $visita->getTrabajador(),
                $visita->getFechaPrevista(),
                $visita->getFechaReal(),
                $visita->getDistancia(),
                $visita->getVengo(),
                $visita->getVoy(),
                $visita->getObservaciones(),
                $visita->getCliente(),
                $visita->getId())
                ){
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

          if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
          }
         $sentencia->close();
    }
    
    //no s'eliminen clients, soles es desactiven
    public function eliminar($id){
        try {
            $sql = "DELETE FROM Visitas WHERE id = ?";
            $stmt = $this->con->prepare($sql);
            //i perque és integer el tipus de dada que anem a passar
            $stmt->bind_param("i", $id);
            $stmt->execute();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }


}