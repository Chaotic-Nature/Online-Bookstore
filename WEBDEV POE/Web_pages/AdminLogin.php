<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel = "stylesheet" href="../styling/styleAdmin.css">
            <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            <title> Ebook Store Admin Login </title>
      </head>
      <body style= "color : white">
            <section class ="header">
                  <section id="home">

                  <!-- Navigation menu -->
                        <nav>
                              <label class = "logo"><b>EBookStore</b></label>   

                              <div class="nav-links" id="navLinks">
                                    <i class="fa fa-times" onclick="hideMenu()"></i>
                                    <ul>
                                          <li> <a href="../Index.php"> Home </a> </li>
                                          <li> <a href="AdminLogin.php"> Admin </a> </li>
                                          <li> <a href="Login.php"> Login/Signup </a> </li>
                                    </ul>
                              </div>
                              <i class ="fa fa-bars" onclick="showMenu()"></i>
                        </nav>
                        
                        <section class = "AdminIntro">
                              <hr>
                              <!-- Admin login form -->
                              <div class="box">
                                    <form autocomplete="off" action="../form_processing/admin_login_fp.php" method="POST" >
                                          <h2>ADMIN</h2>
                                          <div class="inputBox">
                                                <input type="text" id="Username" name="Username"  required="required">
                                                <span>Username</span>
                                                <i></i>
                                          </div>

                                          <div class="inputBox">
                                                <input type="password" id="Password" name="Password"  required="required">
                                                <span>Password</span>
                                                <i></i>
                                          </div>

                                          <div class="links">
                                                <a href="#"></a> <!-- Don't delete -->
                                                <a href="../Index.php">Home</a>
                                          </div>
                                          <input type="submit" value="Login" name="submit">
                                    </form>
                              </div>
                        </section>
                  </section>
            </section>
      </body>
</html>
