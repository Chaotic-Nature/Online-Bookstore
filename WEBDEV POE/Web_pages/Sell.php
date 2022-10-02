<html>
      <head>
            <title> Ebook Store Home </title>
            <link rel = "stylesheet" href="../styling/style.css">
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
                                          <li> <a href="../Index.php"> Home </a> </li>
                                          <li> <a href="About.php"> About </a> </li>
                                          <li> <a href="Books.php"> Books for sale! </a> </li>
                                          <li> <a href="Sell.php"> Sell your books here! </a> </li>
                                          <li> <a href="Login.php"> Login/Signup </a> </li>
                                    </ul>
                              </div>
                              <i class ="fa fa-bars" onclick="showMenu()"></i>
                        </nav>
                        <h1> Ready to sell some books? </h1>
                        <h2> Enter the following details </h2>

                        <form action = "yes.php" method = "post">
                            <fieldset>
                                <legend> calculate students total mark </legend>
                                
                                <label for = "name">Name</label>
                                <input type="text" id = "name" name="name">
                                <br>

                                <br>
                                <label for = "surname">Surname</label>
                                <input type="text" id = "surname" name="surname">
                                <br>


                                <br>
                                <label for = "bookname">Books name</label>
                                <input type="text" id = "bookname" name="bookname">
                                <br>

                               <br>
                                <label for = "author"> Author </label>
                                <input type="text" name="author" id= "author" >

                                <br>
                                <label for = "bookcon"> Book Condtion </label>
                                <input type="text" name="bookcon" id= "bookcon" >

                               
                                <input type ="submit" name = "submit" value = "submit">


                  </section>
            </section>
      </body>
</html>
