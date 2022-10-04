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
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
   
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../styling/admin.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    <title>Admin Panel</title>
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">EBooksStore</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../form_processing/admin_logout_fp.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../Web_pages/admindash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                           
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Dashboard
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="books.php">Books</a>
                                            <a class="nav-link" href="Orders.php"> Orders</a>
                                            <a class="nav-link" href="Users.php">Users</a>
                                            <a class="nav-link" href="../form_processing/admin_logout_fp.php"> Logout</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Verification
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#Dashboard"> Student Logins</a></a>
                                            <a class="nav-link" href="../Admin/Users.php"> User Registrations</a>
                                            
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
                </div>
            
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Pending User Registrations</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Signed-up Users</h1>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h1 class="mt-4">Resitsered Students</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    </div>
                    
                
    </main>
</body>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                <div>
                <a href="#">Privacy Policy</a>
                &middot;
               <a href="#">Terms &amp; Conditions</a>
                </div>
                </div>
            </div>
</footer>
</div>

<script>
window.addEventListener('DOMContentLoaded', event => {

// Toggle the side navigation
const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}

});
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>
</html>