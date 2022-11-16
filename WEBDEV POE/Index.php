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
        <script src="https://kit.fontawesome.com/18e4557fb5.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"></script>
        <link rel = "stylesheet" href="styling/style.css?v=<?php echo time();?>">
        
        <!-- FONT -->
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- THE ICONS -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        
        <link rel="stylesheet" href="css/font-awesome.css?v=<?php echo time();?>">
    </head>
    <body style="font-family : Verdana, sans-serif">
        <section class ="header">
            <section id="home">
                <nav>
                    <label class = "logo">
                        <b>EBookStore</b>
                    </label>   
                    <!-- NAVIGATION MENU -->
                    <div class="nav-links" id="navLinks">
                        <i class="fa fa-times" onclick="hideMenu()"></i>
                        <ul>
                            <?php 
                                if (isset($_SESSION['studentNumber'])){
                                    echo '<li> <a href="Index.php"> Home </a> </li>';
                                    echo '<li> <a href="#writer"> About Us</a> </li>';
                                    echo '<li> <a href="#Sale"> Books for sale! </a> </li>';
                                    echo '<li> <a href="#Involved"> Sell your books here! </a> </li>';
                                    echo '<li> <a href="inc_files/logout.php"> Logout </a> </li>';
                                    $query = mysqli_query($DBConn, "SELECT * from tblmessage");
                                    if ($count = mysqli_num_rows($query)) 
                                    {
                                        echo '<li><a class="nav-link" href="Buyer/inbox.php?id='. $_SESSION['id'] .'"><i class="fa-solid fa-envelope"><span class="badge text-bg-secondary">  '.$count.'</span></i></a></li>';
                                    }
                                    else
                                    {
                                        echo '<li><a class="nav-link" href="Buyer/inbox.php?id='. $_SESSION['id'] .'"<i class="fa-solid fa-envelope"><span class="badge text-bg-secondary">0</span></i></a></li>';
                                    }
                                    $query = mysqli_query($DBConn, "SELECT * from tblorders");
                                    if ($count = mysqli_num_rows($query)) 
                                    {
                                        echo '<li> <a href="Web_pages/cart.php?id='. $_SESSION['id'] .'"> <i class="fas fa-shopping-cart"></i> <span id="count">   '.$count.'</span></a> </li>';
                                    }
                                    else
                                    {
                                        echo '<li> <a href="Web_pages/cart.php?id='. $_SESSION['id'] .'"> <i class="fas fa-shopping-cart"></i> <span id="count">0</span></a> </li>';
                                    }
                                    
                                }
                                else{
                                    //when the user is logged out it displays these links//
                                    echo'<li> <a href="Index.php"> Home </a> </li>';
                                    echo'<li> <a href="#writer"> About </a> </li>';
                                    echo'<li> <a href="#Sale"> Books for sale! </a></li>';
                                    echo'<li> <a href="./Web_pages/Login.php"> Login/Signup </a> </li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <i class ="fa fa-bars" onclick="showMenu()"></i>
                </nav>
                <hr>
                <!--If the user is logged in it displays their name, if not then it displays a generic welcome message-->
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
        <!-- This section displays icons for free shipping, secure payments, returns, and customer support-->
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
        <!-- This section displays the books that are available for sale from the database-->
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
        </section>

        <!-- This section displays a sell form which allows users to sell their books. -->

        <h1 class="heading">Sell Your<span>Books</span></h1>
        <br>
        <br>
        <section style="color: black" class="getInvolved">
            <section id="Involved">
                <h1 style="color: black;"><b>Sell Your Books</b> </h1>
                <p>Want to sell your books? Then fill in the details of your book below and let us sell them for you</p>
                
                <div class="getInvolved">
                    <form action="form_processing/sell_books_fp.php" method="POST" enctype="multipart/form-data">
        
                        <div class="Options">
                            <label for="Choose_One">What Condition Is The Book In?</label>
                            <select name="condition" required id="condition">
                                <option name="condition" value="">Please Choose A Condition</option>
                                <option name="condition" value="bad">Bad</option>
                                <option name="condition" value="good">Good</option>
                                <option name="condition" value="excellent">Excellent</option>
                            </select>
                        </div>
            
                        <div class = "inputField">
                            <label for="title">Name Of The Book</label>
                            <input name="title" required type="text" id="title"/>

                            <label for="author">Author Of The Book</label>
                            <input name="author" required type="text" id="author"/>

                            <label for="genre">The Book's Genre</label>
                            <input name="genre" required type="text" id="genre"/>

                            <label for="edition">The Book's Edition</label>
                            <input type="number" name="edition" maxlength="4" id="edition"/>
                        
                            <label for="description">Book's Description(Summary)</label>
                            <input name="description" required type="text" maxlength="150" id="description"/>

                            <label for="price">Price</label>
                            <input name="price" required type="text" id="price"/>

                            <label for="Student_Number">Enter Your Student Number</label>
                            <input type="text" name="seller" required type="text" id="seller">
                        </div>

                        <div class="file-select">
                            <label for="Book_image">Select The Book Cover: </label>GIR
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

        <!-- About section that gives information on the websites creators -->

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
                        After finishing my schooling career in South Africa, my home country, I enrolled for a 3 year
                        strenuous software development course. After i successfully graduated, I decided to embark on a mission
                        to make full use of the programming skills and techniques that I've learned along the journey
                        to work with an elite team of developers to give rise to remarkable web applications that
                        would set a new industry standard. Welcome to our first creation.
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
                    During a dark stormy night in South Africa, a child by the name of Aphiwe was born. 
                    This would be a name that would be known throughout the entire world. He was incredibly 
                    intelligent even at a young age, so much so that he graduated from Harvard University 
                    at the age of six. When he was a young man he Felt bored with everything so he went on 
                    a long journey and on that journey he found 3 young gentleman like him who also enjoyed 
                    reading and the EBookstore was born
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
                        I was born and raised on the continient of Fubaslter , a place where books held powerful 
                        meanings and conveyed ones status in society. 
                        All my life i have sought knowledge and this is what books brought me , but beware .
                         Knowledge comes at a price... usually in the form of a 2 for one special at 599.
                        but i digress, my name is gareth and this is but a humble tale of how a young man made
                         it big selling books. if you want to hear more follow my ig @ greatestmadladgarry. 
                        
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
                    Hey there I'm Aaron. I'm a second year software developer studying at Rosebank College.
                     I used to watch a lot of anime but now I spend most of my time playing guitar.  
                     Nothing beats chilling with the bois tho. We could be broke on a deserted island, or
                      it could be a zombie apocalypse and we'd still be talking chilling like chin chillas.
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

        <!-- About section that gives information on how the store came to be. -->

        <section class ="ourStory">
                <section id="Story">
                    <div class = "creation">
                        <h2> How EBookStore Came To Be </h2>
                        <br>
                        <br>
                        <p>    It was a cold and gloomy winter when 4 young men entered a bookstore ...</br>
                            They stumbled across each other and found that they all had a hot burning passion for books.</br>
                            So they started an online store together to share their passion with the world.    
                        </p>
                    </div>
                </section>
            </section>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <!-- Footer containing generic footer information -->

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
                    </footer>
                </section>
            </section>

            <!-- Javascript controls the navigation menu -->

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
