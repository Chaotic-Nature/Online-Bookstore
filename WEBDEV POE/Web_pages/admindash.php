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
        <link href="../styling/style.css?v=<?php echo time(); ?>" rel="stylesheet" />
        <link href="../styling/Admin.css?v=<?php echo time(); ?>" rel="stylesheet" />
        <title>Admin Panel</title>
    </head>

    <body>
        <div class="side-menu">

            <!-- Navbar Brand-->
            <h1 class="brand-name"><a href="../Index.php">EBooksStore</a></h1>

            <!-- Navbar Search-->

            <!-- Navbar-->
            <nav>
                <ul>

                    <li><a class="nav-link" href="../Web_pages/admindash.php">Dashboard</a></li>
                    <li><a class="nav-link" href="../Admin/Users.php">Users</a></li>
                    <li><a class="nav-link" href="../Admin/books.php">Books</a></li>
                    <li><a class="nav-link" href="../Admin/Orders.php">Orders</a></li>
                    <li><a class="nav-link" href="../Admin/Messages.php">Messages<i class="fa-solid fa-envelope"><span class="badge text-bg-primary">4</span></i></a></li>   
                    
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
                    <li><a class="nav-link" href="../inc_files/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>


        <div class="container">

            <!-- shows the cards and their info -->

            <div class="content">
                <div class="content-2">
                    <div class="new-students">
                        <h1>Student Login Verifications</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Student Surname</th>
                                    <th>Student Number</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Verified</th>
                                    <?php
                                        $sql = "SELECT COUNT(1) verified from tblUser WHERE verified = 'n' ";
                                        $result = mysqli_query($DBConn, $sql);
                                        while (($Row = mysqli_fetch_assoc($result)) !== null) {
                                            echo '<th>' . "Action" . '</th>';
                                        }

                                    ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $sql = "SELECT * from tblUser";
                                    $result = mysqli_query($DBConn, $sql);
                                    if ($total_orders = mysqli_num_rows($result)) {
                                        while (($Row = mysqli_fetch_assoc($result)) !== null) {
                                            echo '<tr>';
                                            echo '<td>' . $Row['userID'] . '</td>';
                                            echo '<td>' . $Row['fName'] . '</td>';
                                            echo '<td>' . $Row['lName'] . '</td>';
                                            echo '<td>' . $Row['studNum'] . '</td>';
                                            echo '<td>' . $Row['email'] . '</td>';
                                            echo '<td>' . $Row['username'] . '</td>';
                                            echo '<td>' . $Row['verified'] . '</td>';
                                            if ($Row['verified'] == 'n') {
                                                echo '<td><a id="verify-btn" href="../Admin/verify_user_form.php">Verify</a></td>';
                                            }


                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<h1> No Verified Students</h1>';
                                    }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="new-students">
                        <h1>Pending Student Login Verifications</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Password length</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    include ("../inc_files/functions.php");
                                    include ("../Database_files/DBConn.php");
                                    
                                    if(isset($_POST['submit']))
                                    {
                                        $id=$_GET['id'];
                                        $username = $_POST['Username'];
                                        $password = $_POST['Password'];
                                    
                                            echo '<tr>';
                                            echo '<td'. $id . '</td>';
                                            echo '<td'. $username . '</td>';
                                            echo '<td>' . strlen($password) . '</td>';
                                            if ($Row['verified'] == 'n') {
                                                echo '<td><a id="verify-btn" href="../Admin/verify_user_form.php">Verify</a></td>';
                                            }
                                            echo '</tr>';
                                        }
                                    else {
                                        echo '<p> No pending Student verifications</p>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>