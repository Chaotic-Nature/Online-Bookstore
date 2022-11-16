<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login and Register</title>
        <link rel="stylesheet" href="../styling/LoginStyle.css?v=<?php echo time();?>">
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
                    

                </form>

                <form id="register" class="input-group" action="../form_processing/signup_fp.php" method="POST">
                
                    <input type="text" id="Fname" name="Fname" class="input-field" placeholder="Enter First Name"  required type="text">
                    
                    <input type="text" id="Lname" name="Lname" class="input-field" placeholder="Enter Last Name"  required type="text">
                    
                    <input type="text" id="StudentNumber" name="StudentNumber" class="input-field" placeholder="Enter Student Number"  required type="text">
                    
                    <input type="text" id="Username" name="Username" class="input-field" placeholder="Enter Username" required>
                    
                    <input type="email" id="email" name="email" class="input-field" placeholder="Enter Email" required>
                    
                    <input type="Password" id="Password" name="Password" class="input-field" placeholder="Enter Password" required>
                    
                    <input type="Password" id="confPwd" name="confPwd" class="input-field" placeholder="Confirm Password" required>
                        
                    <button type="submit" style="color:aliceblue" class= "submit-btn" name="submit">Register</button>
                
                </form>
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