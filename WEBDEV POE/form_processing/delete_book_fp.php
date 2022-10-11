<?php
include('../Database_files/DBConn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tblBooks WHERE bookID=". $id . ";";
    if(mysqli_query($DBConn, $query) == FALSE){
        echo "error";
    }
    else{
        header("location: ../Admin/Books.php?message=successfully deleted book");
    }

}
?>