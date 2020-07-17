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
    require '../models/clientes_model.php';
    require_once '../entidades/cliente.php';
    require_once '../models/pueblos_model.php';
    require_once '../entidades/pueblo.php';
    $m_c=new clientes_model();
    $cli_obj = new cliente();
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $id=$_REQUEST['id']; //de la URL
        
        if($action=='editar'){
           $cli_obj = $m_c->getCliente($id);
        }
    }
    
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Insertar</title>
<!-- Chrome, Firefox OS y Opera -->
 <meta name="theme-color" content="#4F52BA"/>
 <!-- Windows Phone -->
 <meta name="msapplication-navbutton-color" content="#4F52BA"/>
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
                                                            echo '<a href="../views/administrador_inicio.php">Inicio</a>';
                                                            break;
                                                        case 2:
                                                            echo '<a href="../views/trabajadores.php?act=1">Inicio</a>';
                                                            break;
                                                        case 3:
                                                            echo '<a href="../views/visitas.php?mostrar=2">Inicio</a>';
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
									<a href="trabajadores_insertar.php">Insertar nuevo</a>
								</li>
								<li>
                                                                    <a href="../views/encargados.php">Responsables de zona</a>
								</li>
                                                                <li>
                                                                    <a href="../views/trabajadores.php?act=1">Comerciales</a>
								</li>
                                                                <li>
									<a href="../views/trabajadores.php?act=0">Trabajadores no activos</a>
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
                                                    <a href="../views/trabajadores.php?act=1">Comerciales </a>
							<!--<ul class="nav nav-second-level collapse">
								<li>
									<a href="general.html">General<span class="nav-badge-btm">08</span></a>
								</li>
								<li>
									<a href="typography.html">Typography</a>
								</li>
							</ul>-->
							<!-- /nav-second-level -->
						</li>
                                                <?php 
                                                    }
                                                ?>
						<li>
                                                    <a href="../views/clientes.php">Clientes </a>
						</li>
						<li>
							<a href="#">Visitas<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
                                                                    <a href="../views/visitas.php?mostrar=0">Realizadas</a>
								</li>
								<li>
                                                                    <a href="../views/visitas.php?mostrar=1"> Previstas</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>
                                              <li>
                                                  <a href="../views/pueblos.php">Pueblos</a>
						</li>
                                                <?php 
                                                    if($idRol == 1){
                                                ?>
						<li>
                                                    <a href="../views/roles.php">Roles</a>
							
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
                                                echo '<a href="../views/administrador_inicio.php" style="padding: 0.9em 2.15em .7em;">';
                                                break;
                                            case 2:
                                                echo '<a href="../views/trabajadores.php?act=1" style="padding: 0.9em 2.15em .7em;">';
                                                break;
                                            case 3:
                                                echo '<a href="../views/visitas.php?mostrar=2" style="padding: 0.9em 2.15em .7em;">';
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
				<div class="row">
                                      <?php
                                        if($action == "editar"){
                                            echo ' <h3 class="title1">Editar cliente </h3>';
                                            echo ' <div class="form-three widget-shadow">
                                                     <form class="form-horizontal" action="../controllers/clientes_controller.php?action=actualizar" method="post">';
                                        }else{
                                            echo ' <h3 class="title1">Insertar nuevo cliente </h3>';
                                            echo ' <div class="form-three widget-shadow">
                                                     <form class="form-horizontal" action="../controllers/clientes_controller.php?action=insertar" method="post">';
                                        }
                                    ?>         
                                                    <div class="form-group">
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control1" name="id" id="nombre" value="<?php echo $cli_obj->getId(); ?>" >
                                                            </div>
                                                     </div>
                                                    
                                                    <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Nombre o Razón social*</label>
                                                            <div class="col-sm-8">
                                                                <input type="text"  class="form-control1" name="nombre" id="nombre" value="<?php echo $cli_obj->getNombre(); ?>" placeholder="nombre o razón social" required>
                                                                 <?php
                                                                    if(isset($_GET['error'])){
                                                                        if($_GET['error'] == 1){
                                                                            echo '<span>Rellena el campo</span>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </div>
                                                     </div>
                                                     <div class="form-group">
                                                            <label for="focusedinput"  class="col-sm-2 control-label">Nombre comercial</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="Ncomercial" id="nombre" value="<?php echo $cli_obj->getNombreComercial(); ?>" placeholder="nombre comercial">
                                                            </div>
                                                     </div>
                                                    <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Dirección</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="direccion" id="nombre" value="<?php echo $cli_obj->getDireccion(); ?>" placeholder="dirección">
                                                            </div>
                                                     </div>
                                                      <div class="form-group">
                                                            <label for="selector1" class="col-sm-2 control-label">Código postal*</label>
                                                            <div class="col-sm-5">
                                                                <select name="cp" id="selector1" class="form-control1" required>
                                                                   
                                                                    <?php
                                                                        $sql2= "SELECT * FROM Pueblos WHERE poblacion <> ' ' ORDER BY poblacion";
                                                                        $m_p= new pueblos_model();
                                                                        $pueblos=$m_p->listar($sql2);
                                                                        echo '<option value="'.$cli_obj->getCp().'" selected="select">'.$cli_obj->getCp().'</option>';
                                                                        foreach ($pueblos as $pue){
                                                                          echo '<option value="'.$pue->getCodigo_postal().'">'.$pue->getCodigo_postal().
                                                                                  ' - '.$pue->getPoblacion().'('.$pue->getProvincia().')</option>';
                                                                        }
                                                                    ?>
                                                                   
                                                                </select>
                                                            </div>
                                                            <a  href="pueblos_insertar.php" ><button type=button class="button" class="col-sm-offset-0"> Insertar pueblo </button></a>
                                                    </div>
                                    
                                   
					
                                                    <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Teléfono fijo</label>
                                                            <div class="col-sm-8">
                                                                <input type="tel" class="form-control1" name="telefono" id="nombre" value="<?php echo $cli_obj->getTelefono(); ?>" placeholder="teléfono fijo">
                                                            </div>
                                                     </div>
                                                     <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Teléfono móvil</label>
                                                            <div class="col-sm-8">
                                                                <input type="tel" class="form-control1" name="movil" id="nombre" value="<?php echo $cli_obj->getMovil(); ?>" placeholder="teléfono móvil">
                                                            </div>
                                                     </div>
                                                     <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">E-mail</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control1" name="email" id="nombre" value="<?php echo $cli_obj->getEmail(); ?>" placeholder="ejemplo@ejemplo.com">
                                                            </div>
                                                     </div>
                                                     <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Latitud</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="latitud" id="nombre" value="<?php echo $cli_obj->getLatitud(); ?>" placeholder="Latitud">
                                                            </div>
                                                     </div>
                                                     <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Longitud</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="longitud" id="nombre" value="<?php echo $cli_obj->getLongitud(); ?>" placeholder="Longitud">
                                                            </div>
                                                     </div>
                                                     <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Encargado</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="encargado" id="nombre" value="<?php echo $cli_obj->getEncargado(); ?>" placeholder="Nombre encargado">
                                                            </div>
                                                     </div>
                                                       <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Cargo del encargado</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="cargo_encargado" id="nombre" value="<?php echo $cli_obj->getCargoEncargado(); ?>" placeholder="Nombre comercial">
                                                            </div>
                                                     </div>
                                                     <span>*Campos obligatorios</span>
                                                    <div class="col-sm-offset-2"> 
                                                        <button type="submit" class="btn btn-default">Guardar</button> 
                                                    </div> 
                                            </form>
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

