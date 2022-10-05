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
                      <th scope="col">Category</th>
                      <th scope="col">Condition</th>
				      <th scope="col">Price</th>
                      <th scope="col">Descpription</th>
                      <th scope="col">Image</th>
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
                            echo '<td contenteditable="false">'. $Row['cate'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['cond'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['price'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['descript'] . '</td>';
                            echo '<td contenteditable="false">'. $Row['img1'] . '</td>';
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
    <script src="../js/bstable.js"></script>

<script>
    // Basic example
    var example1 = new BSTable("table1");
    example1.init();

    // Example with a add new row button & only some columns editable & removed actions column label
    var example2 = new BSTable("table2", {
        editableColumns:"1,2",
        $addButton: $('#table2-new-row-button'),
        onEdit:function() {
            console.log("EDITED");
        },
        advanced: {
            columnLabel: ''
        }
    });
    example2.init();

    // Example with dynamic table that requires BSTable refresh
    // TODO Create method to randomly seed a random amount of rows in the table
    var example3 = new BSTable("table3");
    example3.init();

    function dynamicTableValuesExample() {
        // Generate new values for the table and show how BSTable updates
        let names = ['Matt', 'John', 'Billy', 'Erica', 'Sammy', 'Tom', 'Tate', 'Emily', 'Mike', 'Bob'];
        let numberOfRows = Math.floor(Math.random() * 10);

        document.getElementById("table3-body").innerHTML = '';	// Clear current table
        for(let i = 0; i < numberOfRows; i++) {
            let randomNameIndex = Math.floor(Math.random() * 10);

            let row = document.createElement("tr");
            row.innerHTML = `<th scope="row">` + i + `</th><td>Value</td><td>` + names[randomNameIndex] + `</td><td>@twitter</td>`;
            document.getElementById("table3-body").append(row);
        }

        example3.refresh();
    }

</script>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>

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