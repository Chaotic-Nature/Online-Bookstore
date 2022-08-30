<?php
function loadTextData($loadDataQuery){
    global $DBConn;
    $loadDataQueryResult = mysqli_query($DBConn ,$loadDataQuery);
    if($loadDataQueryResult === FALSE){
        echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . 
        mysqli_error($DBConn) . "</p>";
    }
}