<?php
session_start();
?>

<html lang ="en" dir ="Itr";>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> EBookStore.com </title>

        <link rel = "stylesheet" href="../styling/cart.css?v=<?php echo time();?>">
    </head>


<body>
 <div class="Cart-Container">
    <div class="Header">
    <h3 class="Heading">Shopping Cart</h3>
    <h5 class="Action">Remove all</h5>
    </div>
    <div class="Cart-Items">
        <?php
            include_once('../Database_files/DBConn.php');
            $id=$_GET['id'];
            $query=mysqli_query($DBConn,"SELECT * from tblBooks where bookID='$id'");
            $selectQueryResult = mysqli_query($DBConn, $selectQuery);//Selecting the books table.
            if ($selectQueryResult === FALSE)
            {
                  echo "<p>Unable to select database.</p>\n";
                  echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . mysqli_error($DBConn) . "</p>";
            }
            //While loop executes for every book in the books table.
            //The loop uses html and css to display every book in the table.
            while (($Row = mysqli_fetch_assoc($selectQueryResult)) !== null)
            {
            ?>
                <div class="image-box">
                    <img src="images/apple.png" style="height:120px"/>
                    </div>
                    <div class="about">
                        <h1 class="title"><?php echo $Row['title']; ?></h1>
                        <h3 class="subtitle"><?php echo $Row['author']; ?></h3>
                        <img src="<?php echo $Row['img1']; ?>" style="height:30px"/>
                    </div>
                        <div class="counter">
                        <div class="btn">+</div>
                        <div class="count">2</div>
                        <div class="btn">-</div>
                    </div>
                    <div class="prices">
                        <div class="amount">$2.99</div>
                        <div class="save"><u>Save for later</u></div>
                        <div class="remove"><u>Remove</u></div>
                </div>
            <?php
                }
            ?>
        
        
    </div>
    <hr> 
        <div class="checkout">
            <div class="total">
            <div>
            <div class="Subtotal">Sub-Total</div>
            <div class="items">2 items</div>
            </div>
            <div class="total-amount">$6.18</div>
            </div>
            <button class="button">Checkout</button>
        </div>
    
 </div>
</body>

