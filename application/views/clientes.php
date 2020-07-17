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
    include '../models/clientes_model.php';
    include '../entidades/cliente.php';
    $m_cli=new clientes_model();
    
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Clientes</title>
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
                                                    <a href="">Clientes </a>
						</li>
						<li>
							<a href="#">Visitas<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
                                                                    <a href="visitas.php?mostrar=0">Realizadas</a>
								</li>
								<li>
                                                                    <a href="visitas.php?mostrar=1"> Previstas</a>
								</li>
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
					<h3 class="title1">Clientes</h3>
                                        <a href="../forms/clientes_insertar.php"><button class="button" class="btn btn-default" type="button"><img class="insert" id="accions" src="../assets/img/afegir.png" title="insertar" alt="insertar"/> Insertar nuevo</button> </a>
					
					<div class="table-responsive bs-example widget-shadow">
						<!--<h4>Responsive Table:</h4>-->
                                                <?php 
                                                    if($m_cli == null){
                                                        echo 'Error en la conexión modelo cliente';
                                                    }
                                                    switch ($idRol){
                                                        case 1:
                                                            //tots
                                                            $sql= "SELECT * FROM Clientes nombre <> ' ' ORDER BY nombre";
                                                            break;
                                                        case 2:
                                                            //soles els dels seus treballadors
                                                            $sql="SELECT * FROM Clientes WHERE nombre <> ' ' AND id IN (
                                                                SELECT DISTINCT id_cliente FROM Visitas WHERE usuario_trabajador IN (
                                                                SELECT DISTINCT usuario FROM Trabajadores WHERE jefe_superior ='".$_SESSION['usuario']."' "
                                                                . "ORDER BY nombre))";
                                                            break;
                                                        case 3:
                                                            //soles els seus
                                                            $sql= "SELECT * FROM Clientes WHERE nombre <> ' ' AND id IN (
                                                                SELECT DISTINCT id_cliente FROM Visitas WHERE usuario_trabajador='".$_SESSION['usuario']."' "
                                                                . "ORDER BY nombre)";
                                                            break;
                                                    }
                                                   
                                                    $total=$m_cli->listar($sql);
                                                ?>
						<table class="table table-bordered"> 
                                                    <thead> 
                                                        <tr> 
                                                            <th class="acciones3" colspan="3">Opciones</th>
                                                            <th>Nombre</th>
                                                            <th>Teléfono</th>
                                                            <th>Móvil</th>
                                                            <th>E-mail</th>
                                                        </tr> 
                                                    </thead> 
                                                    <tbody> 
                                                        <?php
                                                            foreach ($total as $cli) {
                                                                echo '<tr>
                                                                        <td><a href="perfil_cliente.php?action=ver&id='. $cli->getId() .'"><img id="accions" src="../assets/img/detalls.png" title="ver detalles" alt="ver detalles"/></a></td>
                                                                        <td><a href="../forms/clientes_insertar.php?action=editar&id='. $cli->getId() .'"><img id="accions" src="../assets/img/editar.png" title="editar" alt="editar"/></a></td>
                                                                        <td><a href="../controllers/clientes_controller.php?action=eliminar&id='. $cli->getId() .'"><img id="accions" src="../assets/img/borrar.png" title="eliminar" alt="eliminar"/></a></td>
                                                                        <th scope="row">'.$cli->getNombreComercial().'</th>
                                                                        <td>'.$cli->getTelefono().'</td>
                                                                        <td>'.$cli->getMovil().'</td>
                                                                        <td>'.$cli->getEmail().'</td>
                                                                      </tr>';
                                                             }
                                                        ?>
                                                    </tbody> 
                                                </table> 
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