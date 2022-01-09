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

$Building_id = $_GET["id"];

$sql = "DELETE FROM building WHERE Building_id = '$Building_id'";
$result = mysqli_query($conn, $sql);

if ($result){
    header("Location: building.php");
}
else{
    echo "<p>Unable to delete element.</p>";
}


?>