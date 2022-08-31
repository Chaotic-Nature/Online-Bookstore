<?php
include ("../inc_files/functions.php");
include ("../Database_files/DBConn.php");

if(isset($_POST['submit']))
{
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    if(isEmptyAdminLogin($username, $password) !== FALSE){
        header("location: ../Web_pages/AdminLogin.php?error=emptyInput");
        exit();
    }
    
    loginAdmin($DBConn, $username, $password);
}
