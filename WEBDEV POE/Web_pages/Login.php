<html>
    <head>
        <title>Login and Register</title>
        <link rel="stylesheet" href="../styling/LoginStyle.css">
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>

        <div class="header">
            <nav>
                <label class = "logo">
                   <b>EBookStore</b>
                </label>   

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
                
                    <div class="form-box">
                        <div class="button-box">
                            <div id="btn"></div>
                            <button type="button" class="toggle-btn" onclick="login()">Login</button>
                            <button type="button" class="toggle-btn" onclick="register()">Register </button>
                        </div>

                <form id = "login" class="input-group" action="../form_processing/user_login_fp.php" method="POST">
                    
                    <input type="text" id="StudentNumber" name="StudentNumber" class="input-field" placeholder="Enter Student Number" required> 
                    <input type="text" id="username" name="username" class="input-field" placeholder="Enter Username" required>
                    <input type="password" id="Password" name="Password" class="input-field" placeholder="Enter Password" required>
                    
                    <button type="submit" style="color:aliceblue" class= "submit-btn" name="submit">Login</button>
                    <!-- original <input type="submit" value="Login" class="btn btn-primary" name="submit"> -->

                </form>

                <form id="register" class="input-group" action="../form_processing/signup_fp.php" method="POST">
                
                <input type="text" id="Fname" name="Fname" class="input-field" placeholder="Enter First Name" required>
                <!--<input type="text" class="input-field" placeholder="Enter First Name" required> -->

                <input type="text" id="Lname" name="Lname" class="input-field" placeholder="Enter Last Name" required>
                <!--<input type="text" class="input-field" placeholder="Enter Last Name" required> -->
                    
                <input type="text" id="StudentNumber" name="StudentNumber" class="input-field" placeholder="Enter Student Number" required>
                <!--<input type="text" class="input-field" placeholder="Enter Student Number" required> -->

                <input type="text" id="Username" name="Username" class="input-field" placeholder="Enter Username" required>
                <!-- <input type="text" class="input-field" placeholder="Enter Username" required> -->
                <input type="email" id="email" name="email" class="input-field" placeholder="Enter Email" required>
                <!-- <input type="text" class="input-field" placeholder="Enter Username" required> -->
                <input type="Password" id="Password" name="Password" class="input-field" placeholder="Enter Password" required>
                <!--<input type="text" class="input-field" placeholder="Enter Password" required>-->

                <input type="Password" id="confPwd" name="confPwd" class="input-field" placeholder="Confirm Password" required>
                    
                <button type="submit" style="color:aliceblue" class= "submit-btn" name="submit">Register</button>
                </form>

                <!-- original login page -->
                <!-- <form action="../form_processing/signup_fp.php" method="POST">
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
                                                </form> -->
                <div class = "user_instructions">
                    <h3 style="color:black;">EBookstore</h3>
                </div>
            </div>
        </div>
            

        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");

            function register() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }

            function login() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }
        </script>

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