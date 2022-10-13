
<html>
      <head>
            <title> Ebook Store About </title>
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
                              <label class = "logo">
                                    <b>EBookStore</b>
                              </label>   

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
                        <section class="about-us">
                              <section id="About">
                                    <h1 style="color: black;">About Us</h1>
                                    <p>Ebook store was established in the cold winter of the year 2022 by 3 disguished gentlemen, Cibbs , AP,Double A and Sir Gareth thee End.</p>
                                    
                                    <h2> Contact Us </h2>

                                    <p>
                                    Email: Awesomsauce@gmail.com</br>
                                    Tel: 069 210 420</br>
                                    Location:
                                    </p>
                              </section>
                        </section>
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
