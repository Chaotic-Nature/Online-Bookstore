<?php
include_once("../Database_files/DBConn.php");
if(isset($_POST['approve']))
{
        if(isset($_POST['check']))
        {
                    foreach ($_POST['check'] as $value){
                        echo $value;
                        $sql = "UPDATE tblUser SET verified ='y' where userID = '$value'"; 

                        if(mysqli_query($DBConn,$sql)){
                            header('location:../Web_pages/admindash.php?message=successfully verified"');
                        }

                    }
                   
        }
}
?>   