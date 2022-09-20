<html>
      <head>
            <title> Ebook Store Login </title>
            <link rel = "stylesheet" href="../styling/LoginStyle.css">
            <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel = "stylesheet" type ="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
      </head>

      <body>
            <section class ="header">
                  <section id="home">
                        <nav>
                              <input type="checkbox" id="check">
                              <label for ="check" class="checkbtn">
                                    <i class="fas fa-bars"></i>
                              </label>  
                              <label class = "logo"><b>EBookStore</b></label>   

                              <div class="nav-links" id="navLinks">
                                    <i class="fa fa-times" onclick="hideMenu()"></i>
                                    <ul>
                                          <li> <a href="../Index.php"> Home </a> </li>
                                          <li> <a href="About.php"> About </a> </li>
                                          <li> <a href="Books.php"> Books for sale! </a> </li>
                                          <li> <a href="Sell.php"> Sell your books here! </a> </li>
                                          <li> <a href="Login.php"> Login/Signup </a> </li>
                                    </ul>
                              </div>
                              <i class ="fa fa-bars" onclick="showMenu()"></i>
                        </nav>
                        <hr>
                        <p>  Are you a new student looking to sign up? <a href="Signup.php"> click here</a> </br>
                        for admin login <a href="AdminLogin.php">click here</a>
                        </p>

                        <div class = "container">
                              <div class = "login-box">
                                    <div class = "row">
                                          <div class= "col-md-6 login-left">
                                                <h2> Login Here </h2>
                                                <form action="../form_processing/user_login_fp.php" method="POST">
                                                      <div class ="form-group">
                                                            <label for="StudentNumber">Student Number</label>
                                                            <input type="text" id="StudentNumber" name="StudentNumber" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" id="username" name="username" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="Password">Password</label>
                                                            <input type="password" id="Password" name="Password" class="form-control" placeholder="...">
                                                      </div>
                                                      <input type="submit" value="Login" class="btn btn-primary" name="submit"> 

                                                </form>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </section>
            </section>
      </body>
</html>
