<?php
include ("../inc_files/functions.php");
include ("../Database_files/DBConn.php");


if(isset($_POST['submit']))
{
    $studNum = $_POST['StudentNumber'];
    $username = $_POST['username'];
    $password = $_POST['Password'];

    if(isEmptyLogin($studNum, $username, $password) !== FALSE){
        header("location: ../Web_pages/Login.php?error=emptyInput");
        exit();
    }
    
    loginUser($DBConn, $studNum, $password);
}