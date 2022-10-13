<?php
session_start();
include("../Database_files/DBConn.php");

?>

<!DOCTYPE html>
<html lang="en" dir="Itr" ;>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="../styling/Admin.css?v=<?php echo time(); ?>" rel="stylesheet" />
    <link href="../styling/style.css?v=<?php echo time(); ?>" rel="stylesheet" />

    <title>Admin Panel</title>
    <style>

    </style>
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
                <li><a class="nav-link" href="../Admin/Orders.php">Updates</a></li>


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
                    <div>
                        <a id="add-book-btn" href="add-user-form.php">Add User</a>    
                    </div>


                    <h1>Users</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>UserId</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Student Number</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php


                            $query = mysqli_query($DBConn, "SELECT * from tblUser");
                            if ($total_orders = mysqli_num_rows($query)) {
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['userID']; ?></td>
                                        <td><?php echo $row['fName']; ?></td>
                                        <td><?php echo $row['lName']; ?></td>
                                        <td><?php echo $row['studNum']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['pwd']; ?></td>
                                        <td>
                                            <a id="edit-book-btn" href="edit-user-form.php?id=<?php echo $row['userID']; ?>">Edit</a>
                                            <a id="delete-book-btn" href="../form_processing/delete_user_fp.php?id=<?php echo $row['userID']; ?>">Delete</a>

                                        </td>
                                <?php
                                }
                            } else {
                                echo '<h1> No Users</h1>';
                            }
                                ?>
                                    </tr>

                        </tbody>
                    </table>
                </div>

            </div>


</body>


</html>