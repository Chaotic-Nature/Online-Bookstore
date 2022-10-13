<?php
include('../Database_files/DBConn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tblUser WHERE userID=". $id . ";";
    if(mysqli_query($DBConn, $query) == FALSE){
        echo "error";
    }
    else{
        header("location: ../Admin/User.php?message=successfully deleted User data");
    }

}
?>