<?php

include 'config.php';

 session_start();
if(! isset($_SESSION["username"])){
    header("Location: login.php");
} else {
    if ($_SESSION["username"] != "2"){
        header("Location: notauthorized.php");
    }
}

$sql = "SELECT * FROM service_providers";

$rows = mysqli_query($conn, $sql);

if(isset($_POST['submit'])){
    $Valuation_Provider_id = $_POST['Valuation_Provider_id'];
    $Valuation_Property_type_id = $_POST['Valuation_Property_type_id'];
    $Valuation_Vehicle_id = $_POST['Valuation_Vehicle_id'];
    $Valuation_report = $_POST['Valuation_report'];

    $sql = "INSERT INTO property_valuation (Valuation_Provider_id, Valuation_Property_type_id, Valuation_Vehicle_id, Valuation_report) 
                VALUES ('$Valuation_Provider_id', '$Valuation_Property_type_id', '$Valuation_Vehicle_id', '$Valuation_report')";

    $result = mysqli_query($conn, $sql);
    if ($result){

        header ("Location: valued.php");
        
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
                <strong style="color:white;">SERVICE PROVIDER DASHBOARD</strong>
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
                    
                <li class="active open"><a href="provider.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Services</span></a>
                        <ul class="ml-menu">
                            <li><a href="buildinginspection.php">Building Inspection</a></li>
                            <li><a href="landinspection.php">Land Inspection</a></li>
                            <li><a href="machineryinspection.php">Machinery Inspection</a></li>
                            <li><a href="vehicleinspection.php">Vehicle Inspection</a></li>
                            <li><a href="buildingvaluation.php">Building Valuation</a></li>
                            <li><a href="landvaluation.php">Land Valuation</a></li>
                            <li><a href="machineryvaluation.php">Machinery Valuation</a></li>
                            <li><a href="vehiclevaluation.php">Vehicle Valuation</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Reports</span></a>
                        <ul class="ml-menu">
                            <li><a href="inspected.php">Inspected Property</a></li>
                            <li><a href="valued.php">Valued Property</a></li>
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
                <h2>Vehicle Valuation
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
                            
                            <div class="float-right">
                            <h6 class="mt-4">Provider</h6><br>
                                <div class="col-sm-6">
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" id="<?php echo $row['Provider_id']; ?>" name="Valuation_Provider_id" value="<?php echo $row['Provider_id']; ?>">
                                        <label for="<?php echo $row['Provider_id']; ?>"><?php echo $row['Provider_company_name']; ?></label>
                                    </div>
                                    <?php  endwhile; ?> 
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * FROM property_type";

                            $rows = mysqli_query($conn, $sql);
                            ?>
                            <div class="float-right">
                            <h6 class="mt-4">Property Type</h6><br>
                            <div class="col-sm-8">
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" id="<?php echo $row['Property_type_id']; ?>" name="Valuation_Property_type_id" value="<?php echo $row['Property_type_id']; ?>">
                                        <label for="<?php echo $row['Property_type_id']; ?>"><?php echo $row['Property_type_name']; ?></label>
                                    </div>
                                    <?php  endwhile; ?> 
                                </div>
                            </div>
                                    
                            
                            <?php
                            $sql = "SELECT * FROM vehicle";

                            $rows = mysqli_query($conn, $sql);
                            ?>
                            <div class="float-right">
                            <h6 class="mt-4">Vehicle</h6><br>
                            <div class="col-sm-8">
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" id="<?php echo $row['Vehicle_id']; ?>" name="Valuation_Vehicle_id" value="<?php echo $row['Vehicle_id']; ?>">
                                        <label for="<?php echo $row['Vehicle_id']; ?>"><?php echo $row['Vehicle_registration_no']; ?></label>
                                    </div>
                                    <?php  endwhile; ?> 
                                </div>
                            </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <textarea name="Valuation_report"  cols="30" rows="5" class="form-control" placeholder="Inspection Report"></textarea>
                                    </div>
                                </div>
                        

                        <div class="row clearfix">
                            
                        <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-round">Confirm Vehicle Valuation</button>
                                <a href="building.php" class="btn btn-default btn-round btn-simple">Cancel</a>
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
</html>