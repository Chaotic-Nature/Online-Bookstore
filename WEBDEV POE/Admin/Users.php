<?php  
      include ("../Database_files/DBConn.php");
?>

<!DOCTYPE html>
<html lang ="en" dir ="Itr";>

<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <script type="text/javascript" src="js/jquery-1.11.0.js"></script>
    <script type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
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
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../Web_pages/admindash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="Users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="books.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Books
                            </a>
                            <a class="nav-link" href="Orders.php">
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
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Users</h1>
                        
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
                                            <th>Surname</th>
                                            <th>StudentNumber</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>StudentNumber</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $sql = "SELECT * from tblUser";
                                    $result = mysqli_query($DBConn,$sql);
                                    if($total_orders = mysqli_num_rows($result)){
                                        while (($Row = mysqli_fetch_assoc($result)) !== null)
                                        {
                                            echo '<tr>';
                                            echo '<td contenteditable="false">'.$Row['fName'].'</td>';
                                            echo '<td contenteditable="false">'. $Row['lName'].'</td>';
                                            echo '<td contenteditable="false">'. $Row['studNum'] . '</td>';
                                            echo '<td><button class="editbtn"><Center><img src="../images/edit.png" alt="Edit image" width="25" height="25"/></Center></button></td>';
                                            echo '<td><button class="deletebtn"><Center><a><img src="../images/trash.png" alt="Delete image" width="25" height="25"/></Center></button></td>';
                                            echo '</tr>';
                                        }
                                    }
                                    else{
                                        echo '<h1> No Orders</h1>';
                                    }
                                    ?>

                                    </tbody>
                                    <button style="position:absolute; right: 1rem; bottom: 1rem" type="button" class="btn btn-primary" onclick="process();">Add User</button>
                                </table>
                                
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
$(document).ready(function () {
      $('.editbtn').click(function () {
          var currentTD = $(this).parents('tr').find('td');
          if ($(this).html() == 'Edit') {                  
              $.each(currentTD, function () {
                  $(this).prop('contenteditable', true)
              });
          } else {
             $.each(currentTD, function () {
                  $(this).prop('contenteditable', false)
              });
          }

          $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')

      });

  });
</script>

</html>