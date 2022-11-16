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
    	<title>Addbook form</title>
    	<link rel = "stylesheet" href="../styling/form.css">
  	</head>
  	<body>
		<div class="container">
          	<div class="title">Add book form</div>
			<div class="content">
				<form action="../form_processing/add_book_fp.php" method="POST" enctype="multipart/form-data">
					<div class="user-details">
						<div class="input-box">
							<span class="details">Name of the book</span>
							<input type="text" name="title" placeholder="Enter the name of the book" required>
						</div>
						<div class="input-box">
							<span class="details">Author of the book</span>
							<input type="text" name="author" placeholder="Enter the author of the book" required>
						</div>
						<div class="input-box">
							<span class="details">Edition</span>
							<input type="number" name="edition" maxlength="1" placeholder="Enter the edition of the book" required>
						</div>
						<div class="input-box">
							<span class="details">Books genre</span>
							<input type="text" name="genre" placeholder="Enter the genre of the book" required>
						</div>
						<div class="input-box">
							<span class="details">Books Description</span>
							<input type="text" name="description" maxlength="150" placeholder="Enter a description of the book" required>
						</div>
						<div class="input-box">
							<span class="details">Book Image</span>
							<input type="file" name="image" required>
						</div>
						<div class="input-box">
							<span class="details">Books price</span>
							<input type="text" name="price" placeholder="Enter the price of the book" required>
						</div>
					</div>
					<div class="bookcon">
						<input type="radio" name="condition" id="dot-1" value="Bad">
						<input type="radio" name="condition" id="dot-2" value="Good">
						<input type="radio" name="condition" id="dot-3" value="Mint Condition">
						<span class="book-title">The condition of the book</span>
						<div class="category">
							<label for="dot-1">
								<span class="dot one"></span>
								<span class="condition">Bad</span>
							</label>
							<label for="dot-2">
								<span class="dot two"></span>
								<span class="condition">Good</span>
							</label>
							<label for="dot-3">
								<span class="dot three"></span>
								<span class="condition">Mint condition</span>
							</label>
						</div>
					</div>
					<div class="button">
						<input type="submit" name="submit" value="Confirm">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>