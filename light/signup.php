<?php
include 'config.php';

session_start();

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
}

if(isset($_POST['submit'])){
    $Owner_first_name = $_POST['Owner_first_name'];
    $Owner_last_name = $_POST['Owner_last_name'];
    $Login_user_name = $_POST['Login_user_name'];
    $Owner_contact = $_POST['Owner_contact'];
    $Owner_email = $_POST['Owner_email'];
    $Owner_national_id = $_POST['Owner_national_id'];
    $Login_password = md5($_POST['Login_password']);
    $cpassword = md5($_POST['cpassword']);

    if($Login_password == $cpassword){
        $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0){
            echo "<p>Username already exists</p>";
        }

        else {
            $sql = "SELECT * FROM owner WHERE Owner_email = '$Owner_email'";
            $result = mysqli_query($conn, $sql);
            if ($result -> num_rows > 0){
                echo "<p>Email already exists</p>";
            }

            else{
                //login table
                $sql = "INSERT INTO login (Login_user_name, Login_password, Login_rank) 
                VALUES ('$Login_user_name', '$Login_password', '1')";
                $result = mysqli_query($conn, $sql);

                //login id
                $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name'";
                $login_id = mysqli_query($conn, $sql);
                $arra = mysqli_fetch_array($login_id);
                if(is_array($arra)){
                    $login_id = $arra['Login_id'];
                }
                echo $login_id;

                //owner table
                $sql = "INSERT INTO owner (Owner_first_name, Owner_last_name, Owner_contact, Owner_email, Owner_national_id, Owner_login_id) 
                VALUES ('$Owner_first_name', '$Owner_last_name', '$Owner_contact', '$Owner_email', '$Owner_national_id', $login_id)";
                $result = mysqli_query($conn, $sql);
                
                if(! $result){
                    echo "<p>Registration not succesful</p>";
                }
                else {
                    header ("Location: login.php?status=success");
                }

            }
        }
        
    } 
    else{
        echo "Passwords do not match!";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate, Admin, Dashboard, template, UI kit, RealEstate Admin, Bootstrap 4x">
<meta name="author" content="Thememakker">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Register</title>
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
                <form class="form" method="POST" action="#">
                    <div class="header">
                        
                        <h5>Sign Up</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="First Name" name="Owner_first_name" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Last Name" name="Owner_last_name" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="User Name" name="Login_user_name" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="contact" name="Owner_contact" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="email" name="Owner_email" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="National ID" name="Owner_national_id" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" class="form-control" name="Login_password" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" required="required">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button class="btn btn-primary btn-round btn-lg btn-block " name="submit">SIGN IN</button>
                        <small>Already have an account?   <a href="login.php" class="link">      Sign In</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

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

</html>