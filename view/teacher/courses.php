<?php

	session_start();
	if(!isset($_SESSION["userRole"])){
	header("location: ../../view/main/login.php");
	}else{
	if($_SESSION["userRole"] != "Teacher" ){
		header("location: ../../view/main/login.php");

	}
	}
	//select all courses
	require_once '../../controller/teacherController.php';
	$courses = new teacherController ;
	$res = "" ;
	if($courses->selectAllCourses()){
		$res = $courses->selectAllCourses() ;
	}
	



?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:10:19 GMT -->
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>All Courses</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- import header -->
	<?php require_once "component/header.php" ?>

	<!-- import sidebar -->
	<?php require_once "component/side.php" ?>


	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Courses</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Courses</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Your Courses</h4>
						</div>
						<?php 
							foreach($res as $res){
								?>
									<div class="widget-inner">
										<div class="card-courses-list admin-courses">
											<div class="card-courses-media">
												<img src="<?php echo $res['image'] ?>" alt=""/>
											</div>
											<div class="card-courses-full-dec">
												<div class="card-courses-title">
													<h4><?php echo $res['name'] ?></h4>
												</div>
												<div class="card-courses-list-bx">
													<ul class="card-courses-view">
														<li class="card-courses-user">
															<div class="card-courses-user-pic">
																<img src="<?php echo $_SESSION["userPhoto"] ?>" alt=""/>
															</div>
															<div class="card-courses-user-info">
																<h5>Teacher</h5>
																<h5 style="font-size: 20px;"><?php echo $res['instructor'] ?></h5>
															</div>
														</li>
														<li class="card-courses-categories">
															<h5>Teacher Email</h5>
															<h5 style="font-size: 20px;"><?php echo $res['instructorEmail'] ?></h5>
														</li>
														<li class="card-courses-categories">
															<h5>Category</h5>
															<h5 style="font-size: 20px;"><?php echo $res['type'] ?></h5>
														</li>
														<li class="card-courses-categories">
															<h5>Creation Date</h5>
															<h5 style="font-size: 20px;"><?php echo $res['creationDate'] ?></h5>
														</li>
													</ul>
												</div>
												<div class="row card-courses-dec">
													<div class="col-md-12">
														<h6 class="m-b10">Course Description</h6>
														<p><?php echo $res['desc'] ?></p>	
													</div>
													<div class="col-md-12">
														<a href="#" class="btn green radius-xl outline">Update</a>
														<a href="#" class="btn red outline radius-xl ">Delete</a>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								<?php
							}
						?>
						
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/js/functions.js"></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src="assets/js/admin.js"></script>
<script src='assets/vendors/switcher/switcher.js'></script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>




