<?php

/**
 * funcions per al login
 *
 * @author Alba
 */
class login_model extends Model{
    //Estableix la connexió.
    function __construct() {
        parent::__construct();   
    }
    //el porta a una pàgina o altra segons el rol de l'usuari 
    public function controlRol($user) {
            $con=$this->con;
            //buscar usuari per saber a quin rol pertany
            $sql = "SELECT id_rol FROM Trabajadores WHERE usuario='".$user."'";
            $result= $con->query($sql);
           // $result=mysqli_query($con,$sql);
            //per a agafar les dades de la consulta linea a linea.
            // En este cas no fem while perque sabem que soles és una linea
           // $datos=  mysqli_fetch_array($result);
            $datos=$result->fetch_array();
            //comprovar que soles tenim 1 linea (1 usuari)
            if($result->num_rows == "1"){
                //comprova que la clau de sessió coincideix amb ulguna contrasenya d'algun usuari
                //la clau de sessió és la contrasenya en md5
                switch($datos['id_rol']){
                    //entra en una pàgina o altra segons el seu rol
                    case 1:
                        header("Location: ../views/administrador_inicio.php");
                        break;
                    case 2:
                         header("Location: ../views/trabajadores.php?act=1");
                        break;
                    case 3:
                        header("Location: ../views/visitas.php?mostrar=2");
                        break;
                    default:
                       header("Location: ../../index.php");
                }
            }
        mysqli_close($con);
    }
        
    //comprova si la sessió és correcta
    public function verifSesion() {
        
        //guardar la clau de sessió activa
        $sesion=$_SESSION['pwd'];
        if(isset($sesion)){
            //buscar usuari en la contrasenya=clau de sessió
            $sql = "SELECT * FROM Trabajadores WHERE activo=1 AND usuario='".$_SESSION['usuario']."' AND contrasenya='".$sesion."'";
            $result=$this->con->query($sql);
            
            //per a agafar les dades de la consulta linea a linea.
            // En este cas no fem while perque sabem que soles és una linea
             $datos=$result->fetch_array();

            //comprovar que soles tenim 1 linea (1 usuari)
            if($result->num_rows == "1"){
                //comprova que la clau de sessió coincideix amb ulguna contrasenya d'algun usuari
                if($datos['contrasenya'] != $sesion){
                   return false;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }else{
           return false;
        }
    }  
    
    public function login($data) {
         $sql = "SELECT * FROM Trabajadores"
                 ." WHERE usuario='" . $data['user'] . "'"
                 ." AND contrasenya = '" .$data['password']."'";
         
        $row=$this->con->query($sql);
        //si existeix donarà 1 i retorna true.
        $result=$row->num_rows;                
        return $result;
    }
 
}
