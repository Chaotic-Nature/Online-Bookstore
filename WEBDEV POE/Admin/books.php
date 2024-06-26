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

<<<<<<< HEAD
        <div class="container">
=======
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
>>>>>>> eb40f3d58180d86195e35246a0f279e35f5480b8

        <!-- shows the cards and their info -->
        <div class="content">
            <div class="content-2">
                <div class="new-students">
                    <div>
                        <a id="add-book-btn" href="add-book-form.php">Add book</a>    
                    </div>
                    <h1>Books</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Author</th>
                                <th>Edition</th>
                                <th>Genre</th>
                                <th>Description</th>
                                <th>Condition</th>
                                <th>Seller</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $query = mysqli_query($DBConn, "SELECT * from tblBooks");
                                if ($total_orders = mysqli_num_rows($query)) {
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $row['bookID']; ?></td>
                                <td><?php echo '<img src=../' . $row['img1'] . ' width="150" height="200"; ?>' ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['ed']; ?></td>
                                <td><?php echo $row['genre']; ?></td>
                                <td><?php echo $row['descript']; ?></td>
                                <td><?php echo $row['cond']; ?></td>
                                <td><?php echo $row['seller']; ?></td>
                                <td>
                                    <a id="edit-book-btn" href="edit-book-form.php?id=<?php echo $row['bookID']; ?>">Edit</a>
                                    <a id="delete-book-btn" href="../form_processing/delete_book_fp.php?id=<?php echo $row['bookID']; ?>">Delete</a>

                                </td>
                                <?php
                                    }
                                    } else {
                                        echo '<h1> No Books</h1>';
                                    }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>