<?php
    session_start();
    ob_start();
    //detecta els errors i els mostra
//     ini_set('display_errors', 1);
//     ini_set('display_startup_errors', 1);
//     error_reporting(E_ALL); 
     // ----
    require_once '../core/requires.php';
    $m_l=new login_model();
    if(!$m_l->verifSesion()){
        header("Location: ../../index.php"); 
    }
    $model=new trabajadores_model();
    $roles=$model->rol($_SESSION['usuario']);
    $rolName=$roles->getNombre();
    $idRol=$roles->getId();
    if($idRol != 3){
       header("Location: ../views/AccesoRestringido.html");
    }
    /*----------------------------------------------------*/
    require '../models/visitas_model.php';
    require '../models/pueblos_model.php';
    require '../models/clientes_model.php';
    require_once '../entidades/visita.php';
    require_once '../entidades/cliente.php';
    require_once '../entidades/pueblo.php';
    $m_v=new visitas_model();
    $m_c= new clientes_model();
    $m_p= new pueblos_model();
    $mostrar=$_GET['mostrar'];
    $visita_obj = new visita();
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        $id=$_REQUEST['id']; //de la URL
    }  
    if($action=='editar'){
       $visita_obj = $m_v->getVisita($id);
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
<!--Calendar -->
<script type="text/javascript" src="../assets/datetimepicker/jquery.simple-dtpicker.js"></script>
<link type="text/css" href="../assets/datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet" />
<!--//Calendar-->
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
                                      if($action != "editar"){ ?>
                                            <h3 class="title1">Insertar nueva visita </h3>
                                            <div class="form-three widget-shadow">
                                                     <form class="form-horizontal" action="../controllers/visitas_controller.php?action=insertar&mostrar=<?php $mostrar ?>" method="post">
                                                         
                                                    <div class="form-group">
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control1" name="id" id="nombre" value="" >
                                                            </div>
                                                     </div>
                                                    
                                                    <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Fecha y hora prevista*</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="Fprevista" id="nombre" value="<?php echo $visita_obj->getFechaPrevista(); ?>" readonly required>
                                                                <div class="datapicker"></div>
                                                                <script>
                                                                    $(function(){
                                                                        $('*[name=Fprevista]').appendDtpicker({
                                                                                "inline": false, //amaga el calendari
                                                                                "dateFormat": "YYYY-MM-DD hh:mm:00", 
                                                                                "closeOnSelected": true,
                                                                                "futureOnly": true,
                                                                                "todayButton": true,
                                                                                "firstDayOfWeek": 1,
                                                                                "minuteInterval": 15,
                                                                                "locale": "es"
                                                                                
                                                                        });
                                                                    });
                                                                
                                                                </script>
                                                            </div>
                                                     </div>
                                                    <div class="form-group">
                                                            <label for="selector1" class="col-sm-2 control-label">Cliente*</label>
                                                            <div class="col-sm-8">
                                                                <select name="cliente" id="selector1" class="form-control1" required>
                                                                    <?php
                                                                        $sql2= "SELECT * FROM Clientes WHERE nombre <> ' ' ORDER BY nombre";
                                                                        $clientes=$m_c->listar($sql2);
                                                                        foreach ($clientes as $cli){
                                                                            $poble=$m_p->getPueblo($cli->getCp());
                                                                            if($poble == null){
                                                                                echo '<option value="'.$cli->getId().'">'. $cli->getNombre().')</option>'; 
                                                                            }else{
                                                                                echo '<option value="'.$cli->getId().'">'. $cli->getNombre() .' - '.
                                                                                    $poble->getPoblacion() .' ('. $poble->getProvincia() .')</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                   
                                                                </select>
                                                            </div>
                                                    </div>
                                                         
                                                    <div class="form-group">
                                                     
                                                      <div class="col-sm-8">
                                                          <input type="hidden" class="form-control1" name="trabajador" id="nombre" value="<?php echo $_SESSION['usuario']; ?>" required>
                                                      </div>
                                                   </div>
                                                         <div class="form-group">
                                                            <label for="txtarea1" class="col-sm-2 control-label">Observaciones</label>
                                                            <div class="col-sm-8">
                                                                <textarea name="obs" id="txtarea1" cols="50" rows="10" class="form-control1">      
                                                                    <?php 
                                                                        echo $visita_obj->getObservaciones(); 
                                                                    ?>
                                                                </textarea>
                                                            </div>
                                                    </div>
                                                    <span>* Campos obligatorios</span> 
                                                    <div class="col-sm-offset-2"> 
                                                        <button type="submit" class="btn btn-default">Guardar</button> 
                                                    </div> 
                                                            
                                       <?php }else{ ?>
                                             <h3 class="title1">Editar visita </h3>
                                             <div class="form-three widget-shadow">
                                                     <form class="form-horizontal" action="../controllers/visitas_controller.php?action=actualizar&mostrar=<?php $mostrar ?>" method="post">
                                                                                
                                                    <div class="form-group">
                                                            <div class="col-sm-8">
                                                                <input type="hidden" class="form-control1" name="id" id="nombre" value="<?php echo $visita_obj->getId(); ?>" >
                                                            </div>
                                                     </div>
                                                    
                                                     <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Fecha y hora prevista*</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="Fprevista" id="nombre" value="<?php echo $visita_obj->getFechaPrevista(); ?>" readonly required>
                                                                <div class="datapicker"></div>
                                                                <script>
                                                                    $(function(){
                                                                        $('*[name=Fprevista]').appendDtpicker({
                                                                                "inline": false, //amaga el calendari
                                                                                "dateFormat": "YYYY-MM-DD hh:mm:00", 
                                                                                "current": "<?php echo $visita_obj->getFechaPrevista(); ?>",
                                                                                "closeOnSelected": true,
                                                                                "futureOnly": true,
                                                                                "todayButton": true,
                                                                                "firstDayOfWeek": 1,
                                                                                "minuteInterval": 15,
                                                                                "locale": "es",
                                                                                "autodateOnStart": false
                                                                                
                                                                        });
                                                                    });
                                                                
                                                                </script>
                                                            </div>
                                                           
                                                     </div>
                                                   <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Fecha y hora real de la visita</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control1" name="Freal" id="nombre" value="
                                                                    <?php 
                                                                    if($visita_obj->getFechaReal() != null){
                                                                        echo $visita_obj->getFechaReal(); 
                                                                    }
                                                                    ?>" 
                                                                    >
                                                                <div class="datapicker"></div>
                                                                <script>
                                                                    $(function(){
                                                                        $('*[name=Freal]').appendDtpicker({
                                                                                "inline": false, //amaga el calendari
                                                                                "dateFormat": "YYYY-MM-DD hh:mm:00", 
                                                                                "closeOnSelected": true,
                                                                                "futureOnly": true,
                                                                                "todayButton": true,
                                                                                "firstDayOfWeek": 1,
                                                                                "minuteInterval": 15,
                                                                                "locale": "es",
                                                                                "autodateOnStart": false
                                                                                
                                                                        });
                                                                    });
                                                                
                                                                </script>
                                                            </div>
                                                            <div class="checkbox-inline1">
                                                                <?php if($visita_obj->getEstado()){ ?>
                                                                    <label><input type="checkbox" id="estado" name="estado" value="true"> Finalizada</label>
                                                                <?php }else{ ?>
                                                                    <label><input type="checkbox" id="estado" name="estado" value="true" checked> Finalizada</label>
                                                                <?php } ?>
                                                            </div>
                                                     </div>
                                                          
                                                         <div class="form-group">
                                                            <label for="selector1" class="col-sm-2 control-label">De dónde vengo*</label>
                                                            <div class="col-sm-8">
                                                                <select name="vengo" id="selector1" class="form-control1" required>
                                                                   
                                                                    <?php
                                                                     $sql2= "SELECT * FROM Clientes WHERE nombre <> ' ' ORDER BY nombre";
                                                                        $clientes=$m_c->listar($sql2);
                                                                        echo '<option value="'.$visita_obj->getVengo().'" selected="select">'.$visita_obj->getVengo().'</option>';
                                                                        
                                                                        foreach ($clientes as $cli){
                                                                            $poble=$m_p->getPueblo($cli->getCp());
                                                                            if($poble == null){
                                                                                echo '<option value="'.$cli->getNombre().'">'. $cli->getNombre().')</option>'; 
                                                                            }else{
                                                                                echo '<option value="'.$cli->getNombre().'">'. $cli->getNombre() .' - '.
                                                                                    $poble->getPoblacion() .' ('. $poble->getProvincia() .')</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                   
                                                                </select>
                                                            </div>
                                                    </div>
                                                          <div class="form-group">
                                                            <label for="selector1" class="col-sm-2 control-label">A dónde voy*</label>
                                                            <div class="col-sm-8">
                                                                <select name="voy" id="selector1" class="form-control1" required>
                                                                   
                                                                    <?php
                                                                        echo '<option value="'.$visita_obj->getVoy().'" selected="select">'.$visita_obj->getVoy().'</option>';
                                                                        
                                                                        foreach ($clientes as $cli){
                                                                            $poble=$m_p->getPueblo($cli->getCp());
                                                                            if($poble == null){
                                                                                echo '<option value="'.$cli->getNombre().'">'. $cli->getNombre().')</option>'; 
                                                                            }else{
                                                                                echo '<option value="'.$cli->getNombre().'">'. $cli->getNombre() .' - '.
                                                                                    $poble->getPoblacion() .' ('. $poble->getProvincia() .')</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                   
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Distancia hasta el próximo cliente</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="distancia" id="nombre" value="<?php echo $visita_obj->getDistancia(); ?>" placeholder="distancia en km">
                                                            </div>
                                                     </div>
                                                      <div class="form-group">
                                                            <label for="selector1" class="col-sm-2 control-label">Cliente*</label>
                                                            <div class="col-sm-8">
                                                                <select name="cliente" id="selector1" class="form-control1" required>
                                                                    <?php
                                                                    $cliente= $m_c->getCliente($visita_obj->getCliente());
                                                                      echo '<option value="'.$cliente->getId().'">'.$cliente->getNombre().'</option>';
                                                                      foreach ($clientes as $cli){
                                                                            $poble=$m_p->getPueblo($cli->getCp());
                                                                            if($poble == null){
                                                                                echo '<option value="'.$cli->getId().'">'. $cli->getNombre().')</option>'; 
                                                                            }else{
                                                                                echo '<option value="'.$cli->getId().'">'. $cli->getNombre() .' - '.
                                                                                    $poble->getPoblacion() .' ('. $poble->getProvincia() .')</option>';
                                                                            }
                                                                        }
                                                                       
                                                                    ?>
                                                                   
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="txtarea1" class="col-sm-2 control-label">Observaciones*</label>
                                                            <div class="col-sm-8">
                                                                <textarea name="obs" id="txtarea1" cols="50" rows="10" class="form-control1" required>
                                                                    <?php 
                                                                        echo $visita_obj->getObservaciones(); 
                                                                    ?>
                                                                </textarea>
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
                                                            <label for="focusedinput" class="col-sm-2 control-label">Trabajador*</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1" name="trabajador" id="nombre" value="<?php echo $visita_obj->getTrabajador(); ?>" required>
                                                            </div>
                                                     </div>
                                                         <span>* Campos obligatorios</span> 
                                                    <div class="col-sm-offset-2"> 
                                                        <button type="submit" id="guardar"  onclick="ventana()" class="btn btn-default">Guardar</button> 
                                                    </div> 
                                                    <?php  }?> 
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
                        var visita=document.getElementById('guardar'){
                            
                        }
                        function ventana(){
                            if( $('.estado').prop('checked') ) {
                                alert('Visita cerrada');
                            }else{
                               alert('La visita sigua abierta'); 
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

