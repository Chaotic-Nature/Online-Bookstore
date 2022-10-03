<?php  
      include ("../Database_files/DBConn.php");
      //The functions file in the inc_files contains the loadTextData function.
      include('../inc_files/functions.php');
      
      //Including the file containing database connection.

      
      $tblUserQuery = "CREATE TABLE tblUser (
          userID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
          fName VARCHAR(20), lName VARCHAR(20), studNum VARCHAR(10), 
          username VARCHAR(20), email VARCHAR (30), pwd VARCHAR(255))"
      ;
      
      checkTableExistence("tblUser", $tblUserQuery);
      
      loadTextData("LOAD DATA LOCAL INFILE '../text_files/userData.txt'
          INTO TABLE tblUser FIELDS TERMINATED BY ','");
      
      function checkTableExistence($tableName, $createTableQuery){
          global $DBConn;
          $showTableQuery = "SHOW TABLES LIKE '$tableName'";
          $showTableQueryResult = mysqli_query($DBConn, $showTableQuery);
          if(mysqli_num_rows($showTableQueryResult) > 0){
              dropTable($tableName);
              create_table($createTableQuery); 
          }
          else{
              create_table($createTableQuery); 
          }  
      }
      
      //This method drops a table.
      function dropTable($tableName){
          global $DBConn;
          $dropTableQuery = "DROP TABLE $tableName";
          $dropTableQueryResult = mysqli_query($DBConn, $dropTableQuery);
          if($dropTableQueryResult == FALSE){
              echo "<p>Couldnt drop table</p>";
          }
      }
      
      //This method creates a table.//
      function create_table($createTableQuery){
          global $DBConn;
          $createTableQueryResult = mysqli_query($DBConn, $createTableQuery);
          if($createTableQueryResult === FALSE){
              echo "<p>Error code: " . mysqli_errno($DBConn) . " : " 
              . mysqli_error($DBConn) . "</p>";
          }
      }
//Variables created.
$tableAdmin = "tblAdmin";
$tableBooks = "tblBooks";
$tableOrders = "tblOrders";

//Queries to create tables in bookstore.
//Admin table.
$adminQuery = "CREATE TABLE $tableAdmin (
    AD_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    AD_fName VARCHAR(20),AD_lName VARCHAR(20),
    AD_num VARCHAR(10), AD_username VARCHAR(20),
    AD_email VARCHAR(25), AD_pwd VARCHAR(255));"
;
//Books table.
$booksTableQuery = "CREATE TABLE $tableBooks (
    bookID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(100), author VARCHAR(30), 
    ed VARCHAR(4), cate VARCHAR(8), 
    cond VARCHAR(13), price VARCHAR(10), 
    descript VARCHAR(150), img1 VARBINARY(255));"
;
//Order table
$orderTableQuery = "CREATE TABLE $tableOrders (
    order_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL REFERENCES tblUser(userID),
    bookID INT NOT NULL REFERENCES tblBooks(bookID), 
    deliveryDate DATE);"
;

/*This method checks if a table exists, deletes it if
it does, and recreates it with the dummy text file data. 
It takes arguments for the name of the table to be created and 
the sql query to create it. The method can be found in CreateTable.php*/
checkTableExistence($tableAdmin, "$adminQuery");
checkTableExistence($tableBooks, "$booksTableQuery");
checkTableExistence($tableOrders, "$orderTableQuery");

//the loadTextData loads text file data into the database. The code for
//this function exists in the functions.php file.
loadTextData("LOAD DATA LOCAL INFILE '../text_files/adminData.txt' 
INTO TABLE $tableAdmin FIELDS TERMINATED BY ','");

loadTextData("LOAD DATA LOCAL INFILE '../text_files/bookData.txt'
INTO TABLE $tableBooks FIELDS TERMINATED BY ',,'");

loadTextData("LOAD DATA LOCAL INFILE '../text_files/orderData.txt'
INTO TABLE $tableOrders FIELDS TERMINATED BY ','");
?>
<!DOCTYPE html>
<html lang ="en" dir ="Itr";>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styling/admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
    <nav>
        <div class="brand-name">
            <h1>Ebook Store</h1>
        </div>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                    <! -- here is what is being displayed on the dashboard -->
                        <li><a href="#Dashboard"> Dashboard</a></li>
                        <li><a href="#Users"> Users</a></li>
                        <li><a href="#Books"> Books</a></li>
                        <li><a href="#Orders"> Orders</a></li>
                        <li><a href="../form_processing/admin_logout_fp.php"> Logout </a> </li>

                    </ul>
                </div>
                    <i class ="fa fa-bars" onclick="showMenu()"></i>

        </nav>
    </div>

    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                <! -- non functional search bar can remove if not needed -->
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="../images/search.png" alt=""></button>
                </div>
                <! -- manage users -->
                        <div class="user">
                    <a href="#" class="btn">manage users</a>
                    <img src="../images/user.png" alt="">
                    <div class="img-case">
                        <img src="../images/book.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <! -- shows the cards and their info -->
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <?php 
                        $sql = "SELECT * from tblUser";
                        $result = mysqli_query($DBConn,$sql);
                        if($total_users = mysqli_num_rows($result)){
                            echo '<h1> '.$total_users.' </h1>';
                        }
                        else{
                            echo '<h1> No Users</h1>';
                        }
                        ?>
                        <h3>Users</h3>
                    </div>
                    </div>   
                <div class="card">
                    <div class="box">
                    <?php 
                        $sql = "SELECT * from tblBooks";
                        $result = mysqli_query($DBConn,$sql);
                        if($total_books = mysqli_num_rows($result)){
                            echo '<h1> '.$total_books.' </h1>';
                        }
                        else{
                            echo '<h1> No Books</h1>';
                        }
                        ?>
                        <h3>Books</h3>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="box">
                    <?php 
                        $sql = "SELECT * from tblOrders";
                        $result = mysqli_query($DBConn,$sql);
                        if($total_orders = mysqli_num_rows($result)){
                            echo '<h1> '.$total_orders.' </h1>';
                        }
                        else{
                            echo '<h1> No Orders</h1>';
                        }
                        ?>
                        <h3>Orders</h3>
                    </div>
                    
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Purchases</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table> 
                        <tr>
                            <th>Name</th>
                            <th>Book</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>*</td>
                            <td>R50</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Liam</td>
                            <td>*</td>
                            <td>R20</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>*</td>
                            <td>R79</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Rick</td>
                            <td>*</td>
                            <td>R60</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Doe</td>
                            <td>*</td>
                            <td>R90</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Users</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            
                            <th>Name</th>
                            <th>Surname</th>
                            <th>StudentNumber</th>
                        </tr>
                        <tr>
                            
                            <td>Arthur</td>
                            <td>Steve</td>
                            <td>ST11111111</td>
                        </tr>
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
                var navLinks = document.getElementById("navLinks");
                function showMenu() {
                    navLinks.style.right = "0";
                }
                function hideMenu() {
                    navLinks.style.right = "-200px";
                }
            </script>

</html>