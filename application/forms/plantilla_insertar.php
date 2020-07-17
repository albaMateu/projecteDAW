<?php
    session_start();
    ob_start();
    require_once '../core/requires.php';
    $model=new trabajadores_model();
    //$model->verifSesion();
    //controlar quin rol pot veure la pàgina
    $roles=$model->rol($_SESSION['usuario']);
   // if($model->verifSesion()== 3){
    //    header("Location: ../views/AccesoRestringido.html");
  //  }
    //nom del rol
    $rolName=$roles->getNombre();
    $idRol=$roles->getId();
    /*----------------------------------------------------*/
    $rol=new rol();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Insertar</title>
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
                                                    <a href="../views/administrador_inicio.php">Inicio</a>
						</li>
						<li>
                                                    <a href="../views/encargados.php">Responsables de zona</a>
							<!--<ul class="nav nav-second-level collapse">
								<li>
									<a href="grids.html">Grid System</a>
								</li>
								<li>
									<a href="media.html">Media Objects</a>
								</li>
							</ul>-->
							<!-- /nav-second-level -->
						</li>
						<li class="">
							<a href="../views/trabajadores.php">Comerciales </a>
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
						<li>
							<a href="../views/clientes.php">Clientes </a>
						</li>
						<li>
							<a href="#">Visitas<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="../views/visitas_realizadas.php">Realizadas</a>
								</li>
								<li>
									<a href="../views/visitas_previstas.php"> Previstas</a>
								</li>
							</ul>
							<!-- //nav-second-level -->
						</li>
						<li>
							<a href="../views/pueblos.php">Pueblos</a>
						</li>
						<li>
							<a href="../views/roles.php">Roles</a>
							<!--<ul class="nav nav-second-level collapse">
								<li>
									<a href="forms.html">Basic Forms <span class="nav-badge-btm">07</span></a>
								</li>
								<li>
									<a href="validation.html">Validation</a>
								</li>
							</ul>-->
							<!-- //nav-second-level -->
						</li>
						<!--<li>
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Pages<span class="nav-badge-btm">02</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="login.html">Login</a>
								</li>
								<li>
									<a href="signup.html">SignUp</a>
								</li>
								<li>
									<a href="blank-page.html">Blank Page</a>
								</li>
							</ul> -->
							<!-- //nav-second-level -->
						<!--</li>
						<li>
							<a href="charts.html" class="chart-nav"><i class="fa fa-bar-chart nav_icon"></i>Charts <span class="nav-badge-btm pull-right">new</span></a>
						</li>-->
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
					<a href="../views/administrador_inicio.php" style="padding: 0.9em 2.15em .7em;">
						<h1>Panel de gestión</h1>
                                                 <span> <?php echo $rol; ?> </span> 
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
                                                                            <span> <?php echo $rol; ?></span>
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
                                    <h3 class="title1">Insertar nuevo rol </h3>
                                    <div class="form-three widget-shadow">
                                        <form class="form-horizontal" action="?action=actualizar" method="post">
                                                    <div class="form-group">
                                                            <label for="focusedinput" class="col-sm-2 control-label">Nombre</label>
                                                            <div class="col-sm-8">
                                                                <input type="hidden" name="id" value="<?php echo $rol->getId(); ?>" /><br/>
                                                                <input type="text" class="form-control1" id="nombre" value="<?php echo $rol->getNombre(); ?>" placeholder="Nombre">
                                                            </div>
<!--                                                            <div class="col-sm-2">
                                                                    <p class="help-block">Your help text!</p>
                                                            </div>-->
                                                    </div>
<!--                                                    <div class="form-group">
                                                            <label for="disabledinput" class="col-sm-2 control-label">Disabled Input</label>
                                                            <div class="col-sm-8">
                                                                    <input disabled="" type="text" class="form-control1" id="disabledinput" placeholder="Disabled Input">
                                                            </div>
                                                    </div>-->
<!--                                                    <div class="form-group">
                                                            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-8">
                                                                    <input type="password" class="form-control1" id="inputPassword" placeholder="Password">
                                                            </div>
                                                    </div>-->
<!--                                                    <div class="form-group">
                                                            <label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
                                                            <div class="col-sm-8">
                                                                    <div class="checkbox-inline1"><label><input type="checkbox"> Unchecked</label></div>
                                                                    <div class="checkbox-inline1"><label><input type="checkbox" checked=""> Checked</label></div>
                                                                    <div class="checkbox-inline1"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
                                                                    <div class="checkbox-inline1"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
                                                            </div>
                                                    </div>-->
<!--                                                    <div class="form-group">
                                                            <label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
                                                            <div class="col-sm-8">
                                                                    <div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
                                                                    <div class="checkbox-inline"><label><input type="checkbox" checked=""> Checked</label></div>
                                                                    <div class="checkbox-inline"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
                                                                    <div class="checkbox-inline"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
                                                            </div>
                                                    </div>-->
                                                    <div class="form-group">
                                                            <label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
                                                            <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                                                                    <option>Lorem ipsum dolor sit amet.</option>
                                                                    <option>Dolore, ab unde modi est!</option>
                                                                    <option>Illum, fuga minus sit eaque.</option>
                                                                    <option>Consequatur ducimus maiores voluptatum minima.</option>
                                                            </select></div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label class="col-sm-2 control-label">Multiple Select</label>
                                                            <div class="col-sm-8">
                                                                    <select multiple="" class="form-control1">
                                                                            <option>Option 1</option>
                                                                            <option>Option 2</option>
                                                                            <option>Option 3</option>
                                                                            <option>Option 4</option>
                                                                            <option>Option 5</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
                                                            <div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="radio" class="col-sm-2 control-label">Radio</label>
                                                            <div class="col-sm-8">
                                                                    <div class="radio block"><label><input type="radio"> Unchecked</label></div>
                                                                    <div class="radio block"><label><input type="radio" checked=""> Checked</label></div>
                                                                    <div class="radio block"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
                                                                    <div class="radio block"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="radio" class="col-sm-2 control-label">Radio Inline</label>
                                                            <div class="col-sm-8">
                                                                    <div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
                                                                    <div class="radio-inline"><label><input type="radio" checked=""> Checked</label></div>
                                                                    <div class="radio-inline"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
                                                                    <div class="radio-inline"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
                                                            <div class="col-sm-8">
                                                                    <input type="text" class="form-control1 input-sm" id="smallinput" placeholder="Small Input">
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
                                                            <div class="col-sm-8">
                                                                    <input type="text" class="form-control1" id="mediuminput" placeholder="Medium Input">
                                                            </div>
                                                    </div>
                                                    <div class="form-group mb-n">
                                                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
                                                            <div class="col-sm-8">
                                                                    <input type="text" class="form-control1 input-lg" id="largeinput" placeholder="Large Input">
                                                            </div>
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
