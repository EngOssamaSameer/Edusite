<?php

session_start();
if(!isset($_SESSION["userRole"])){
  header("location: ../../view/main/login.php");
}else{
  if($_SESSION["userRole"] != "Teacher" ){
    header("location: ../../view/main/login.php");

  }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
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
	<title>Add new Lecture</title>
	
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
				<h4 class="breadcrumb-title">Add Lecture</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Add Lecture</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Add Lecture</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>[1] Basic info</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Select Cousre Category </label>
										<div>
                                            <select>
                                                <option name="1">FrontEnd</option>
                                                <option name="1">BackEnd</option>
                                                <option name="1">OOP</option>
                                            </select>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Select Cousre</label>
										<div>
                                            <select>
                                                <option name="2">FrontEnd</option>
                                                <option name="2">BackEnd</option>
                                                <option name="2">OOP</option>
                                            </select>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Lecture Name</label>
										<div>
											<input class="form-control" type="text" value="">
										</div>
									</div>
									<div class="seperator"></div>
								
									
									<div class="col-12 m-t20">
										<div class="ml-auto">
											<h3 class="m-form__section">[2] Add Point</h3>
										</div>
									</div>
									<div class="col-12">
										<table id="item-add" style="width:100%;">
											<tr class="list-item">
												<td>
													<div class="row">
														<div class="col-md-4">
															<label class="col-form-label">Piont</label>
															<div>
																<input class="form-control" type="text" value="">
															</div>
														</div>
														<div class="col-md-2">
															<label class="col-form-label">Close</label>
															<div class="form-group">
																<a class="delete" href="#"><i class="fa fa-close"></i></a>
															</div>
														</div>
													</div>
													<div class="form-group col-12">
														<label class="col-form-label">Point description</label>
														<div>
															<textarea class="form-control"> </textarea>
														</div>
													</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-12">
										<center><button type="button" class="btn-secondry add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>Add Point</button>
										<button type="reset" class="btn">CREATE LECTURE</button></center>
									</div>
								</div>
							</form>
						</div>
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
<script>
// Pricing add
	function newMenuItem() {
		var newElem = $('tr.list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#item-add');
	}
	if ($("table#item-add").is('*')) {
		$('.add-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#item-add .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().parent().remove();
		});
	}
</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:09:05 GMT -->
</html>