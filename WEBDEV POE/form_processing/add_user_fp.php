<?php

include('../Database_files/DBConn.php');
include("../inc_files/functions.php");
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $student_Number = $_POST['studentNumber'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password1'];
    $confPassword = $_POST['password2'];
        mysqli_query($DBConn, "INSERT INTO tblUser (fName, lName, studNum, username, email, pwd) VALUES ('$firstname', '$lastname', '$student_Number', '$username' ,'$email', '$password')");
        header('location:../Admin/Users.php?message=successfully added User data"');
    }
    
   

?>