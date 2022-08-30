<?php
include("../inc_files/functions.php");
include("../Database_files/DBConn.php");

if(isset($_POST['submit'])){
$fName = $_POST['Fname'];
$LName = $_POST['Lname'];
$studNum = $_POST['StudentNumber'];
$pwd = $_POST['Password'];

if(isEmpty($fName, $LName, $studNum, $pwd) !== FALSE){
    header("location: ../Web_pages/Signup.php?error=emptyInput");
    exit();
}
if (invalidStudNum($studNum) !== FALSE){
    header("location: ../Web_pages/Signup.php?error=invalidStudnum");
    exit();
}
if(samePassword($pwd, $confPassword) !== FALSE){
    header("location: ../Web_pages/Signup.php?error=passwordMismatch");
    exit();
}
if(passwordLength($pwd) !== FALSE){
    header("location: ../Web_pages/Signup.php?error=passwordLength");
    exit();
}
if(invalidPassword($pwd) !== FALSE){
    header("location: ../Web_pages/Signup.php?error=invalidpwd");
    exit();
}
if(studNumExists($DBConn, $studNum) !== FALSE){
    header("location: ../Web_pages/Signup.php?error=studNumExists");
    exit();
}

createUser($DBConn, $fName, $LName, $studNum, $pwd);


}