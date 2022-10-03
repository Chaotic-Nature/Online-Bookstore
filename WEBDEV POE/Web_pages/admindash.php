<?php  
      include ("../Database_files/DBConn.php");
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
                    <!-- here is what is being displayed on the dashboard -->
                        <li><a href="#Dashboard"> Dashboard</a></li>
                        <li><a href="#Users"> Users</a></li>
                        <li><a href="#Books"> Books</a></li>
                        <li><a href="#Orders"> Orders</a></li>
                        <li><a href="../form_processing/admin_logout_fp.php"> Logout </a></li>
                    </ul>
                </div>
                <i class ="fa fa-bars" onclick="showMenu()"></i>
            </nav>
        </div>

        <div class="container">
            <div class="header">
                <div class="nav">
                    <div class="search">
                    <!-- non functional search bar can remove if not needed-->
                        <input type="text" placeholder="Search..">
                        <button type="submit"><img src="../images/search.png" alt=""></button>
                    </div>
                    <!-- manage users -->
                    <div class="user">
                        <a href="#" class="btn">manage users</a>
                        <img src="../images/user.png" alt="">
                        <div class="img-case">
                            <img src="../images/book.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- shows the cards and their info -->
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
                                <?php 
                                    $sql = "SELECT * from tblUser WHERE verified='n'";
                                    $result = mysqli_query($DBConn,$sql);
                                    if($total_orders = mysqli_num_rows($result)){
                                        while (($Row = mysqli_fetch_assoc($result)) !== null)
                                        {
                                            echo '<tr>';
                                            echo '<td>'.$Row['fName'].'</td>';
                                            echo '<td>'. $Row['lName'].'</td>';
                                            echo '<td>'. $Row['studNum'] . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    else{
                                        echo '<h1> No Orders</h1>';
                                    }
                                ?>
                            </table>
                        </div>
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
