
<html>
      <head>
            <title> Ebook Store Login </title>
      </head>

      <body>
              <ul>

                    <li> <a href="../Index.php"> Home </a> </li>
                    <li> <a href="About.php"> About </a> </li>
                    <li> <a href="Books.php"> Books for sale! </a> </li>
                    <li> <a href="Sell.php"> Sell your books here! </a> </li>
                    <li> <a href="Login.php"> Login/Signup </a> </li>

             </ul>
              <h1> Login to get started! </h1>
              <p>  Are you a new student looking to sign up? <a href="Signup.php"> click here</a> </br>
              for admin login <a href="AdminLogin.php">click here</a> </p>
<form action="../form_processing/user_login_fp.php" method="POST">

<label for="StudentNumber">Student Number</label>
<input type="text" id="StudentNumber" name="StudentNumber" placeholder="...">
</br>

</br>
<label for="username">Username</label>
<input type="text" id="username" name="username" placeholder="...">

</br>
<label for="Password">Password</label>
<input type="password" id="Password" name="Password" placeholder="...">

</br>
 <input type="submit" name="submit"> 

</form>


      </body>
</html>
