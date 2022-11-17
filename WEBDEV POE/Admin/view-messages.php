<?php
session_start();
include("../Database_files/DBConn.php");

if(isset($_POST['submit'])){
    $msg = $_POST['reply_msg'];
    $date = date('y-m-d h:i:s');
    $status = 1;
    $id = $_POST['id'];
    $U_status = 3;
    $sql_INSERT = mysqli_query($DBConn, "INSERT INTO tbladminmsg(userID, msg, status, cr_date) VALUES('$id', '$msg', '$status', '$date')");
    $sql_UPDATE_TBL_USER = mysqli_query($DBConn, "UPDATE tblmessage SET status = 3 WHERE userID = '$id'");
    if($sql_INSERT)
    {
        header('location:../Buyer/inbox.php?id=<?php echo '.$id.';?> message=reply sent successfully"');

    }
    else{
        echo mysqli_error($DBConn);
        exit;
    }
}
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
    

    <title>View Messages Page</title>
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

        <!-- shows the cards and their info -->

        <div class="content">
            <div class="content-2">
                <div class="new-students">

                    <h1>Messages</h1>
                    <?php
                    $query = mysqli_query($DBConn, "SELECT * from tblmessage WHERE status!=3");
                    if ($total_orders = mysqli_num_rows($query)) {
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                                        
                        <form method="POST" action="../Admin/view-messages.php?id=<?php echo $row['userID']; ?>">
                                
                                <div id ="margin-container">
                                    <div class="user-details">
                                        <div id="background">
                                            <div class="input-box">
                                                <input id="user_name" type="text" name="name" placeholder="name" value="<?php echo $row['name']; ?> " readonly>
                                            </div>
                                            <div class="input-box">
                                                <input type="hidden" name="id" placeholder="id" value="<?php echo $row['userID']; ?> " readonly>
                                            </div>
                                            <div id="msg-sent-wrapper">
                                                <div class="input-box">
                                                    <input id="msg-area" type="text" name="msg" placeholder="message" value="<?php echo $row['msg']; ?> " readonly></textarea>
                                                </div>
                                                
                                                <div class="input-box">
                                                    <input id="TimeBox" type="text" name="send_date" placeholder="message" value="<?php echo $row['cr_date']; ?> " readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="reply-heading"class="details">Enter Reply </span>
                                        <textarea class="form-control" rows="3" name="reply_msg" required></textarea>  
                                        </div>
                                    <div class="button">
                                    <input type="submit" name="submit" value="Send Message">
                                    </div>
                                </div>
                            </form>
                                                        
                                        

                                <?php
                                }
                            } else {
                                echo '<p> No Messages</p>';
                            }
                                ?>
                        </div>
                        </div>  
                </div>

            </div>


</body>


</html>