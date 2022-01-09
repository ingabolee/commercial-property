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

$Machinery_id = $_GET["id"];

$sql = "DELETE FROM machinery WHERE Machinery_id = '$Machinery_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: machinery.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>