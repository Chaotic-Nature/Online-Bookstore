<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title> Ebook Store Admin Login </title>
    <link rel = "stylesheet" href="../styling/styleAdmin.css">
    <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body style= "color : white">
    <section class ="header">
            <section id="home">
                <nav>
                <!-- <input type="checkbox" id="check">
                <label for ="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label> --> 
                <label class = "logo"><b>EBookStore</b></label> 
                <i class ="fa fa-bars" onclick="showMenu()"></i>
                </nav>
                <?php
                    if(isset($_GET['message'])){
                        if($_GET['message'] == "SuccessfullyAddedBook"){
                            echo "<h2>Your book as successfully been uploaded for sale!</h2>";
                        }
                        if($_GET['message'] == "AccountCreationSuccessful"){
                            echo "<h2>You have successfully created an account! Once your account is verified by an admin, you will gain full student access to the site!</h2>";
                        }
                        if($_GET['message'] == "unverified"){
                            echo "<h2>Your account is still being validated. Please be patient.</h2>";
                        }
                    }
                ?>
                <a href="../Index.php">Back</a>
            </section>
        </section>
    </body>
</html>

                