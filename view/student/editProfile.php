<?php
session_start();

if (!isset($_SESSION["userRole"])) {
    header("location: ../../view/main/login.php");
} else {
    if ($_SESSION["userRole"] != "Student") {
        header("location: ../../view/main/login.php");
    }
}

require_once '../../model/user.php';
require_once '../../controller/AuthController.php';

$auth = new AuthController;
$errMsg = false;

if (
    isset($_POST['exampleInputEmail']) &&
    isset($_POST['exampleInputPassword']) &&
    isset($_POST['exampleInputname'])
) {
    $user = new User();
    $user->userName = $_POST['exampleInputname'];
    $user->userEmail = $_POST['exampleInputEmail'];
    $user->userPassword = $_POST['exampleInputPassword'];

    // Validate and sanitize inputs if needed

    // Call the updateUser method from AuthController
    $updateResult = $auth->updateUser($_SESSION["userId"], $user);

    if ($updateResult) {
        // Profile update successful
        $errMsg = "Profile update successful!";
    } else {
        // Profile update failed
        $errMsg = "Error updating profile. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edukate - Online Education Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>Edukate@hotmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
           <a href="home.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Edukate</h1>
            </a>
            
            PX<h1 style="color: green;"  data-toggle="counter-up"><?php echo $_SESSION["userPrograss"] ?></h1>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <a href="course.php" class="nav-item nav-link">Courses</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="Profile.php" class="nav-item nav-link ">Profile</a>
                </div>
                <div>
                <a href="../main/login.php?logout"><i class="fa fa-sign-out-alt fa-2x"></i></a>
            </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


     <!-- Header Start -->
   <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-1">Edit your profile</h1>
        <div class="d-inline-flex text-white mb-5">
            <p class="m-0 text-uppercase"><a class="text-white" href="home.php">Home</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">edit profile</p>
        </div>
    </div>
</div>
<!-- Header End -->
<form class="user" action="editprofile.php" method="POST" onsubmit="return validateForm()">
<?php

if ($errMsg !== false) {
    echo '<div class="alert alert-' . ($updateResult ? 'success' : 'danger') . ' mt-3">' . $errMsg . '</div>';
}

?>

    <div class="form-group">
        <input type="email" class="form-control form-control-user" name="exampleInputEmail"
            placeholder="Email Address" required>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user"
                name="exampleInputPassword" placeholder="Password" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user"
                name="exampleInputname" placeholder="username" required>
        </div>

    </div>

    <button class="btn btn-primary btn-user btn-block" type="submit">Submit</button>

</form>

<script>
    function validateForm() {
        var email = document.forms["userForm"]["exampleInputEmail"].value;
        var password = document.forms["userForm"]["exampleInputPassword"].value;
        var repeatPassword = document.forms["userForm"]["exampleRepeatPassword"].value;

        // Check if any of the fields are empty
        if (email === "" || password === "" || repeatPassword === "") {
            alert("All fields must be filled out");
            return false;
        }

        // Check if the passwords match
        if (password !== repeatPassword) {
            alert("Passwords do not match");
            return false;
        }

        // You can add more validation logic here if needed

        return true;
    }
</script>




    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Edukate</h1>
                    </a>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Newsletter</h3>
                    <div class="w-100">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, giza, eg</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope mr-2"></i>Edukate@hotmail.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-white-50 mb-2" href="course.php"><i class="fa fa-angle-right mr-2"></i>Courses</a>
                        <a class="text-white-50" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                        <a class="text-white-50" href="Profile.php"><i class="fa fa-angle-right mr-2"></i>Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">Edukate</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i>backS</a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
