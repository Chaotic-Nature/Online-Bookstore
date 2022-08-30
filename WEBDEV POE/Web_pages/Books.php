<html>
      <head>
            <title> Ebook Store Catalog </title>
      </head>
      <body>
            <ul>
                  <li> <a href="../Index.php"> Home </a> </li>
                  <li> <a href="About.php"> About </a> </li>
                  <li> <a href="Books.php"> Books for sale! </a> </li>
                  <li> <a href="Sell.php"> Sell your books here! </a> </li>
                  <li> <a href="Login.php"> Login/Signup </a> </li>
            </ul>
            <h1> Ready to Learn? </h1>
            <p>
                  Purchase some prestine quality textbooks!
            </p>
            <div class='books-grid'>
                  <?php 
                        include("../Database_files/DBConn.php");//Connecting to the database.

                        $selectQuery = "SELECT * FROM tblBooks;";
                        $selectQueryResult = mysqli_query($DBConn, $selectQuery);//Selecting the books table.
                        if ($selectQueryResult === FALSE)
                        {
                              echo "<p>Unable to select database.</p>\n";
                              echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . mysqli_error($DBConn) . "</p>";
                        }
                        //While loop executes for every book in the books table.
                        //The loop uses html and css to display every book in the table.
                        while (($Row = mysqli_fetch_row($selectQueryResult)) !== null)
                        {
                              echo '<div>';
                              echo '<div>Title: ' .$Row[0] . '</div>';
                              echo '<div>R '. $Row[5]. '</div>';
                              echo '<div>';
                              echo '<img src='. $Row[7] . ' width="150" height="200">';
                              echo '</div>';
                              echo "<div>
                                          <button id='msg-seller'>Contact seller</button>
                                          <button id='atc-btn'>Add to cart</button>
                                    </div>";
                              echo '</div>';
                        }
                  ?>
            </div>
      </body>
</html>
