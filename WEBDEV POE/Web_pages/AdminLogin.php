<html>
      <head>
            <title> Ebook Store Admin Login </title>
            <link rel = "stylesheet" href="../styling/styleAdmin.css">
            <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
       </head>

      <body style= "color : white">
            <section class ="header">
                  <section id="home">
                        <nav>
                             <!-- <input type="checkbox" id="check">
                              <label for ="check" class="checkbtn">
                                    <i class="fas fa-bars"></i>
                              </label> --> 
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

                              <!-- ORIGINAL CODE/ BEFORE CHANGE -->

                              <!--<div class = "container">
                              <div class = "login-box">
                                    <div class = "row">
                                          <div class= "col-md-6 login-left">
                                                <form action="../form_processing/admin_login_fp.php" method="POST" >
                                                      <div class ="form-group">
                                                            <label for="Username">Username</label>
                                                            <input type="text" id="Username" name="Username" class="form-control" placeholder="...">
                                                      </div>
                                                      <div class ="form-group">        
                                                            <label for="Password">Password</label>
                                                            <input type="password" id="Password" name="Password" class="form-control" placeholder="...">
                                                      </div>
                                                      <input type="submit" values="Login" class="btn btn-primary" name="submit">
                                                </form>
                                          </div>
                                    </div>
                              </div>
                        </div>-->

                        <div class="box">
                        <form autocomplete="off" action="../form_processing/admin_login_fp.php" method="POST" >
                        <h2>ADMIN</h2>
                        <div class="inputBox">
                              <!--<input type="text" required="required">-->
                              <input type="text" id="Username" name="Username"  required="required">
                              <span>Username</span>
                              <i></i>
			      </div>

			      <div class="inputBox">
				<!--<input type="password" required="required">-->
                        <input type="password" id="Password" name="Password"  required="required">
				<span>Password</span>
				<i></i>
			      </div>

			      <div class="links">
				<a href="#"></a> <!-- Don't delete -->
				<a href="../Index.php">Home</a>
			      </div>

			      <!--<input type="submit" value="Login">-->
                        <input type="submit" value="Login" name="submit">
		            </form>
	                  </div>
                              </section>
                         </section>
                  </section>
            </body>
</html>
