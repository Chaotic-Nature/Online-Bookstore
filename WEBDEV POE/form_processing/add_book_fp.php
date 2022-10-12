<?php

	include('../Database_files/DBConn.php');
	include("../inc_files/functions.php");
	if(isset($_POST['submit']) AND isset($_FILES['image'])){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$edition = $_POST['edition'];
		$genre = $_POST['genre'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$condition = $_POST['condition'];
		$seller = "Cibrain";
		$Dir = "../book_images";
    if (isset($_FILES['image'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $Dir . "/" .
        $_FILES['image']['name']) == TRUE) {
            chmod($Dir . "/" . $_FILES['image']['name'], 0644);
            echo "File \"" .
                htmlentities($_FILES['image']['name']) .
                "\"successfully uploaded.
				<br />\n";

            $image = "./book_images/" . $_FILES['image']['name'];
            $sqlQuery = mysqli_query($DBConn, "INSERT INTO tblBooks (title, author, ed, genre, descript, img1, price, cond, seller) VALUES ($title, $author, $edition, $genre, $descript, $price, $condition, $seller);");
                header('location:../Admin/books.php?message=successfully added book"');
                exit();
            }
        } else
            echo "There was an error uploading \"" . htmlentities($_FILES['image']['name']) .
                "\".<br />\n";
    }

?>