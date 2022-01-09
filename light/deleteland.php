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

$sql = "DELETE FROM land WHERE Land_id = '$Land_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: land.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>