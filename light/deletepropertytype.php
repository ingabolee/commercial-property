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

$Property_type_id = $_GET["id"];

$sql = "DELETE FROM property_type WHERE Property_type_id = '$Property_type_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: propertytype.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>