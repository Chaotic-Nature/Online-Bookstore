<?php 
    session_start();
    include('./Database_files/CreateTable.php'); 
    include_once('./Database_files/LoadBookStore.php');
?>
<html lang ="en" dir ="Itr";>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> EBookStore.com </title>

        <link rel = "stylesheet" href="styling/style.css?v=<?php echo time();?>">
        
        <!-- FONT -->
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- THE ICONS -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        
        <link rel="stylesheet" href="css/font-awesome.css?v=<?php echo time();?>">
    </head>
    <body style="font-family : Verdana, sans-serif">
        <!--HOME PAGE-->
        <section class ="header">
            <section id="home">
                <nav>
                        <label class = "logo">
                            <b>EBookStore</b>
                        </label>   
                        
                        <div class="nav-links" id="navLinks">
                            <i class="fa fa-times" onclick="hideMenu()"></i>
                            <ul><?php 
                            if (isset($_SESSION['studentNumber'])){
                                echo '<li> <a href="Index.php"> Home </a> </li>';
                                echo '<li> <a href="#writer"> About Us</a> </li>';
                                echo '<li> <a href="#Sale"> Books for sale! </a> </li>';
                                echo '<li> <a href="#Involved"> Sell your books here! </a> </li>';
                                echo '<li> <a href="inc_files/logout.php"> Logout </a> </li>';
                                echo '<li> <a href="./Web_pages/Message.php"> Notifications <span id="count">4</span></a> </li>';
                            }
                            else{
                                //when the user is logged out it displays these links//
                                echo'<li> <a href="Index.php"> Home </a> </li>';
                                echo'<li> <a href="#writer"> About </a> </li>';
                                echo'<li> <a href="#Sale"> Books for sale! </a></li>';
                                echo'<li> <a href="./Web_pages/Login.php"> Login/Signup </a> </li>';
                            }
                                ?>
                                 
                                    <!--if (isset($_SESSION['studentNumber'])){
                                        //if the user is logged in, it only displays these links//
                                        echo'<li> <a href="Index.php"> Home</a></li>';
                                        echo'<li> <a href="#About">About</a></li>';
                                        echo'<li> <a href="#Sale">Books for sale!</a></li>';
                                        echo'<li> <a href="./Web_pages/Sell.php">Sell your books here!</a></li>';
                                        echo'<li> <a href="./inc_files/logout.php">Logout</a></li>';
                                    }
                                    else{
                                        //when the user is logged out it displays these links//
                                        echo'<li> <a href="Index.php"> Home </a> </li>';
                                        echo'<li> <a href="#About"> About </a> </li>';
                                        echo'<li> <a href="#Sale"> Books for sale! </a></li>';
                                        echo'<li> <a href="./Web_pages/Login.php"> Login/Signup </a> </li>';
                                    }
                                ?>-->
                                
                                
                            </ul>
                        </div>
                        <i class ="fa fa-bars" onclick="showMenu()"></i>
                    </nav>
                    <hr>
                        <?php
                            if(isset($_SESSION['studentNumber'])){
                                //if the user is logged in//
                                echo "<div class ='text-welcome'>";
                                echo "<div class = 'theMessage'>";
                                echo "<p><b>Welcome </b></p>". "<h1><b>" . $_SESSION['name'] . " " . $_SESSION['surname'] . "</b></h1>";
                                echo "</div>";
                                echo "</div>";
                            }
                            else{
                                //if the user is logged out//
                                echo '<div class ="text-box">';
                                echo "<h1><b> Welcome To EBookStore </b></h1>";
                                echo '<p style="color:white"> Ebook Store is an online market place for students that are looking to buy or sell their used textbooks  </p>';
                                echo '<a href="./Web_pages/Login.php" width="640" height="1007" frameborder="0" marginheight="0" marginwidth="0" class="visit-btn">Click Here To Login</a>';
                                echo "</div>";
                            }                   
                        ?>
                </section>
            </section>
            
            <section class="icons-container">
            <div class="icons">

            <i class="fas fa-plane"></i>

                <div class="content">
                <h3><b>Free Shipping</b></h3>
                <p>Order's Over R300 Are Free</p>
                </div>

            </div>

            <div class="icons">

            <i class="fas fa-lock"></i>

                <div class="content">
                <h3><b> Secure Payment </b></h3>
                <p>100% Secure Payments</p>
                </div>
                
            </div>

            <div class="icons">

            <i class="fas fa-redo-alt"></i>

                <div class="content">
                <h3><b>Easy Returns</b></h3>
                <p>Return Within 10 Days</p>
                </div>
                
            </div>

            <div class="icons">

            <i class="fas fa-headset"></i>

                <div class="content">
                <h3><b>24/7 Customer Support</b></h3>
                <p>Call Us Anytime</p>
                </div>
                
            </div>

            </section>

            <section class = "book-section">
            <section id = "Sale">
                
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                        <h1 class="heading">Our<span>Products</span></h1>

                            <br>
                            <br>
                            
                            
                            <!-- Add the search file name -->
                            <!-- THE SEARCH BAR (DELETED) 

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
                        </div>
                            </div>-->
            </section>
            </section>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            

                            <br>
                            <br>
                            <br>
                            

                              <?php 
                                    include_once('./Database_files/DBConn.php');
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
                                        echo '<section class="product" id="product">';
                                        echo '<div class="product-slider">';
                                            echo '<div class="wrapper">';
                                                echo '<div class="box">';
                                                    echo '<img src='. $Row['img1'] . ' alt="">';
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo '<div class="title">Book Title:'.$Row['title'].'</div>';
                                                    echo '<div class="price">Price: R'. $Row['price'].'</div>';
                                                    echo '<div class="btnCart">';
                                                    echo '<p> add to cart </p>';
                                                    echo '</div>';
                                                    echo '<div class="btnCart">';
                                                    echo '<a style="text-decoration:none; color:black" href="Buyer/send_msg.php?id='.$Row['bookID'].'"><p>Message</p></a>';
                                                    echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</section>';
                                    }
                                        ?>
                                
                                <!-- original

                                echo '<div class= "books">';
                                            echo '<div>Title: ' .$Row['title'] . '</div>';
                                            echo '<div>R '. $Row['price']. '</div>';
                                            echo '<div>';
                                                echo '<img src='. $Row['img1'] . ' width="150" height="200">';
                                            echo '</div>';
                                            echo "<div class = 'btn-book'>
                                                      <button class = 'contact-btn' id='msg-seller'>Contact seller</button>
                                                      <button class = 'cart-btn' id='atc-btn' style='color: white'>Add to cart</button>
                                                </div>";
                                          echo '</div>';
                                -->
            </section>

            <!-- ORIGINAL CODE -->

            <!--<section class="about-us">
                <section id="About"> -->
                    <!--<h1>About Us</h1>
                    <p>Ebook store was established in the cold winter of the year 2022 by 3 disguished gentlemen, Cibbs , AP and Sir Gareth thee End.</p>
                    <h2> Contact Us </h2>
                    <p>
                        Email: Awesomsauce@gmail.com</br>
                        Tel: 069 210 420</br>
                        Location:
                    </p>-->

            <h1 class="heading">Sell Your<span>Books</span></h1>
            <br>
            <br>

            <!-- Sell Section -->
            <section style="color: black" class="getInvolved">
            <section id="Involved">
            <h1 style="color: black;"><b>Sell Your Books</b> </h1>
            <p>Want to sell your books? Then fill in the details of your book below and let us sell them for you</p>

            <!-- Sell Section -->

            <div class="getInvolved">
            <form name="sell-book" action="form_processing/sell_books_fp.php" method="POST" enctype="multipart/form-data">
            
            <div class="Options">
            <label for="Choose_One">What Condition Is The Book In?</label>
            <select name="Choose_One" required id="Choose_One">
                <option value="">Please Choose A Condition</option>
                <option value="bad">Bad</option>
                <option value="good">Good</option>
                <option value="excellent">Excellent</option>
            </select>
            </div>
            
            <div class = "inputField">
            <label for="BookName">Name Of The Book</label>
            <input name="BookName" required type="text" id="FirstName"/>

            <label for="AuthorName">Author Of The Book</label>
            <input name="AuthorName" required type="text" id="LastName"/>

            <label for="Genre">The Book's Genre</label>
            <input name="Genre" required type="text" id="Genre"/>
           
            <label for="Description">Book's Description(Summary)</label>
            <input name="Description" required type="text" id="Description"/>

            <label for="Price">Book's Original Price</label>
            <input name="Price" required type="text" id="Contact_Number"/>

            <label for="Student_Number">Enter Your Student Number</label>
            <input type="text" name="seller" required type="text" id="StudentNumber">
            
            </div>

        <div class="file-select">
        <label for="Book_image">Select The Book Cover: </label>
        <input type="file" name="image" required>
        </div>

        <div class="submit-form">
        <input name="submit" type="submit" value="Submit Enquiry"/>
        </div>
        
            </form>
            </div>
            </section>
            </section>
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <section class="writer" id="writer">
            <h1 class="heading">The <span>Owners</span></h1>
            <br>
            <br>
            <br>
            <div class="box-container">
                <div class="box">
                    <img src="images/Skippy.jpg" alt="">
                    <h3>Cibrian Hofsta</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Distinctio, quo amet labore voluptate maxime tenetur porro
                    </p>
                   <div class="social-media">
                       <i class="fa fa-facebook"></i>
                       <i class="fa fa-instagram"></i>
                       <i class="fa fa-twitter"></i>
                       <i class="fa fa-linkedin"></i>
                       <i class="fa fa-telegram"></i>
                   </div>
                </div>
                <div class="box">
                    <img src="images/Aphiwe1.jpg" alt="">
                    <h3>Aphiwe Meslane</h3>
                    <p>
                        Born in South Africa when he was being born he came out of the womb reading a shakespearn book,
                        at the age of six he graduated from Harvard university and one day he meet 3 other legends 
                        like him and the online bookstore was born.
                    </p>
                    <div class="social-media">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-telegram"></i>
                    </div>
                </div>
                <div class="box">
                    <img src="images/Thomas.jpg" alt="">
                    <h3>Gareth Prinsloo</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Distinctio, quo amet labore voluptate maxime tenetur porro 
                    </p>
                    <div class="social-media">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-telegram"></i>
                    </div>
                </div>
                    <div class="box">
                    <img src="images/Ronny.jpg" alt="">
                    <h3>Aaron Fourie</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Distinctio, quo amet labore voluptate maxime tenetur porro 
                    </p>
                    <div class="social-media">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-telegram"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class ="ourStory">
            <section id="Story">

            <div class = "creation">
                <h2> How EBookStore Came To Be </h2>
                <br>
                <br>
                <p> Gareth write your crazy story here </p>
            </div>
            </section>
        </section>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


    <section class = "footee">
    <section id = "Foot">
    <footer class="footer">
  	 <div class="container">
  	 	<div class="rows">
  	 		<div class="footer-col">
  	 			<h4>EBookStore</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 				<li><a href="#">affiliate program</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Contact Us</h4>
  	 			<ul>
  	 				<li><a href="#"><i class="fa fa-phone"> +21 78 776 1943</i></a></li>
  	 				<li><a href="#"><i class="fa fa-phone"> +21 76 228 9921</i></a></li>
  	 				<li><a href="#"><i class="fa fa-envelope"> EBookStore@gmail.com</i></a></li>
  	 				<li><a href="#"><i class="fa fa-map-marker"> Western Cape, Cape Town</i></a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Book Lovers</h4>
  	 			<ul>
  	 				<li><a href="#">Best Sellers</a></li>
  	 				<li><a href="#">Book Sales</a></li>
  	 				<li><a href="#">Second Hand Books</a></li>
  	 				<li><a href="#">Sell Your Books</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
  	 				<li><a href="#Sale">Book Sales</a></li>
  	 				<li><a href="#Involved">Sell Your Book</a></li>
  	 				<li><a href="./Web_pages/Login.php">Sign up/Login</a></li>
                </ul>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
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
