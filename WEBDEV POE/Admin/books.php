<?php  
    session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
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
                        <li><a class="dropdown-item" href="../inc_files/logout.php">Logout</a></li>
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
                    </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <!-- logged in user information -->
                        <?php  
                        if (isset($_SESSION['ADusername'])) : ?>
                        
                        <p><strong><?php echo $_SESSION['ADusername']; ?></strong></p>
                        
                        <?php endif ?>
                            
                    </div>
                    <a class="nav-link" href="../inc_files/logout.php"> Logout</a>
                    
                    
                    
                </nav>
                </div>
        
            
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">



    <main role="main" class="container" style="margin-top:20px;">

    	<div style="margin-top:20px;">
    		<h2>Books</h2>
    		<button id="table2-new-row-button" class="btn btn-dark">Add New Book</button>
		  	<table class="table table-striped table-bordered" id="table2">
			  	<thead class="thead-dark">
				    <tr>
                    <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Author</th>
				      <th scope="col">Edition</th>
                      <th scope="col">Genre</th>
                      <th scope="col">Description</th>
				      <th scope="col">Image</th>
                      <th scope="col">Condition</th>
                      <th scope="col">Seller</th>
				    </tr>
			  	</thead>
			  	<tbody>
                  <?php 
                    $sql = "SELECT * from tblBooks";
                    $result = mysqli_query($DBConn,$sql);
                    if($total_orders = mysqli_num_rows($result)){
                        while (($Row = mysqli_fetch_assoc($result)) !== null)
                        {
                            echo '<tr>';
                            echo '<td contenteditable="false">'.$Row['bookID'].'</td>';
                            echo '<td contenteditable="false">'.$Row['title'].'</td>';
                            echo '<td contenteditable="false">'. $Row['author'].'</td>';
                            echo '<td contenteditable="false">'. $Row['ed'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['genre'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['descript'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['img1'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['cond'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['seller'] . '</td>';
                            echo '</tr>';
                        }
                        }
                        else{
                            echo '<h1> No Orders</h1>';
                        }
                    ?>
			  	</tbody>
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

</script>

</html>