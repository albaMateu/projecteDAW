<?php
/*session_start();
require_once '../core/conectar.php';
$usuario = $_POST['user'];
$pass = $_POST['password'];

if(empty($usuario) || empty($pass)){
header("Location: ../../index.php?error=1");
exit();
}
$conexion= new conectar();
$con= $conexion->conexion();
if(mysqli_connect_errno($con)){
    echo 'Error en la conexión'.  mysqli_connect_error();
}else{

    $sql = "SELECT contrasenya from Trabajadores where usuario='".$usuario."';";
    $row=mysqli_query($con,$sql);

    //per a agafar les dades de la consulta linea a linea.
    // En este cas no fem while perque sabem que soles és una linea
    $datos=  mysqli_fetch_array($row);

    //comprovar que soles tenim 1 linea (1 usuari)
    if(mysqli_num_rows($row)=="1"){
        //si és correcte comprova que la contrasenya estiga bé
        if($datos['contrasenya'] == $pass){
            //entra en la web en la sessio de l'usuari
            $_SESSION['usuario'] = $usuario;
            header("Location: ../views/contenido.php");
        }else{
            //sinó el porta al login
            header("Location: ../../index.php?error=1");
            exit();
        }
    }else{
        //si no hi ha usuari, el porta al login
        header("Location: ../../index.php?error=1");
        exit();
    }
}*/

?>


