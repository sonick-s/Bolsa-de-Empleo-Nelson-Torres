<!doctype html>
<html lang="es_ES">
<?php 
require '../constants/settings.php'; 
require 'constants/check-login.php';

if ($user_online == "true") {
if ($myrole == "employee") {
}else{
header("location:../");		
}
}else{
header("location:../");	
}

if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 = 0;
$page = 1;
}else{
$page1 = ($page*5)-5;
}					
}else{
$page1 = 0;
$page = 1;	
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>TRABYRAC - Estudios</title>
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

	<link rel="shortcut icon" href="../images/ico/favicon.png">


	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/component.css" rel="stylesheet">
	

	<link rel="stylesheet" href="../icons/linearicons/style.css">
	<link rel="stylesheet" href="../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../icons/flaticon-ventures/flaticon-ventures.css">


	<link href="../css/style.css" rel="stylesheet">

	
</head>
  <style>
  
    .autofit2 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  
  </style>

<body class="not-transparent-header">

	<div class="container-wrapper">

		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="../"><img src="../images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="../">Inicio</a>
								
							</li>
							
							<li>
								<a href="../job-list.php">Vacantes</a>

							</li>
							
							<li>
								<a href="../employers.php">Empresas</a>
							</li>
							
							<li>
								<a href="../employees.php">Personas</a>
							</li>
							
							<li>
								<a href="../contact.php">Contacto</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
							<li><a href="../logout.php">Cerrar Sesión</a></li>
							<li><a href="./">Perfil</a></li>
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
		</header>

		<div class="main-wrapper">

			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="../">Vacantes</a></li>
						<li><span>Estudios</span></li>
					</ol>
					
				</div>
				
			</div>
		
			
			<div class="admin-container-wrapper">

				<div class="container">
				
					<div class="GridLex-gap-15-wrappper">
					
						<div class="GridLex-grid-noGutter-equalHeight">
						
							<div class="GridLex-col-3_sm-4_xs-12">
							
								<div class="admin-sidebar">
										
									<div class="admin-user-item">
									<div class="image">	
									
										<?php 
										if ($myavatar == null) {
										print '<center><img class="img-circle autofit2" src="../images/default.jpg" title="'.$myfname.'" alt="image"  /></center>';
										}else{
										echo '<center><img class="img-circle autofit2" alt="image" title="'.$myfname.'"  src="data:image/jpeg;base64,'.base64_encode($myavatar).'"/></center>';	
										}
										?>
										</div>
										<br>
										
										
										<h4><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></h4>
										<p class="user-role"><?php echo "$mytitle"; ?></p>
										
									</div>
									
									<div class="admin-user-action text-center">
									
										<a target="_blank" href="my_cv" class="btn btn-primary btn-sm btn-inverse">VER MI CV</a>
										
									</div>
									
									<ul class="admin-user-menu clearfix">
										<li>
											<a href="./"><i class="fa fa-user"></i> Perfil</a>
										</li>
										<li class="">
										<a href="change-password.php"><i class="fa fa-key"></i> Cambiar Contraseña</a>
										</li>
										<li  >
											<a href="qualifications.php"><i class="fa fa-trophy"></i> Certificaciones</a>
										</li>
										<li>
											<a href="language.php"><i class="fa fa-language"></i> Dominio del Idioma</a>
										</li>
										<li>
											<a href="training.php"><i class="fa fa-gears"></i> Cursos y Talleres</a>
										</li>
										<li>
											<a href="referees.php"><i class="fa fa-users"></i> Referencias</a>
										</li>
										<li class="active">
											<a href="academic.php"><i class="fa fa-graduation-cap"></i> Estudios</a>
										</li>
										<li>
											<a href="experience.php"><i class="fa fa-briefcase"></i> Experiencia Laboral</a>
										</li>
										<li>
											<a href="attachments.php"><i class="fa fa-folder-open"></i> Otros Documentos Adjuntos</a>
										</li>
										<li>
											<a href="../logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
										</li>
									</ul>
									
								</div>

							</div>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">

									<div class="admin-section-title">
									
										<h2>Estudios Realizados</h2>
					
										
									</div>
									
									<div class="resume-list-wrapper">
									<?php require 'constants/check_reply.php'; ?>
									<?php
									require '../constants/db_config.php';
									
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_academic_qualification WHERE member_no = '$myid' ORDER BY id LIMIT $page1,5");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach($result as $row)
                                    {
									 $ccountry = $row['country'];
									 $institution = $row['institution'];
									 $course = $row['course'];
									 $timeframe = $row['timeframe'];
									 $course_id = $row['id'];
									 $level = $row['level'];
									 
									 ?>
									 									<div class="resume-list-item">
										
											<div class="row">
											
												<div class="col-sm-12 col-md-10">
												
													<div class="content">
													
														<a  target="_blank" href="view-certificate-c.php?id=<?php echo $row['id']; ?>" >

															<div class="image">
															<?php 
										                    if ($myavatar == null) {
									                    	print '<center><img src="../images/default.jpg" title="'.$myfname.'" alt="image" width="100" height="100" /></center>';
										                    }else{
										                    echo '<center><img alt="image" title="'.$myfname.'" width="100" height="100" src="data:image/jpeg;base64,'.base64_encode($myavatar).'"/></center>';	
										                    }
										                      ?>
															</div>
															
															<h4><?php echo $row['course']; ?></h4>
															
															<div class="row">
																<div class="col-sm-12 col-md-9">
																	<i class="fa fa-graduation-cap text-primary mr-5"></i><strong class="mr-10"><?php echo $row['institution']; ?></strong> <i class="fa fa-map-marker text-primary mr-5"></i> <?php echo $row['country']; ?>.
																</div>
																<div class="col-sm-12 col-md-3 mt-10-sm">
																	<i class="fa fa-calendar  text-primary mr-5"></i> <?php echo $row['timeframe']; ?>
																</div>
															</div>

														</a>
													
													</div>
												
												</div>
												
												<div class="col-sm-12 col-md-2">
													
													<div class="resume-list-btn">
													
														<a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-5 mb-0-sm">Editar</a>
									<a href="app/drop-academic.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('Are you sure you want to delete this qualification ?')" class="btn btn-primary btn-sm btn-inverse">Borrar</a>
									<div id="edit<?php echo $row['id']; ?>" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				                    <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                 <h4 class="modal-title text-center"><?php echo "$course"; ?></h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/update-academic-qualification.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">
									<div class="col-sm-12 col-md-12">
												
									<div class="form-group">
									<label>Nivel de Educación</label>
									<select name="level" required class="selectpicker show-tick form-control" data-live-search="false">
									<option disabled value="">Seleccionar</option>
									<option <?php if ($level == "Advanced Diploma") { print ' selected '; } ?> value="Advanced Diploma">Primaria</option>
                                    <option <?php if ($level == "Advanced Level (ACSE)") { print ' selected '; } ?>  value="Advanced Level (ACSE)">Secundaria</option>
                                    <option <?php if ($level == "Certificate") { print ' selected '; } ?>  value="Certificate">Técnico/Tecnológico</option>
                                    <option <?php if ($level == "Degree") { print ' selected '; } ?>  value="Degree">Grado</option>
                                    <option <?php if ($level == "Diploma") { print ' selected '; } ?>  value="Diploma">Posgrado</option>
                                    <option <?php if ($level == "Master Degree") { print ' selected '; } ?>  value="Master Degree">PHD-Doctorado</option>
                                    
									</select>
									</div>
													
									</div>
									<div class="col-sm-12 col-md-6">
												
									<div class="form-group">
									<label>País</label>
									<select name="country" required class="selectpicker show-tick form-control" data-live-search="true">
									<option disabled value="">Seleccionar</option>
						            <?php
									$stmtb = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                    $stmtb->execute();
                                    $resultb = $stmtb->fetchAll();

                                    foreach($resultb as $rowb)
                                    {
										?>
										<option <?php if ($ccountry == $rowb['country_name']) { print ' selected '; } ?> value="<?php echo $rowb['country_name']; ?>"><?php echo $rowb['country_name']; ?></option>
										<?php
		
	                                }

                                   
									 ?>
									</select>
									</div>
													
									</div>

						
						            <div class="col-sm-12 col-md-6">
				
							        <div class="form-group"> 
								    <label>Nombre de la Institución</label>
								    <input class="form-control" value="<?php echo "$institution"; ?>" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
							        </div>
						
						             </div>
						
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Titulo del Curso</label>
								    <input class="form-control" value="<?php echo "$course"; ?>" placeholder="Ingresa Nombre del Curso" type="text" name="course" required> 
							        </div>
						
						           </div>
								   
								   	<div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Periodo de Tiempo</label>
								    <input class="form-control" value="<?php echo "$timeframe"; ?>" placeholder="Eg: 2015 To 2016" type="text" name="timeframe" required> 
							        </div>
						
						           </div>

								   	<div class="col-sm-12 col-md-6">
						
							        						
						           </div>
								   	<div class="col-sm-12 col-md-6">
						
							       						
						           </div>
						
					               </div>
				                   </div>
				                   <input type="hidden" name="courseid" value="<?php echo "$course_id"; ?>">
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>

													</div>
													
	
													
												</div>
												
											</div>
										
										</div>
										
										
										<?php
		
 
	                                }

					  
	                                }catch(PDOException $e)
                                    {
                                 
                                    }

									
									?>

									<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
								$total_records = 0;
								require '../constants/db_config.php';
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("SELECT * FROM tbl_academic_qualification WHERE member_no = '$myid' ORDER BY id");
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach($result as $row)
                                {
		                        $total_records++;
 
                               	}

					  
	                            }catch(PDOException $e)
                                {
                                echo "Connection failed: " . $e->getMessage();
                                }
	
								$records = $total_records/5;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="academic.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?> href="academic.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="academic.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
					                </div>

										
		
										
									</div>
									
									<div class="mt-30">
									
										<a data-toggle="modal" href="#QualifModal" class="btn btn-primary btn-lg">Agregar nuevo</a>
										
									</div>
									<div id="QualifModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				                    <div class="modal-header">
					                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                 <h4 class="modal-title text-center">Agregar Estudios Realizados</h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/add-academic-qualification.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">
									<div class="col-sm-12 col-md-12">
												
									<div class="form-group">
									<label>Nivel de Educación</label>
									<select name="level" required class="selectpicker show-tick form-control" data-live-search="false">
									<option disabled value="">Seleccionar</option>
									<option value="Advanced Diploma">Primaria</option>
                                    <option value="Advanced Level (ACSE)">Secundaria</option>
                                    <option value="Certificate">Técnico/Tecnológico</option>
                                    <option value="Degree">Grado</option>
                                    <option value="Diploma">Posgrado</option>
                                    <option value="Master Degree">PHD-Doctorado</option>
                                    
									</select>
									</div>
													
									</div>
									
									<div class="col-sm-6 col-md-6">
												
									<div class="form-group">
									<label>Pais</label>
									<select name="country" required class="selectpicker show-tick form-control" data-live-search="true">
									<option disabled value="">Seleccionar</option>
						            <?php
									$stmtb = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                    $stmtb->execute();
                                    $resultb = $stmtb->fetchAll();

                                    foreach($resultb as $rowb)
                                    {
										$ccountry = $rowb['country'];
										?>
										
										<option <?php if ($ccountry == $rowb['country_name']) { print ' selected '; } ?> value="<?php echo $rowb['country_name']; ?>"><?php echo $rowb['country_name']; ?></option>
										<?php
		
	                                }

                                   
									 ?>
									</select>
									</div>
													
									</div>

						
						            <div class="col-sm-6 col-md-6">
				
							        <div class="form-group"> 
								    <label>Nombre Institución</label>
								    <input class="form-control" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
							        </div>
						
						             </div>
						
						             <div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Título Obtenido</label>
								    <input class="form-control" placeholder="Ingresa el título obtenido" type="text" name="course" required> 
							        </div>
						
						           </div>
								   
								   	<div class="col-sm-12 col-md-6">
						
							        <div class="form-group"> 
								    <label>Periodo de Tiempo</label>
								    <input class="form-control" placeholder="Eg: 2015 To 2016" type="text" name="timeframe" required> 
							        </div>
						
					               </div>
				                   </div>
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Agregar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>
									
								</div>

							</div>
							
						</div>

					</div>

				</div>
			
			</div>

			<footer class="footer-wrapper">
			
				<div class="main-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-9">
							
								<div class="row">
								
									<div class="col-sm-6 col-md-4">
									
										<div class="footer-about-us">
											<h5 class="footer-title">Acerca TRABYRAC</h5>
											<p>TRABYRAC es un portal dedicado a la insersión laboral de nuestros estudiantes.</p>
										
										</div>

									</div>
									
									<div class="col-sm-6 col-md-5 mt-30-xs">
										<h5 class="footer-title">Enlaces Rapidos</h5>
										<ul class="footer-menu clearfix">
											<li><a href="https://yavirac.edu.ec/">Web Yavirac</a></li>
											<li><a href="https://eva.yavirac.edu.ec/">Aula Virtual (EVA)</a></li>
											<li><a href="https://ignug.yavirac.edu.ec/">IGNUG</a></li>
											<li><a href="https://yec.yavirac.edu.ec/">YEC</a></li>
											<li><a href="http://siga.institutos.gob.ec:8080/siga-web/indice.jsf">SIGA</a></li>
											<li><a href="#">Ir Arriba</a></li>

										</ul>
									
									</div>

								</div>

							</div>
							
							<div class="col-sm-12 col-md-3 mt-30-sm">
							
								<h5 class="footer-title">Contacto</h5>
								
								<p>García Moreno S4-35 y Ambato</p>
								<p><a href="mailto:info@yavirac.edu.ec">info@yavirac.edu.ec</a></p>
								<p>Horario de atención: lunes a viernes, de 08H00 a 17H00</a></p>
								

							</div>

							
						</div>
						
					</div>
					
				</div>
				
				<div class="bottom-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-4 col-md-4">
					
								<p class="copy-right">&#169; Copyright <?php echo date('Y'); ?> YAVIRAC</p>
								
							</div>
							
							<div class="col-sm-4 col-md-4">
							
								<ul class="bottom-footer-menu">
									<li><a >Desarrollado por <a HREF="https://www.facebook.com/dieday.ec"> DieDay Soft. </a></li>
								</ul>
							
							</div>
							<div class="col-sm-4 col-md-4">
								<ul class="bottom-footer-menu for-social">
									<li><a href="<?php echo "$tw"; ?>"><i class="ri ri-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
									<li><a href="<?php echo "$fb"; ?>"><i class="ri ri-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
									<li><a href="<?php echo "$ig"; ?>"><i class="ri ri-instagram" data-toggle="tooltip" data-placement="top" title="instagram"></i></a></li>
								</ul>
							<div class="col-sm-4 col-md-4">
								
							</div>
						
						</div>

					</div>
					
				</div>
			
			</footer>
			
		</div>


	</div>
 
 

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>

<script type="text/javascript" src="../js/fileinput.min.js"></script>
<script type="text/javascript" src="../js/customs-fileinput.js"></script>


</body>


</html>