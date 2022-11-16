<?php
	session_start();
	include('../Database_files/DBConn.php');
	$id=$_GET['id'];

	$query=mysqli_query($DBConn,"SELECT * from tblUser where userID='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit User form</title>
	<link rel = "stylesheet" href="../styling/form.css">
	</head>
	<body>
		<div class="container">
			<div class="title">Edit User form</div>
			<div class="content">
					<form action="../form_processing/update_user_fp.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
						<div class="user-details">
						<div class="input-box">
							<span class="details">First Name</span>
							<input type="firstname" name="firstname" placeholder="Enter new first name" required value="<?php echo $row['fName']; ?>">
						</div>
						<div class="input-box">
							<span class="details">Last Name</span>
							<input type="lastname" name="lastname" placeholder="Enter new last name" required value="<?php echo $row['lName']; ?>">
						</div>
						<div class="input-box">
							<span class="details">Student Number</span>
							<input type="studentnumber" name="studentnumber" placeholder="Enter new student number" required value="<?php echo $row['studNum']; ?>">
						</div>
						<div class="input-box">
							<span class="details">Username</span>
							<input type="username" name="username" placeholder="Enter new username" required value="<?php echo $row['username']; ?>">
						</div>
						<div class="input-box">
							<span class="details">Email</span>
							<input type="email" name="email" maxlength="150" placeholder="Enter new email" required value="<?php echo $row['email']; ?>">
						</div>
						<div class="input-box">
							<span class="details">Password</span>
							<input type="password" name="password1" placeholder="Enter new password" required>
						</div>
						<div class="input-box">
							<span class="details">Re-Enter new Password</span>
							<input type="password" name="password2" placeholder="Re-enter password" required>
						</div>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Update student account">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>