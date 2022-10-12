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
            $sqlQuery = "INSERT INTO tblBooks (title, author, ed, genre, descript, img1, price, cond, seller) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($DBConn);
            if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
                header("location: ../Web_pages/Sell.php?error=CouldntSellBook");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssssssss", $title, $author, $edition, $genre, $description, $image, $price, $condition, $seller);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                $myfile = fopen("../text_files/bookData.txt", "a") or die("Unable to open file!");
                fwrite($myfile, " ,,$title,,$author,,$edition,,$genre,,$description,,$image,,$price,,$condition,,$seller,,\n");
                fclose($myfile);
                header('location:../Admin/books.php?message=successfully added book"');
                exit();
            }
        } else
            echo "There was an error uploading \"" . htmlentities($_FILES['image']['name']) .
                "\".<br />\n";
    }
}
?>