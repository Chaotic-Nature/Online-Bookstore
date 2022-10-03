<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ebook Store Home </title>
    <link rel = "stylesheet" href="../styling/style.css">
    <link rel = "stylesheet" href="../styling/form.css">
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
        <div class="container">
          <div class="title">Book Selling form</div>
          <div class="content">
            <form action="#">
              <div class="user-details">
                <div class="input-box">
                  <span class="details">Name</span>
                  <input type="text" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                  <span class="details">Name of the book</span>
                  <input type="text" placeholder="Enter the name of the book" required>
                </div>
                <div class="input-box">
                  <span class="details">Surname</span>
                  <input type="text" placeholder="Enter your surname" required>
                </div>
                <div class="input-box">
                  <span class="details">Author of the book</span>
                  <input type="text" placeholder="Enter the author of the book" required>
                </div>
                <div class="input-box">
                  <span class="details">Student number</span>
                  <input type="text" placeholder="Enter your studentnumber" required>
                </div>
                <div class="input-box">
                  <span class="details">Books genre</span>
                  <input type="text" placeholder="Enter the genre of the book" required>
                </div>
                <div class="input-box">
                  <span class="details">Books price</span>
                  <input type="text" placeholder="Enter the price of the book" required>
                </div>
              </div>
              <div class="bookcon">
                <input type="radio" name="condtion" id="dot-1">
                <input type="radio" name="condtion" id="dot-2">
                <input type="radio" name="condtion" id="dot-3">
                <span class="book-title">The condtion of the book</span>
                <div class="category">
                  <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="condtion">Bad</span>
                  </label>
                  <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="condtion">Good</span>
                  </label>
                  <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="condtion">Mint condtion</span>
                  </label>
                </div>
              </div>
              <div class="button">
                <input type="submit" value="Sell!">
              </div>
            </form>
          </div>
        </div>
      </section>
    </section>
  </body>
</html>
