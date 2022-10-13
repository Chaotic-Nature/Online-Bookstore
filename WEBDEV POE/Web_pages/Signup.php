<html>
      <head>
            <title> Ebook Store SignUp </title>
            <link rel = "stylesheet" href="../styling/LoginStyle.css">
            <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel = "stylesheet" type ="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
      </head>
      <body>
            <section class ="header">
                  <section id="home">
                        <nav>
                             <!-- <input type="checkbox" id="check">
                              <label for ="check" class="checkbtn">
                                    <i class="fas fa-bars"></i>
                              </label>  -->
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

                        <h1> Hello fellow student ! Ready to create your account? </h1>
                        <p>  Enter your student details below ! </p>
                        
                        <div class = "container">
                              <div class = "login-box">
                                    <div class = "row">
                                          <div class= "col-md-6 login-left">
                                                <form action="../form_processing/signup_fp.php" method="POST">
                                                      <div class ="form-group">
                                                            <label for="Fname">First Name</label>
                                                            <input type="text" id="Fname" name="Fname" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="Lname">Last Name</label>
                                                            <input type="text" id="Lname" name="Lname" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="StudentNumber">Student Number</label>
                                                            <input type="text" id="StudentNumber" name="StudentNumber" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="Username">Username</label>
                                                            <input type="text" id="Username" name="Username" class="form-control"placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="Password">Password</label>
                                                            <input type="text" id="Password" name="Password" class="form-control" placeholder="8 characters">
                                                      </div>
                                                      <div class ="form-group">
                                                            <label for="confPwd">Confirm Password</label>
                                                            <input type="text" id="confPwd" name="confPwd" class="form-control" placeholder="...">
                                                      </div>

                                                      <input type="submit" class="btn btn-primary" value="Register" name="submit">
                                                </form>
                                          </div>
                                    </div> 
                              </div>
                        </div>  
                  </section>
            </section>    
      </body>
</html>
            
             



      
