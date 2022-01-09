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

<!-- Right Sidebar -->


<!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                </h2>
            </div>            
            
        </div>
    </div>
    <?php
    $sql = "SELECT * FROM building";
    $result = mysqli_query($conn, $sql);
    $building_count = mysqli_num_rows($result);

    $sql = "SELECT * FROM land";
    $result = mysqli_query($conn, $sql);
    $land_count = mysqli_num_rows($result);

    $sql = "SELECT * FROM machinery";
    $result = mysqli_query($conn, $sql);
    $machinery_count = mysqli_num_rows($result);

    $sql = "SELECT * FROM vehicle";
    $result = mysqli_query($conn, $sql);
    $vehicle_count = mysqli_num_rows($result);

    $sql = "SELECT * FROM owner";
    $result = mysqli_query($conn, $sql);
    $owner_count = mysqli_num_rows($result);

    $sql = "SELECT * FROM services";
    $result = mysqli_query($conn, $sql);
    $services_count = mysqli_num_rows($result);

    $sql = "SELECT * FROM service_providers";
    $result = mysqli_query($conn, $sql);
    $service_providers_count = mysqli_num_rows($result);

    $total = $building_count + $land_count + $machinery_count + $vehicle_count;

    ?>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Total Property Number</h5>
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $total; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Owners</h5>                                
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $owner_count; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Services</h5>
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $services_count; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h5 class="mt-0">Service Providers</h5>
                                
                            </div>
                            <div>
                                <h2 class="mb-0"><?php echo $service_providers_count; ?></h2>
                            </div>
                        </div>
                        <span id="linecustom4">1,5,3,6,6,3,6,8,4,2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Property Types</strong>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>PROPERTY TYPE NAME</th>
                                        <th>PROPERTY TYPE DESCRIPTION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>PROPERTY TYPE NAME</th>
                                        <th>PROPERTY TYPE DESCRIPTION</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                <?php 
                                $sql = "SELECT * FROM property_type";

                                $rows = mysqli_query($conn, $sql);
                                ?>
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <td  onclick="window.location.href='editpropertytype.php?id=<?php echo $row['Property_type_id']; ?>'"><?php echo $row["Property_type_name"]?></td>
                                    <td  onclick="window.location.href='editpropertytype.php?id=<?php echo $row['Property_type_id']; ?>'"><?php echo $row["Property_type_desc"]?></td>
                                </tr>
                                <?php  endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
<!-- Jquery Core Js --> 
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/libscripts.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/vendorscripts.bundle.js"></script>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/c3.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/jvectormap.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/knob.bundle.js"></script>

<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/bundles/mainscripts.bundle.js"></script>
<script src="https://thememakker.com/templates/oreo/realestate/html/light/assets/js/pages/index.js"></script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/realestate/html/light/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Jul 2021 09:36:38 GMT -->
</html>