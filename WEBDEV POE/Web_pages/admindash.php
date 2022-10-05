<?php  
      include ("../Database_files/DBConn.php");
?>

<!DOCTYPE html>
<html lang ="en" dir ="Itr";>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <title>Admin Panel</title>
        <style>

        </style>
    </head>
    <body>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../Index.php">EBooksStore</a>
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
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../Web_pages/admindash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="../Admin/Users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="../Admin/books.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Books
                            </a>
                            <a class="nav-link" href="../Admin/Orders.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Orders
                            </a>
                            
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="../Admin/Orders.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Updates
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>

                            
                        </div>
                    </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <!-- logged in user information -->
                        <?php  
                        include("../form_processing/admin_login_fp.php");
                        if (isset($_SESSION['Username'])) : ?>
                        
                        <p><strong><?php echo $_SESSION['Username']; ?></strong></p>
                        
                        <?php endif ?>
                            
                    </div>
                    <a class="nav-link" href="../form_processing/admin_logout_fp.php"> Logout</a>
                </nav>
                </div>
       
        
                <div id="layoutSidenav_content">
                <main>
               
            <!-- shows the cards and their info -->
            <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card bg-primary text-white mb-4">
                                <h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>100</strong></h2>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/checkout.png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">New Orders</div>
                                    
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card bg-warning text-white mb-4">
                                <h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>100</strong></h2>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/registrations.png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">User Registrations</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card bg-success text-white mb-4">
                                <h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>100</strong></h2>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/sale.png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">Currently Sold Books</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card bg-danger text-white mb-4">
                                <h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>100</strong></h2>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/wall-clock.png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">Pending Student Login Verifications</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card text-grey mb-4">
                                <?php 
                                    $sql = "SELECT * from tblOrders";
                                    $result = mysqli_query($DBConn,$sql);
                                        if($total_Orders = mysqli_num_rows($result)){
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>'.$total_Orders.'</strong></h2>';
                                        }
                                        else{
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong> No Orders</strong></h2>';
                                        }
                                ?>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/to-do-list (1).png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">Orders</div> 
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card text-grey mb-4">
                                
                                <?php 
                                    $sql = "SELECT * from tblAdmin";
                                    $result = mysqli_query($DBConn,$sql);
                                        if($total_Admins = mysqli_num_rows($result)){
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>'.$total_Admins.'</strong></h2>';
                                        }
                                        else{
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong> No Admins</strong></h2>';
                                        }
                                ?>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/to-do-list (1).png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">Admins</div> 
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card text-grey mb-4">
                                <?php 
                                    $sql = "SELECT * from tblBooks";
                                    $result = mysqli_query($DBConn,$sql);
                                        if($total_Books = mysqli_num_rows($result)){
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>'.$total_Books.'</strong></h2>';
                                        }
                                        else{
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong> No Books</strong></h2>';
                                        }
                                ?>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/to-do-list (1).png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">Available Books</div> 
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div style="display:block" class="card text-grey mb-4">
                                <?php 
                                    $sql = "SELECT * from tblUser";
                                    $result = mysqli_query($DBConn,$sql);
                                        if($total_users = mysqli_num_rows($result)){
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong>'.$total_users.'</strong></h2>';
                                        }
                                        else{
                                        echo '<h2 style="text-align:justify; margin-left:15px; display:inline-flex" class="mt-4"><strong> No Users</strong></h2>';
                                        }
                                ?>
                                <img style="position:absolute; right: 2rem; top:2rem" src="../images/to-do-list (1).png" alt="Registrations Icon" width="70" height="70">
                                    <div class="card-body">Students</div> 
                                </div>
                            </div>
                        </div>
                        
                        <h1 class="mt-4">Activity List</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Task Category</th>
                                            <th>Task Name</th>
                                            <th>Task Status</th>
                                            <th>Quick Link</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Task Category</th>
                                            <th>Task Name</th>
                                            <th>Task Status</th>
                                            <th>Quick Link</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td>User</td>
                                        <td>Add User</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Edit User</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Delete User</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td>Book</td>
                                        <td>Add Book</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Edit Book</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Delete Book</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td>Order</td>
                                        <td>Add Order</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Edit Order</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Delete Order</td>
                                        <td>Task Status</td>
                                        <td>Link</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        </main>
    </body>
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
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
