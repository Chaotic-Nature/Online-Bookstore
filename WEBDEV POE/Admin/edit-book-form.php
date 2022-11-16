<!--This page allows books that exist in the database to be edited-->
<?php
  	session_start();
	include('../Database_files/DBConn.php');
	$id = $_GET['id'];//Fetching the book id thats embedded in the url.

	$query = mysqli_query($DBConn,"SELECT * from tblBooks where bookID='$id'");//querying the database with sql.
	$row=mysqli_fetch_array($query);//the book data in this array will populate the form fields.//
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit book form</title>
		<link rel = "stylesheet" href="../styling/form.css">
	</head>
  <body>
		<div class="container">
			<div class="title">Book editing form</div>
				<div class="content">
					<form action="../form_processing/update_book_fp.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
						<div class="user-details">
							<div class="input-box">
								<span class="details">Name of the book</span>
								<input type="text" name="title" placeholder="Enter the new name of the book" required value="<?php echo $row['title']; ?>">
							</div>
							<div class="input-box">
								<span class="details">Author of the book</span>
								<input type="text" name="author" placeholder="Enter the new author of the book" required value="<?php echo $row['author']; ?>">
							</div>
							<div class="input-box">
								<span class="details">Edition</span>
								<input type="number" name="edition" maxlength="1" placeholder="Enter the new edition of the book" required value="<?php echo $row['ed']; ?>">
							</div>
							<div class="input-box">
								<span class="details">Books genre</span>
								<input type="text" name="genre" placeholder="Enter the new genre of the book" required value="<?php echo $row['genre']; ?>">
							</div>
							<div class="input-box">
								<span class="details">Books Description</span>
								<input type="text" name="description" maxlength="150" placeholder="Enter a new description of the book" required value="<?php echo $row['descript']; ?>">
							</div>
							<div class="input-box">
								<span class="details">Book Image</span>
								<input type="file" name="image" required value="<?php echo $row['img1']; ?>">
							</div>
							<div class="input-box">
								<span class="details">Books price</span>
								<input type="text" name="price" placeholder="Enter the new price of the book" required value="<?php echo $row['price']; ?>">
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
							<input type="submit" name="submit" value="Update book">
						</div>
					</form>
				</div>
			</div>
		</div>
  </body>
</html>