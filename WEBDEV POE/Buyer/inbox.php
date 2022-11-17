
<?php 
session_start();
include_once('../Database_files/DBConn.php');

if(isset($_SESSION['studentNumber'])){
  $id=$_GET['id'];

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ebook Store Home </title>
    <link rel = "stylesheet" href="../styling/style.css?v=<?php echo time();?>">
    <script src="https://kit.fontawesome.com/18e4557fb5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"></script>

    <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
    <section class ="header">
    
      <section id="home">
        
        <nav>
          <!--<input type="checkbox" id="check">
          <label for ="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label>-->
          <label class = "logo"><b>EBookStore</b></label>
          <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
              <li><a href="../Index.php?id=<?php echo $id;?>"><span><i class="fa-solid fa-house"></i></span> Home </a> </li>
              <li> <a href="./send_msg.php?id=<?php echo $id;?>"><span><i class="fa-solid fa-plus"></i></span> Create new </a> </li>
              <?php
              $query = mysqli_query($DBConn, "SELECT * from tbladminmsg WHERE userID='$id' AND status=1");
               if ($total_orders = mysqli_num_rows($query)) {
                if ($count = mysqli_num_rows($query)) 
                {
                  echo '<li> <a href="./inbox.php?id=<?php echo $id;?>"><span><i class="fa-solid fa-inbox"></i></span> Inbox <span id="count">'.$count.'</span></a> </li>';
                }
                else
                {
                  echo '<li> <a href="./inbox.php?id=<?php echo $id;?>"><span><i class="fa-solid fa-inbox"></i></span> Inbox <span id="count">0</span></a> </li>';
                }
              }
              ?>
              
            </ul>
          </div>
          <i class ="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <hr>
        <div id="inbox-wrapper">
          <div id ="recent-msg-wrapper1">
              <div id="heading">
              <h1 class="heading">Your<span>Inbox</span></h1>
                
                <div id="update"><button onClick="window.location.href=window.location.href" class="visit-btn">Refresh<span><i class="fa-solid fa-arrows-rotate"></i></span></button></div>               
                <hr>
              </div>     
              
              <?php
                if(isset($_SESSION['studentNumber'])){
                  $id=$_GET['id'];
                  $query = mysqli_query($DBConn, "SELECT * FROM tbladminmsg WHERE userID='$id' AND status=1");
                  if ($total_orders = mysqli_num_rows($query)) {
                    while (($Row = mysqli_fetch_assoc($query))) {
                      echo '<div id="wrapper">';
                      echo '<div class="msg">'.$Row['msg'].'</div>';
                      echo '<div class="time-sent">'.$Row['cr_date'].'</div>';
                      echo '</div>';
                    }
                  }
                  else
                  {
                    echo '<div id="wrapper">';
                      echo '<div class="msg-status">No messages  <br><br>Send a message and we will get back to you';
                      
                      echo '</div>';
                    echo '</div>';
                  }

                }
              
                else
                {
                  echo '<script>alert("Login to access message content")</script>';
                  echo '<script>window.location.href ="../Web_pages/Login.php"</script>';
                }
              ?>
          </div>    
          </div>
          </section>
        <!--<div class="container" id="center">
          <div class="title">Check book availability form</div>
          <div class="content">
            <form action="send_msg.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
              <div class="user-details">
                <div class="form-group">
                  <span class="details">Name</span>
                  <input type="textarea" name="name" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                  <span class="details">Enter Message</span>
                  <textarea class="form-control" rows="5" name="msg" required></textarea>  
                </div>             
              <div class="button">
                <input type="submit" name="submit" value="Send">
              </div>
            </form>
          </div>
          </div>-->
      </section>
    </section>
    <script>
    var navLinks = document.getElementById("navLinks");
    function showMenu() {
    navLinks.style.right = "0";
    }
    function hideMenu() {
    navLinks.style.right = "-200px";
    }
    </script>
  </body>
</html>
