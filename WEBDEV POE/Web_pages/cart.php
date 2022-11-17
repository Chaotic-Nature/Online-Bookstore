<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                //While loop executes for every book in the books table.
                //The loop uses html and css to display every book in the table.
                    include_once('../Database_files/DBConn.php');
                    $id=$_GET['id'];
                    $query = "SELECT * from tblBooks where bookID='$id'";
                    $selectQueryResult = mysqli_query($DBConn, $query);//Selecting the books table.
                    if (mysqli_num_rows($selectQueryResult) > 0){
                        while (($Row = mysqli_fetch_assoc($selectQueryResult)) !== null)
                        {
                ?>
                <div class="image-box">
                    <img src=".<?php echo $Row['img1']; ?>" style="height:120px"/>
                    </div>
                    <div class="about">
                        <h1 class="title"><?php echo $Row['title']; ?></h1>
                        <h3 class="subtitle"><?php echo $Row['author']; ?></h3>
                        <img src=".<?php echo $Row['img1']; ?>" style="height:30px"/>
                    </div>
                        <div class="counter">
                        <div class="btn" onclick="increment()">+</div>
                        <div class="count" id="count">0</div>
                        <div class="btn" onclick="decrement()">-</div>
                    </div>
                    <div class="prices">
                        <div class="amount"> R <?php echo $Row['price']; ?></div>
                        <div class="save"><u>Save for later</u></div>
                        <div class="remove"><u>Remove</u></div>
                </div>
                <?php
                        }
                    }
                    else
                    {
                        echo "<p>Unable to select database.</p>\n";
                        echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . mysqli_error($DBConn) . "</p>";
                    }
                    
                ?>
            </div>
            <hr> 
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items"  id="count">0</div>
                    </div>
                    <div class="total-amount"> R 0</div>
                </div>
                <button class="button">Checkout</button>
            </div>
        </div>
        <script>
            var count = 0;
             var numOfItems = document.getElementById("count");
            function increment(){
                
                count = count+1;
                numOfItems.textContent = count;
            }
            function decrement(){

                if(count>1){
                    count = count - 1;
                numOfItems.textContent = count - 1;
                }
                
            }
        </script>
    </body>
</html>

