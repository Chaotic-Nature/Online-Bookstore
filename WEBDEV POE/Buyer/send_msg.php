
<?php 
session_start();
include_once('../Database_files/DBConn.php');
$id=$_GET['id'];

	$query=mysqli_query($DBConn,"SELECT * from tblBooks where bookID='$id'");
	$row=mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    $date = date('y-m-d h:i:s');
    $sql_INSERT = mysqli_query($DBConn, "INSERT INTO tblmessage(name, msg, cr_date) VALUES('$name', '$msg', '$date')");
    if($sql_INSERT)
    {
        header('location:../Admin/view-messages.php?message=message send successfully"');
    }
    else{
        echo mysqli_error($DBConn);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ebook Store Home </title>
    <link rel = "stylesheet" href="../styling/style.css">
    <link rel = "stylesheet" href="../styling/form.css?v=<?php echo time();?>">
    <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/18e4557fb5.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"></script>
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
              <li> <a href="../Index.php"> Home </a> </li>
              <li> <a href="./send_msg.php?id=<?php echo $id;?>"><span><i class="fa-solid fa-plus"></i></span> Create new </a> </li>
              <li> <a href="./inbox.php?id=<?php echo $id;?>"><span><i class="fa-solid fa-inbox"></i></span> Inbox <span id="count">0</span></a> </li>
            </ul>
          </div>
          <i class ="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <hr>
        <div class="container" id="center">
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
                  <textarea class="form-control" rows="3" name="msg" required></textarea>  
                </div>
              

              <div class="button">
                <input type="submit" name="submit" value="Send Message">
              </div>
            </form>
          </div>
          </div>
        </div>
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
