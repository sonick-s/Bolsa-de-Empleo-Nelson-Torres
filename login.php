<!doctype html>
<html lang="es_ES">
<?php 
include 'constants/settings.php'; 
include 'constants/check-login.php';
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>EmpleaTec - Iniciar Sesión</title>
	
	<meta name="description" content="Online Job Management / Job Portal" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Bwire Jobs" />
    <meta property="og:description" content="Online Job Management / Job Portal" />

	<link rel="shortcut icon" href="images/ico/favicon.png">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">

	<link href="css/style.css" rel="stylesheet">
	
 <script type="text/javascript">

   function update(str)
   {

	if(document.getElementById('mymail').value == "")
   {
	alert("Please Ingresa tu email");

    }else{
		  document.getElementById("data").innerHTML = "Please wait...";
      var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }	

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","app/reset-pw.php?opt="+str, true);
      xmlhttp.send();
}

  }
  
   function reset_text()
   {  
   document.getElementById('mymail').value = "";
   document.getElementById("data").innerHTML = "";
   }

</script>
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">


	<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="./"><img src="images/LogoIntGris.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="./"  style="text-transform: uppercase;">Inicio</a>
								
							</li>
							
							<li>
								<a href="job-list.php"  style="text-transform: uppercase;">Vacantes</a>

							</li>
							
							<li>
								<a href="employers.php"  style="text-transform: uppercase;">Empresas</a>
							</li>
							
							<li>
								<a href="employees.php"  style="text-transform: uppercase;">Personas</a>
							</li>
							
							<li>
								<a href="contact.php"  style="text-transform: uppercase;">Contacto</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
						<?php
						if ($user_online == true) {
						print '
						    <li><a href="logout.php">Cerrar Sesión</a></li>
							<li><a href="'.$myrole.'">Perfil</a></li>';
						}else{
						print '
							<li><a href="login.php">Ingresar</a></li>
							<li><a data-toggle="modal" href="#registerModal">Registrate</a></li>';						
						}
						
						?>

						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
			<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Regístrate</h4>
				</div>
				
				<div class="modal-body">
				
					<div class="row gap-20">
					
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Employer" class="btn btn-facebook btn-block mb-5-xs">Registro Empresas</a>
						</div>
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Employee" class="btn btn-facebook btn-block mb-5-xs">Registro Personas</a>
						</div>

					</div>
				
				</div>
				
				<div class="modal-footer text-center">
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				</div>
				
			</div>

			
		</header>


		<div class="main-wrapper">


			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list">
						<li><a href="./">Inicio</a></li>
						<li><span>Ingresa a tu cuenta</span></li>
					</ol>
					
				</div>
				
			</div>


			<div class="login-container-wrapper">	
	
				<div class="container">
				
					<div class="row">
					
						<div class="col-md-10 col-md-offset-1">
						
							<div class="row">

								<div class="col-sm-6 col-sm-offset-3">
                                <?php
								include 'constants/check_reply.php';	
								?>
                                <form name="frm" action="app/auth.php" method="POST" autocomplete="off">
                                <div class="login-box-wrapper">
							
                                <div class="modal-header">
                                <h4 class="modal-title text-center" style="color: white; text-transform: uppercase;">Ingresa a tu cuenta</h4>
                                </div>

                                <div class="modal-body">
																
                                <div class="row gap-20">

												
                                <div class="col-sm-12 col-md-12">

									<div class="form-group"> 

									<label style="color: white;">Correo Electrónico</label>
									<input class="form-control" placeholder="Ingresa tu Correo Electrónico" name="email" required type="text"> 
									</div>
												
                                 </div>
								 
								 <div class="col-sm-12 col-md-12">
    <div class="form-group"> 
        <label style="color: white;" >Contraseña</label>
        <input class="form-control" placeholder="Ingresa tu contraseña" name="password" required type="password" id="password"> 
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="showPassword">
        <label class="form-check-label" for="showPassword" style="color: white;">Mostrar contraseña</label>
    </div>
</div>

<script>
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordField = document.getElementById('password');
        if (this.checked) {
            passwordField.type = 'text'; // Muestra la contraseña
        } else {
            passwordField.type = 'password'; // Oculta la contraseña
        }
    });
</script>



						
					          	<div class="col-sm-12 col-md-12">
							    <div class="login-box-link-action">
								<a data-toggle="modal" onclick = "reset_text()" href="#forgotPasswordModal">¿Olvido contraseña?</a> 
							    </div>
						      </div>	

											
												
												
</div>

</div>

<div class="modal-footer text-center">
<button type="submit" class="btn btn-primary">Iniciar Sesión</button>
</div>
										
</div>
</form>

							  			<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Restablece tu contraseña</h4>
				</div>

				<div class="modal-body">
					<div class="row gap-20">
						
						<div class="col-sm-12 col-md-12">
							<p class="mb-20">Ingresa Correo Electrónico asociado a tu cuenta, le enviaremos un correro con el enlace para restablecer su contraseña</p>
						</div>
						
						<div class="col-sm-12 col-md-12">
				
							<div class="form-group"> 

								<label>Correo Electrónico</label>
								<input id="mymail" autocomplete="off" name="email" class="form-control" placeholder="Ingresa tu Correo Electrónico" type="email" required> 
							</div>
						
						</div>


						
						<div class="col-sm-12 col-md-12">
							<div class="login-box-box-action">
							    Regresar a <a data-dismiss="modal">Ingresar</a>
								<p id="data"></p>
							</div>
							
						</div>
						
					</div>
				</div>
				
				<div class="modal-footer text-center">
					<button  onclick="update(mymail.value)" type="submit" class="btn btn-primary">Restaurar</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				</div>
		
			</div>
									
								</div>
							
							</div>
							
						</div>
						
					</div>
					
				</div>
			
			</div>
			
			<?php include 'footer.php'; ?>
			
		</div>


	</div>
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>

</html>
