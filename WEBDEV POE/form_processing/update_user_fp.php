<?php

include('../Database_files/DBConn.php');
include("../inc_files/functions.php");
if (isset($_POST['submit'])) {
	$id=$_GET['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$student_Number = $_POST['studentnumber'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password1'];
	$confPassword = $_POST['password2'];

	mysqli_query($DBConn, "UPDATE tblUser SET  fName='$firstname', lName='$lastname', studNum='$student_Number', username='$username', email='$email', pwd='$password' WHERE userID='$id'");
	header('location:../Admin/Users.php?message=successfully edited User data"');
	
}
?>