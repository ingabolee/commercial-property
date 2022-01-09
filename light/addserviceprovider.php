<?php
include 'config.php';

session_start();
if(! isset($_SESSION["username"])){
    header("Location: login.php");
} else {
    if ($_SESSION["username"] != "1"){
        header("Location: notauthorized.php");
    }
}

if(isset($_POST['submit'])){
    $Provider_company_name = $_POST['Provider_company_name'];
    $Provider_contact_person = $_POST['Provider_contact_person'];
    $Provider_email = $_POST['Provider_email'];
    $Provider_mobile_no = $_POST['Provider_mobile_no'];
    $Provider_location = $_POST['Provider_location'];
    $Provider_Services_SERVICE_ID = $_POST['Provider_Services_SERVICE_ID'];
    $Login_user_name = $_POST['Login_user_name'];
    $Login_password = md5($_POST['Login_password']);
    $cpassword = md5($_POST['cpassword']);

    if($Login_password == $cpassword){
        $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows > 0){
            echo "<p>Username already exists</p>";
        }

        else {
            $sql = "SELECT * FROM service_providers WHERE Provider_email = '$Provider_email'";
            $result = mysqli_query($conn, $sql);
            if ($result -> num_rows > 0){
                echo "<p>Email already exists</p>";
            }

            else{
                //login table
                $sql = "INSERT INTO login (Login_user_name, Login_password, Login_rank) 
                VALUES ('$Login_user_name', '$Login_password', '2')";
                $result = mysqli_query($conn, $sql);

                //login id
                $sql = "SELECT * FROM login WHERE Login_user_name = '$Login_user_name'";
                $login_id = mysqli_query($conn, $sql);
                $arra = mysqli_fetch_array($login_id);
                if(is_array($arra)){
                    $login_id = $arra['Login_id'];
                }
                echo $login_id;

                //service_providers table
                $sql = "INSERT INTO service_providers (Provider_company_name, Provider_contact_person, Provider_email, Provider_mobile_no, Provider_location, Provider_login_id) 
                VALUES ('$Provider_company_name', '$Provider_contact_person', '$Provider_email', '$Provider_mobile_no', '$Provider_location', $login_id)";
                $result = mysqli_query($conn, $sql);

                //servive_provider_services
                $sql = "SELECT * FROM service_providers WHERE Provider_email = '$Provider_email'";
                $Provider_id = mysqli_query($conn, $sql);
                $arra = mysqli_fetch_array($Provider_id);
                if(is_array($arra)){
                    $Provider_id = $arra['Provider_id'];
                }

                $sql = "INSERT INTO service_provider_services (Provider_Services_PROVIDER_ID, Provider_Services_SERVICE_ID)
                VALUES ('$Provider_id', '$Provider_Services_SERVICE_ID')";

                $result = mysqli_query($conn, $sql);
                
                if(! $result){
                    echo "<p>Registration not succesful</p>";
                }
                else {
                    header ("Location: serviceprovider.php");
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

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:15:10 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate Admin Dashboard template, UI kit, Bootstrap 4x">
<meta name="author" content="Thememakker">

<title>Dashee</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/charts-c3/plugin.css" />
<link rel="stylesheet" href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
<body class="theme-purple">

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
             <h1 style="font-family:courier,arial,helvetica;">
                <strong style="color:white;"> DASHEE COMMERCIAL PROPERTY MANAGEMENT</strong>
            </h1>
        </li>
        
          
        <li class="float-right">
            <a href="logout.php" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    
                    <li class="active open"><a href="dashboard.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Property</span></a>
                        <ul class="ml-menu">
                            <li><a href="building.php">Building</a></li>
                            <li><a href="land.php">Land</a></li>
                            <li><a href="machinery.php">Machinery</a></li>
                            <li><a href="vehicle.php">Vehicle</a></li>
                            <li><a href="addbuilding.php">Add Building</a></li>
                            <li><a href="addland.php">Add Land</a></li>
                            <li><a href="addmachinery.php">Add Machinery</a></li>
                            <li><a href="addvehicle.php">Add Vehicle</a></li>

                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Property Type</span></a>
                        <ul class="ml-menu">
                            <li><a href="propertytype.php">View Property Types</a></li>
                            <li><a href="addpropertytype.php">Add Property Types</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Owner</span></a>
                        <ul class="ml-menu">
                            <li><a href="owner.php">View Owners</a></li>
                            <li><a href="addowner.php">Add Owner</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Service</span></a>
                        <ul class="ml-menu">
                            <li><a href="service.php">View Services</a></li>
                            <li><a href="addservice.php">Add Service</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Service Provider</span></a>
                        <ul class="ml-menu">
                            <li><a href="serviceprovider.php">View Service Providers</a></li>
                            <li><a href="addserviceprovider.php">Add Service Provider</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>    
</aside>


<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Add Service Provider
                </h2>
            </div>            
            
        </div>
    </div>
    <div class="container-fluid">
    <form class="form" method="POST" action="#">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Company Name" name="Provider_company_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact Person" name="Provider_contact_person">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="Provider_email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Mobile Number" name="Provider_mobile_no">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Location" name="Provider_location">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="User Name" name="Login_user_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="Login_password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * FROM services";

                            $rows = mysqli_query($conn, $sql);
                            ?>
                            <div class="float-right">
                            <h6 class="mt-4">Type of Service</h6><br>
                            <div class="col-sm-8">
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" id="<?php echo $row['Service_id']; ?>" name="Provider_Services_SERVICE_ID" value="<?php echo $row['Service_id']; ?>">
                                        <label for="<?php echo $row['Service_id']; ?>"><?php echo $row['Service_name']; ?></label>
                                    </div>
                                    <?php  endwhile; ?> 
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-round">Add Service Provider</button>
                                <a href="serviceprovider.php" class="btn btn-default btn-round btn-simple">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="../assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/property-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:39:37 GMT -->
</html>