<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<link rel=icon href="application/assets/img/agenda.png" sizes="16x16" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="application/assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="application/assets/css/style_login.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="application/assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="application/assets/js/jquery-1.11.1.min.js"></script>
<script src="application/assets/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="application/assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="application/assets/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="application/assets/js/metisMenu.min.js"></script>
<script src="application/assets/js/custom.js"></script>
<link href="application/assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Acceso</h3>
				<div class="widget-shadow">
					<div class="login-body">
                                            <form action="application/controllers/controller_login.php" method="post" >
							<input type="text" class="user" name="user" placeholder="usuario" required>
							<input type="password" name="password" class="lock" placeholder="contraseña" required>
                                                        <?php
                                                            $error=$_GET['error'];
                                                            if($error == 1){
                                                                echo "<span>Usuario o contraseña incorrectos</span>";
                                                            }
                                                        ?>
							<input type="submit" name="Sign In" value="Entrar">
							<div class="forgot-grid">
								<div class="forgot">
									<!--<a href="#">¿Has olvidado tu contraseña?</a>-->
								</div>
								<div class="clearfix"> </div>
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
		<script src="application/assets/js/classie.js"></script>
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
	<script src="application/assets/js/jquery.nicescroll.js"></script>
	<script src="application/assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="application/assets/js/bootstrap.js"> </script>
</body>
</html>