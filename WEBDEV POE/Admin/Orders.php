<?php
	session_start();
	include("../Database_files/DBConn.php");
?>

<!DOCTYPE html>
<html lang="en" dir="Itr" ;>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<script src="https://kit.fontawesome.com/18e4557fb5.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"></script>
		<link href="../styling/Admin.css?v=<?php echo time(); ?>" rel="stylesheet" />
		<link href="../styling/style.css?v=<?php echo time(); ?>" rel="stylesheet" />
		<title>Admin Panel</title>
		
	</head>

	<body>
		<div class="side-menu">

			<!-- Navbar Brand-->
			<h1 class="brand-name"><a href="../Index.php">EBooksStore</a></h1>

			<!-- Navbar-->
			<nav>
				<ul>
					<li><a href="../Web_pages/admindash.php">Dashboard</a></li>
					<li><a href="../Admin/Users.php">Users</a></li>
					<li><a class="nav-link" href="../Admin/books.php">Books</a></li>
					<li><a class="nav-link" href="../Admin/Orders.php">Orders</a></li>
					<li><a class="nav-link" href="../Admin/Messages.php">Messages<i class="fa-solid fa-envelope"><span class="badge text-bg-secondary">4</span></i></a></li>
					<!-- logged in user information -->
					<br>
					<?php
                    if (isset($_SESSION['ADusername'])) : 
					?>
					<div style="color: #fff;text-decoration: none;font-size: 20px; margin-left:40px">
						Logged in as: <?php echo $_SESSION['ADusername']; ?>
					</div>
					<?php endif ?>
					<br>
					<li><a href="../inc_files/logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>

		<div class="container">

<<<<<<< HEAD
			<!-- shows the cards and their info -->
=======
        <!-- Navbar Brand-->
        <h1 class="brand-name"><a href="../Index.php">EBooksStore</a></h1>

        <!-- Navbar-->
        <nav>
            <ul>

                <li><a href="../Web_pages/admindash.php">Dashboard</a></li>
                <li><a href="../Admin/Users.php">Users</a></li>
                <li><a class="nav-link" href="../Admin/books.php">Books</a></li>
                <li><a class="nav-link" href="../Admin/Orders.php">Orders</a></li>
                 <?php

                    $query = mysqli_query($DBConn, "SELECT * from tblmessage");
                    if ($count = mysqli_num_rows($query)) 
                    {
                        echo '<li><a class="nav-link" href="../Admin/view-messages.php">Messages<i class="fa-solid fa-envelope"><span class="badge text-bg-secondary">'.$count.'</span></i></a></li>';
                    }
                    else
                    {
                        echo '<li><a class="nav-link" href="../Admin/view-messages.php">Messages<i class="fa-solid fa-envelope"><span class="badge text-bg-secondary">0</span></i></a></li>';
                    }
                ?>


                <!-- logged in user information -->
                <?php
                if (isset($_SESSION['ADusername'])) : ?>
                    <div class="small">Logged in as:</div>
                    <p><strong><?php echo $_SESSION['ADusername']; ?></strong></p>

                <?php endif ?>
                <li><a href="../inc_files/logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">

        <!-- shows the cards and their info -->

        <div class="content">
            <div class="content-2">
                <div class="new-students">

                    <h1>Orders</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>TBook ID</th>
                                <th>Delivery Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php


                            $query = mysqli_query($DBConn, "SELECT * from tblOrders");
                            if ($total_orders = mysqli_num_rows($query)) {
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['OrderID']; ?></td>
                                        <td><?php echo $row['userID']; ?></td>
                                        <td><?php echo $row['bookID']; ?></td>
                                        <td><?php echo $row['devliveryDate']; ?></td>

                                <?php
                                }
                            } else {
                                echo '<p> No orders</p>';
                            }
                                ?>
                                    </tr>

                        </tbody>
                    </table>
                </div>

            </div>


</body>
>>>>>>> eb40f3d58180d86195e35246a0f279e35f5480b8

			<div class="content">
				<div class="content-2">
					<div class="new-students">
						<h1>Orders</h1>
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>User ID</th>
									<th>TBook ID</th>
									<th>Delivery Date</th>
								</tr>
							</thead>

							<tbody>
								<?php
									$query = mysqli_query($DBConn, "SELECT * from tblOrders");
									if ($total_orders = mysqli_num_rows($query)) {
										while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $row['OrderID']; ?></td>
									<td><?php echo $row['userID']; ?></td>
									<td><?php echo $row['bookID']; ?></td>
									<td><?php echo $row['devliveryDate']; ?></td>
									<?php
										}
										} else {
											echo '<p> No orders</p>';
										}
									?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>