<?php session_start();?>

<html>
      <head>
            <title> Ebook Store Catalog </title>
            <link rel = "stylesheet" href="../styling/style.css">
            <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
      <body>
            <section class ="header">
                  <section id="home">
                        <nav>
                             <!-- <input type="checkbox" id="check">
                              <label for ="check" class="checkbtn">
                                    <i class="fas fa-bars"></i>
                              </label> -->
                              <label class = "logo">
                                    <b>EBookStore</b>
                              </label>
                              <div class="nav-links" id="navLinks">
                                    <i class="fa fa-times" onclick="hideMenu()"></i>
                                    <ul>
                                          <li> <a href="../Index.php"> Home </a> </li>
                                          <li> <a href="About.php"> About </a> </li>
                                          <li> <a href="Books.php"> Books for sale! </a> </li>
                                          <li> <a href="Sell.php"> Sell your books here! </a> </li>
                                          <li> <a href="Login.php"> Login/Signup </a> </li>
                                    </ul>
                              </div>
                              <i class ="fa fa-bars" onclick="showMenu()"></i>
                        </nav>
                        <h1> Ready to Learn? </h1>
                        <p>
                              Purchase some prestine quality textbooks!
                        </p>
                        <div class='books-grid'>
                              <?php 
                                    include("../Database_files/DBConn.php");//Connecting to the database.
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
                  </section>
            </section>
      </body>
</html>
