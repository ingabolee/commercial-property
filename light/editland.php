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

$Land_id = $_GET["id"];

$sql = "SELECT * FROM land WHERE Land_id = '$Land_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $Land_longitudes = $_POST['Land_longitudes'];
    $Land_Latitudes = $_POST['Land_Latitudes'];
    $Land_current_market_price = $_POST['Land_current_market_price'];
    $Land_physical_location = $_POST['Land_physical_location'];
    $Land_nearest_landmark = $_POST['Land_nearest_landmark'];
    $Land_Size = $_POST['Land_Size'];
    $Land_Title_no = $_POST['Land_Title_no'];

    $sql = "UPDATE land SET Land_longitudes = '$Land_longitudes', Land_Latitudes = '$Land_Latitudes', Land_current_market_price = '$Land_current_market_price', Land_physical_location = '$Land_physical_location', Land_nearest_landmark = '$Land_nearest_landmark', Land_Size = '$Land_Size', Land_Title_no = '$Land_Title_no' WHERE Land_id = '$Land_id'"; 
                
    $result = mysqli_query($conn, $sql);
    if ($result){

        header ("Location: land.php");
        
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
                <h2>Edit Land
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
                                    <input type="number" class="form-control" placeholder="Longitudes" name="Land_longitudes" value="<?php echo $row['Land_longitudes'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Latitudes" name="Land_Latitudes" value="<?php echo $row['Land_Latitudes'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Market Price" name="Land_current_market_price" value="<?php echo $row['Land_current_market_price'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Physical Location" name="Land_physical_location" value="<?php echo $row['Land_physical_location'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nearest Landmark" name="Land_nearest_landmark" value="<?php echo $row['Land_nearest_landmark'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Land Size in acres" name="Land_Size" value="<?php echo $row['Land_Size'];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Title Number" name="Land_Title_no" value="<?php echo $row['Land_Title_no'];?>">
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                    <button name="submit" class="btn btn-primary btn-round">Edit Land</button>
                                    <a  href="deleteland.php?id=<?php echo $Land_id ?>" class="btn btn-danger btn-round ">Delete</a>
                                    <a href="land.php" class="btn btn-default btn-round btn-simple">Cancel</a>
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