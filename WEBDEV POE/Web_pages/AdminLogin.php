
<html>
      <head>
            <title> Ebook Store AdminLogin </title>
      </head>

      <body>
              <ul>

                    <li> <a href="../Index.php"> Home </a> </li>
                    <li> <a href="About.php"> About </a> </li>
                    <li> <a href="Books.php"> Books for sale! </a> </li>
                    <li> <a href="Sell.php"> Sell your books here! </a> </li>
                    <li> <a href="Login.php"> Login/Signup </a> </li>

             </ul>
              <h1> Welcome to the Admin only Page! </h1>
              <p>  Are you really an admin or are you just snooping around! Find out by logging in below! </p>
<form action="../form_processing/admin_login_fp.php" method="POST" >

<label for="Username">Username</label>
<input type="text" id="Username" name="Username" placeholder="...">
</br>

</br>
<label for="Password">Password</label>
<input type="password" id="Password" name="Password" placeholder="...">

</br>
<input type="submit" name="submit">

</form>


      </body>
</html>
