<?php
//
///**
// * Comprova que la sessió està oberta i que la clau és vàlida per a mostrar la pàgina.
// * i retorna el id_rol per a després comprovar si pot o no vore la pagina que sol·licita
// *
// * @author Alba
// */
//
////el porta a una pàgina o altra segons el rol de l'usuari 
//function controlRol($user,$con) {
//   
//        //buscar usuari per saber a quin rol pertany
//        $sql = "SELECT id_rol from Trabajadores where usuario='".$user."';";
//        $result=mysqli_query($con,$sql);
//        //per a agafar les dades de la consulta linea a linea.
//        // En este cas no fem while perque sabem que soles és una linea
//        $datos=  mysqli_fetch_array($result);
//       
//        //comprovar que soles tenim 1 linea (1 usuari)
//        if(mysqli_num_rows($result)=="1"){
//            //comprova que la clau de sessió coincideix amb ulguna contrasenya d'algun usuari
//            //la clau de sessió és la contrasenya en md5
//            switch($datos['id_rol']){
//                //entra en una pàgina o altra segons el seu rol
//                case 1:
//                    header("Location: ../views/administrador_inicio.php");
//                    break;
//                case 2:
//                    //header("Location: ../views/encargado.php");
//                    echo 'encargado';
//                    break;
//                case 3:
//                    //header("Location: ../views/trabajador.php");
//                    echo 'trabajador';
//                    break;
//                default:
//                    header("Location: ../../index.php");
//            }
//        }
//    //}
//    mysqli_close($con);
//}
//
//function linkRol() {                                                 
//    switch($model->rol($user)->getId()){
//        case 1:
//            header("Location: administrador_inicio.php");
//            break;
//        case 2:
//            header("Location: encargados.php");
//            break;
//        case 3:
//            header("Location: trabajadores.php");
//            break;
//        default :
//            header("Location: AccesoRestringido.html");
//    }
//}