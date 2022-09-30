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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- THE ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body style="font-family : Verdana, sans-serif">
        <!--HOME PAGE-->
        <section class ="header">
            <section id="home">
                <nav>
                    <!--<input type="checkbox" id="check">
                        <label for ="check" class="checkbtn">
                            <i class="fas fa-bars"></i>
                        </label> -->
                        <label class = "logo">
                            <b>EBookStore</b>
                        </label>   

                        <div class="nav-links" id="navLinks">
                            <i class="fa fa-times" onclick="hideMenu()"></i>
                            <ul>
                                <li> <a href="Index.php"> Home </a> </li>
                                <li> <a href="#About"> About </a> </li>
                                <li> <a href="#Sale"> Books for sale! </a> </li>
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
                        <a href= "./Web_pages/Login.php" width="640" height="1007" frameborder="0" marginheight="0" marginwidth="0" class="visit-btn">Click Here To Login</a>
                    </div>
                </section>
            </section>
            
            <section class="icons-container">

            <div class="icons">

            <i class="fas fa-plane"></i>

                <div class="content">
                <h3>Free Shipping</h3>
                <p>Order's Over R300 Are Free</p>
                </div>

            </div>

            <div class="icons">

            <i class="fas fa-lock"></i>

                <div class="content">
                <h3>Secure Payment</h3>
                <p>100% Secure Payments</p>
                </div>
                
            </div>

            <div class="icons">

            <i class="fas fa-redo-alt"></i>

                <div class="content">
                <h3>Easy Returns</h3>
                <p>Return Within 10 Days</p>
                </div>
                
            </div>

            <div class="icons">

            <i class="fas fa-headset"></i>

                <div class="content">
                <h3>24/7 Customer Support</h3>
                <p>Call Us Anytime</p>
                </div>
                
            </div>

            </section>

            <section class = "book-section">
            <section id = "Sale">
                
                        <div class="books-grid">
                        <h1 class="Book-Head">For The Bookworms</h1>
                            
                            <!-- Add the search file name -->
                            <div id="search-bar" class="pull-right">
                            <form action="search.php"    
                                method="get" 
                                style="width: 100%; max-width: 30rem">

                            <div class="input-group my-5">
		                    <input type="text" 
		                    class="form-control"
		                    name="key" 
		                    placeholder="Search For A Book Here..." 
		                    aria-label="Search Book..." 
		                    aria-describedby="basic-addon2">

		                    <button class="input-group-text
		                    btn btn-primary" 
                            id="basic-addon2">
                            <img src="images/search.png"
                                width="20">
                            </button>
                            </div>
                            </form>
                            </div>
                            
                              <?php 
                                    include("Database_files/DBConn.php");//Connecting to the database.

                                    $selectQuery = "SELECT * FROM tblBooks;";
                                    $selectQueryResult = mysqli_query($DBConn, $selectQuery);//Selecting the books table.
                                    if ($selectQueryResult === FALSE)
                                    {
                                          echo "<p>Unable to select database.</p>\n";
                                          echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . mysqli_error($DBConn) . "</p>";
                                    }
                                    //While loop executes for every book in the books table.
                                    //The loop uses html and css to display every book in the table.
                                    while (($Row = mysqli_fetch_assoc($selectQueryResult)) !== null)
                                    {
                                          echo '<div>';
                                          echo '<div>Title: ' .$Row['title'] . '</div>';
                                          echo '<div>R '. $Row['price']. '</div>';
                                          echo '<div>';
                                          echo '<img src='. $Row['img1'] . ' width="150" height="200">';
                                          echo '</div>';
                                          echo "<div>
                                                      <button id='msg-seller'>Contact seller</button>
                                                      <button id='atc-btn'>Add to cart</button>
                                                </div>";
                                          echo '</div>';
                                    }
                                        ?>
                                    </div>
                                </div>
            </section>
            </section>

            <section class="about-us">
                <section id="About">
                    <h1>About Us</h1>
                    <div class="icon">
                    <div id="search-btn" class="fas fa-search"></div>
                    <a href="#" class="fas fa-shopping"></a>
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
