<?php
include 'config.php';
session_start();

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
}

if (isset($_POST['submit'])){
    $Login_user_name = $_POST['Login_user_name'];
    $Login_password = md5($_POST['Login_password']);

    $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name' AND Login_password='$Login_password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['Login_rank'];

        if ($_SESSION["username"] == "1"){
            header("Location: dashboard.php");
        }  
        else if ($_SESSION["username"] == "2") {
            header("Location: provider.php");
        }
        else {
            header("Location: notauthorized.php");
        }
        
        
    }
    else {
        echo "<p>Email and password do not match</p>";
    }
}

?>

<!doctype html>
<html lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/sign-in.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:38:45 GMT -->
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate, Admin, Dashboard, template, UI kit, RealEstate Admin, Bootstrap 4x">
<meta name="author" content="Thememakker">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-purple authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(../assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="">
                    <div class="header">
                        
                        <h5>Sign In</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter User Name" name="Login_user_name" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="Login_password" class="form-control" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button class="btn btn-primary btn-round btn-lg btn-block " name="submit">SIGN IN</button>
                        <h5><a href="forgot-password.php" class="link">Forgot Password?</a></h5>
                        <small>Don't have an account?<a href="signup.php" class="link">      Sign Up</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/sign-in.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:38:48 GMT -->
</html>