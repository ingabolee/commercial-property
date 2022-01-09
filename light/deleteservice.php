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

$Service_id = $_GET["id"];

$sql = "DELETE FROM services WHERE Service_id = '$Service_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: service.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>