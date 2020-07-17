<?php
   session_start();
    ob_start();
    require_once '../core/requires.php';
    $m_l=new login_model();
    if(!$m_l->verifSesion()){
        header("Location: ../../index.php"); 
    }
    $model=new trabajadores_model();
    $roles=$model->rol($_SESSION['usuario']);
    $rolName=$roles->getNombre();
    $idRol=$roles->getId();
    /*----------------------------------------------------*/
    include '../models/visitas_model.php';
    include '../entidades/visita.php';
    require_once '../models/clientes_model.php';
    require_once '../entidades/cliente.php';
    $model_visita=new visitas_model();
    $m_c= new clientes_model();
    $mostrar=$_GET['mostrar'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Visitas</title>
<!-- Chrome, Firefox OS y Opera -->
 <meta name="theme-color" content="#e94e02"/>
 <!-- Windows Phone -->
 <meta name="msapplication-navbutton-color" content="#e94e02"/>
 <!-- iOS Safari -->
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<!--favicon-->
<link rel=icon href="../assets/img/agenda.png" sizes="16x16" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="../assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="../assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<script src="../assets/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="../assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../assets/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/custom.js"></script>
<link href="../assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
                                            <li>
                                                  <?php 
                                                  
                                                     switch($idRol){
                                                        case 1:
                                                            echo '<a href="administrador_inicio.php">Inicio</a>';
                                                            break;
                                                        case 2:
                                                            echo '<a href="trabajadores.php?act=1">Inicio</a>';
                                                            break;
                                                        case 3:
                                                            echo '<a href="visitas.php?mostrar=2">Inicio</a>';
                                                    }
                                                    ?>
                                            </li>
                                                <?php 
                                                    if($idRol == 1){ 
                                                 ?>
                                                        <li>
							<a href="#">Trabajadores<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="../forms/trabajadores_insertar.php">Insertar nuevo</a>
								</li>
								<li>
									<a href="encargados.php">Responsables de zona</a>
								</li>
                                                                <li>
                                                                    <a href="trabajadores.php?act=1">Comerciales</a>
								</li>
                                                              
                                                                <li>
                                                                    <a href="trabajadores.php?act=0">Trabajadores no activos</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
                                                <?php
                                                    }
                                                ?>
						<?php 
                                                    if($idRol == 2){ 
                                                 ?>
						<li class="">
                                                    <a href="trabajadores.php?act=1">Comerciales </a>
						</li>
                                                <?php 
                                                    }
                                                ?>
						<li>
                                                    <a href="clientes.php">Clientes </a>
						</li>
						<li>
							<a href="#">Visitas<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								 <?php if($mostrar==0){ ?>
								<li>
                                                                    <a href="">Realizadas</a>
								</li>
								<li>
									<a href="visitas.php?mostrar=1"> Previstas</a>
								</li>
                                                                 <?php } else if($mostrar==1){ ?>
                                                                <li>
                                                                    <a href="visitas.php?mostrar=0">Realizadas</a>
								</li>
								<li>
									<a href=""> Previstas</a>
								</li>
                                                                <?php }else if ($mostrar==2){ ?>
                                                                <li>
                                                                    <a href="visitas.php?mostrar=0">Realizadas</a>
								</li>
								<li>
									<a href="visitas.php?mostrar=1"> Previstas</a>
								</li>
                                                                <?php  } ?>
							</ul>
							<!-- //nav-second-level -->
						</li>
                                              <li>
							<a href="pueblos.php">Pueblos</a>
						</li>
                                                <?php 
                                                    if($idRol == 1){
                                                ?>
						<li>
							<a href="roles.php">Roles</a>
							
						</li>
                                                    <?php } ?>
                                        </ul>
					<div class="clearfix"> </div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
                                    <?php 
                                        switch ($idRol){
                                            case 1:
                                                echo '<a href="administrador_inicio.php" style="padding: 0.9em 2.15em .7em;">';
                                                break;
                                            case 2:
                                                echo '<a href="trabajadores.php?act=1" style="padding: 0.9em 2.15em .7em;">';
                                                break;
                                            case 3:
                                                echo '<a href="visitas.php?mostrar=2" style="padding: 0.9em 2.15em .7em;">';
                                        }
                                    ?>
					
						<h1>Panel de gestión</h1>
                                                 <span> <?php echo $rolName; ?> </span> 
					</a>
				</div>
				<!--//logo-->
				
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									
									<div class="user-name">
                                                                            <p>Usuario: <?php echo $_SESSION['usuario']; ?></p>
                                                                            <span> <?php echo $rolName; ?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
							
                                                            <li> <a href="../views/perfil.php"><i class="fa fa-user"></i> Perfil</a> </li> 
								<li> <a href="../controllers/CerrarSesion.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
                                    <?php
                                     switch($mostrar){
                                                        case 1:
                                                            echo '<h3 class="title1">Visitas previstas</h3>'; 
                                                            break;
                                                        case 2:
                                                            echo '<h3 class="title1">Visitas para hoy: '.date("d-m-Y").'</h3>';
                                                            break;
                                                        case 0:
                                                            echo '<h3 class="title1">Visitas realizadas</h3>';
                                                            break;
                                                    }
                                        			
                                        if($idRol == 3 && $mostrar !=2){?>
                                        
					 <a href="../forms/visitas_insertar.php?mostrar=<?php $mostrar ?>"><button class="button" class="btn btn-default" type="button"><img class="insert" id="accions" src="../assets/img/afegir.png" title="insertar" alt="insertar"/> Insertar nueva</button> </a>
                                      <?php  } ?>
					<div class="table-responsive bs-example widget-shadow">
						<!--<h4>Responsive Table:</h4>-->
                                                <?php 
                                                    
                                                    if($model_visita == null){
                                                        echo 'ERROR: fallo en la conexión';
                                                    }
                                                    switch($mostrar){
                                                        case 1:
                                                            if($idRol == 1){
                                                               $sql= "SELECT * FROM Visitas WHERE estado=1 ORDER BY fecha_prevista"; 
                                                            }else if($idRol == 2){
                                                                $sql="SELECT * FROM Visitas, Trabajadores "
                                                                        . "WHERE Visitas.usuario_trabajador=Trabajadores.usuario AND estado=1 AND Trabajadores.jefe_superior='".$_SESSION['usuario']."'"
                                                                        . "ORDER BY fecha_prevista";
                                                            }else if($idRol==3){
                                                                $sql="SELECT * FROM Visitas WHERE estado=1 AND usuario_trabajador='".$_SESSION['usuario']."'ORDER BY fecha_prevista";
                                                            }
                                                            break;
                                                        case 2:
                                                            $hoy=date('Y-m-d');
                                                            $sql= "SELECT * FROM Visitas WHERE estado=1 AND usuario_trabajador='".$_SESSION['usuario']."' AND fecha_prevista LIKE '".$hoy."%' ORDER BY fecha_prevista";
                                                            break;
                                                        case 0:
                                                            if($idRol == 1){
                                                               $sql= "SELECT * FROM Visitas WHERE estado=0 ORDER BY fecha_real desc"; 
                                                            }else if($idRol == 2){
                                                                $sql="SELECT * FROM Visitas, Trabajadores "
                                                                        . "WHERE Visitas.usuario_trabajador=Trabajadores.usuario AND estado=0 AND Trabajadores.jefe_superior='".$_SESSION['usuario']."'"
                                                                        . "ORDER BY fecha_real desc";
                                                            }else if($idRol==3){
                                                                $sql="SELECT * FROM Visitas WHERE estado=0 AND usuario_trabajador='".$_SESSION['usuario']."'ORDER BY fecha_real desc";
                                                            }
                                                            break;
                                                    }
                                                                                                        
                                                    $total= $model_visita->listar($sql);
                                                    if($total == null){
                                                        echo '<span>No hay visitas</span>';
                                                    }else {
                                                    
                                                    
                                                      foreach ($total as $visita) {  
                                                    ?>
                                                       <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <?php  if($idRol == 3 && $mostrar !=2){ ?>
                                                                            <th class="acciones3" colspan="3">Opciones</th>
                                                                        <?php 
                                                                            }else if($idRol != 3){
                                                                                echo '<th class="accion"></th>';
                                                                            }                                                                            
                                                                        ?>
                                                                        <th>Fecha prevista</th>
                                                                        <?php if($mostrar == 0){ ?>
                                                                        <th>Fecha real</th>
                                                                        <?php } ?>
                                                                        <th>Cliente</th>
                                                                        <?php if($idRol != 3){ ?>
                                                                        <th>Trabajador</th>
                                                                        <?php } ?>
                                                                        <th>Estado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                 <?php
                                                        
                                                            echo '<tr>';
                                                                  echo ' <td><a href="perfil_visita.php?action=ver&id='. $visita->getId() .'"><img id="accions" src="../assets/img/detalls.png" title="ver detalles" alt="ver detalles"/></a></td>';
                                                                    if($idRol == 3 && $mostrar !=2){
                                                                       echo '<td><a href="../forms/visitas_insertar.php?action=editar&id='.$visita->getId() .'&mostrar='.$mostrar.'"><img id="accions" src="../assets/img/editar.png" title="editar" alt="editar"/></a></td>
                                                                            <td><a href="../controllers/visitas_controller.php?action=eliminar&id='.$visita->getId() .'&mostrar='.$mostrar.'"><img id="accions" src="../assets/img/borrar.png" title="eliminar" alt="eliminar"/></a></td>';  
                                                                    }
                                                                    
                                                                   echo '<th scope="row">'.$visita->getFechaPrevista().'</th>';
                                                                     if($mostrar == 0){ 
                                                                        echo '<td>'.$visita->getFechaReal().'</td>';
                                                                     }
                                                                    
                                                                     $cliente= $m_c->getCliente($visita->getCliente());
                                                                     if($cliente == null){
                                                                        echo '<td>'.$visita->getCliente().'</td>';
                                                                     }else{
                                                                         echo '<td>'.$cliente->getNombre().'</td>';
                                                                     }
                                                                     if($idRol != 3){ 
                                                                        echo '<td>'.$visita->getTrabajador().'</td>';
                                                                     }
                                                                     echo '<td>'.$model_visita->mostrarEstado($visita->getEstado()).'</td>';
                                                             echo '</tr>';
                                                             if($mostrar == 0){
                                                                 if($idRol != 3){
                                                                     echo '<tr><th colspan="8">Observaciones</th></tr>';
                                                                     echo '<tr><td colspan="8" class= "obs">'.$visita->getObservaciones().'</td></tr>';
                                                                 }else{
                                                                     echo '<tr><th colspan="7">Observaciones</th></tr>';
                                                                    echo '<tr><td colspan="7" class= "obs">'.$visita->getObservaciones().'</td></tr>'; 
                                                                 }
                                                             }else{
                                                                if($idRol != 3){
                                                                     echo '<tr><th colspan="7">Observaciones</th></tr>';
                                                                     echo '<tr><td colspan="7" class= "obs">'.$visita->getObservaciones().'</td></tr>';
                                                                 }else{
                                                                     echo '<tr><th colspan="6">Observaciones</th></tr>';
                                                                    echo '<tr><td colspan="6" class= "obs">'.$visita->getObservaciones().'</td></tr>'; 
                                                                 }
                                                             }
                                                             
                                                         echo '</tbody>
                                                        </table><br>';
                                                      }
                                                    }
						?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
                    <p>&copy; 2016. Todos los derechos reservados </p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="../assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
                        
		</script>
	<!--scrolling js-->
	<script src="../assets/js/jquery.nicescroll.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="../assets/js/bootstrap.js"> </script>
</body>
</html>



 