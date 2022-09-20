<?php 
      include('./Database_files/CreateTable.php'); 
      include_once('./Database_files/LoadBookStore.php');
?>
<html lang ="en" dir ="Itr";>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> EBookStore.com </title>
        <link rel = "stylesheet" href="styling/style.css">
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <!--HOME PAGE-->
        <section class ="header">
            <section id="home">
                <nav>
                    <input type="checkbox" id="check">
                        <label for ="check" class="checkbtn">
                            <i class="fas fa-bars"></i>
                        </label>  
                        <label class = "logo">
                            <b>EBookStore</b>
                        </label>   

                        <div class="nav-links" id="navLinks">
                            <i class="fa fa-times" onclick="hideMenu()"></i>
                            <ul>
                                <li> <a href="Index.php"> Home </a> </li>
                                <li> <a href="./Web_pages/About.php"> About </a> </li>
                                <li> <a href="./Web_pages/Books.php"> Books for sale! </a> </li>
                                <li> <a href="./Web_pages/Sell.php"> Sell your books here! </a> </li>
                                <li> <a href="./Web_pages/Login.php"> Login/Signup </a> </li>
                            </ul>
                        </div>
                        <i class ="fa fa-bars" onclick="showMenu()"></i>
                    </nav>
                    <hr>
                    <div class ="text-box">
                        <h1><b> Welcome To EBookStore </b></h1>
                        <p style="color:white"> Ebook Store is an online market place for students that are looking to buy or sell their used textbooks</p>
                        <a href= "Login.php" width="640" height="1007" frameborder="0" marginheight="0" marginwidth="0" class="visit-btn">Click Here To Login</a>
                    </div>
                </section>
            </section>
            <section class="about-us">
                <section id="About">
                    <h1 style="color: black;">About Us</h1>
                    <p>Ebook store was established in the cold winter of the year 2022 by 3 disguished gentlemen, Cibbs , AP and Sir Gareth thee End.</p>
                    <h2> Contact Us </h2>
                    <p>
                        Email: Awesomsauce@gmail.com</br>
                        Tel: 069 210 420</br>
                        Location:
                    </p>
                </section>
            </section>
            <script>
                var navLinks = document.getElementById("navLinks");
                function showMenu() {
                    navLinks.style.right = "0";
                }
                function hideMenu() {
                    navLinks.style.right = "-200px";
                }
            </script>
        </section>
    </body>
</html>
