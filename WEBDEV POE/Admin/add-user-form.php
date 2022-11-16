<?php
session_start();
	include('../Database_files/DBConn.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Add User form</title>
		<link rel = "stylesheet" href="../styling/form.css">
	</head>
	<body>
		<div class="container">
			<div class="title">Add User form</div>
			<div class="content">
				<form action="../form_processing/add_user_fp.php" method="POST" enctype="multipart/form-data">
					<div class="user-details">
						<div class="input-box">
							<span class="details">First Name</span>
							<input type="firstname" name="firstname" placeholder="Enter first name" required>
						</div>
						<div class="input-box">
							<span class="details">Last Name</span>
							<input type="lastname" name="lastname" placeholder="Enter last name" required>
						</div>
						<div class="input-box">
							<span class="details">Student Number</span>
							<input type="studentNumber" name="studentNumber" placeholder="Enter student number" required>
						</div>
						<div class="input-box">
							<span class="details">Username</span>
							<input type="username" name="username" placeholder="Enter username" required>
						</div>
						<div class="input-box">
							<span class="details">Email</span>
							<input type="email" name="email" maxlength="150" placeholder="Enter email" required>
						</div>
						<div class="input-box">
							<span class="details">Password</span>
							<input type="password" name="password1" placeholder="Enter password" required>
						</div>
						<div class="input-box">
							<span class="details">Re-Enter Password</span>
							<input type="password" name="password2" placeholder="Re-enter password" required>
						</div>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Create student account!">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>