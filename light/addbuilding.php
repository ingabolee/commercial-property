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

$sql = "SELECT * FROM owner";

$rows = mysqli_query($conn, $sql);

if(isset($_POST['submit'])){
    $Building_name = $_POST['Building_name'];
    $Building_physical_location = $_POST['Building_physical_location'];
    $Building_floor_count = $_POST['Building_floor_count'];
    $Building_room_count = $_POST['Building_room_count'];
    $Building_Owner_id = $_POST['Building_Owner_id'];
    $Building_Property_type_id = $_POST['Building_Property_type_id'];

    $sql = "INSERT INTO building (Building_name, Building_physical_location, Building_floor_count, Building_room_count, Building_Owner_id, Building_Property_type_id) 
                VALUES ('$Building_name', '$Building_physical_location', '$Building_floor_count', '$Building_room_count', '$Building_Owner_id', '$Building_Property_type_id')";

    $result = mysqli_query($conn, $sql);
    if ($result){

        header ("Location: building.php");
        
    }
}


?>
<!doctype html>
<html lang="en">
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
                <h2>Add Building
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
                                    <input type="text" class="form-control" placeholder="Building Name" name="Building_name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Building Location" name="Building_physical_location">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Floor Count" name="Building_floor_count">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Room Count" name="Building_room_count">
                                </div>
                            </div>
                            <div class="float-right">
                            <h6 class="mt-4">Owner</h6><br>
                                <div class="col-sm-6">
                                <?php   while($row = mysqli_fetch_assoc($rows)):?>
                                    <div class="radio inlineblock m-r-25">
                                        <input type="radio" id="<?php echo $row['Owner_id']; ?>" name="Building_Owner_id" value="<?php echo $row['Owner_id']; ?>">
                                        <label for="<?php echo $row['Owner_id']; ?>"><?php echo $row['Owner_first_name']; ?></label>
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
                                        <input type="radio" id="<?php echo $row['Property_type_id']; ?>" name="Building_Property_type_id" value="<?php echo $row['Property_type_id']; ?>">
                                        <label for="<?php echo $row['Property_type_id']; ?>"><?php echo $row['Property_type_name']; ?></label>
                                    </div>
                                    <?php  endwhile; ?> 
                                </div>
                            </div>
                        
                        <div class="row clearfix">
                            
                        <div class="col-sm-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-round">Add Building</button>
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