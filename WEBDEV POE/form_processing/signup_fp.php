<?php
include("../inc_files/functions.php");
include("../Database_files/DBConn.php");

if(isset($_POST['submit']))
{
    $fName = $_POST['Fname'];
    $LName = $_POST['Lname'];
    $studNum = $_POST['StudentNumber'];
    $username = $_POST['Username'];
    $pwd = $_POST['Password'];
    $confPwd = $_POST['confPwd'];

    if(isEmpty($fName, $LName, $studNum, $username, $pwd, $confPwd) !== FALSE){
        header("location: ../Web_pages/Signup.php?error=emptyInput");
        exit();
    }
    if(samePassword($pwd, $confPwd) !== FALSE){
        header("location: ../Web_pages/Signup.php?error=passwordMismatch");
        exit();
    }
    if(passwordLength($pwd) !== FALSE){
        header("location: ../Web_pages/Signup.php?error=passwordLength");
        exit();
    }
    if(studNumExists($DBConn, $studNum) !== FALSE){
        header("location: ../Web_pages/Signup.php?error=studNumExists");
        exit();
    }
    if(userNameExists($DBConn, $username) !== FALSE){
        header("location: ../Web_pages/Signup.php?error=usernameExists");
        exit();
    }

    createUser($DBConn, $fName, $LName, $studNum, $username, $pwd);


}