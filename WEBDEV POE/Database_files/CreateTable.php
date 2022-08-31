<?php
//The functions file in the inc_files contains the loadTextData function.
include('./inc_files/functions.php');

//Including the file containing database connection.
include ("DBConn.php");

$tblUserQuery = "CREATE TABLE tblUser (fName VARCHAR(20), 
                lName VARCHAR(20), studNum VARCHAR(10), 
                username VARCHAR(20), pwd VARCHAR(255))";

checkTableExistence("tblUser", $tblUserQuery);

loadTextData("LOAD DATA LOCAL INFILE 'text_files/userData.txt'
    INTO TABLE tblUser FIELDS TERMINATED BY ','");

function checkTableExistence($tableName, $createTableQuery){
    global $DBConn;
    $showTableQuery = "SHOW TABLES LIKE '$tableName'";
    $showTableQueryResult = mysqli_query($DBConn, $showTableQuery);
    if(mysqli_num_rows($showTableQueryResult) > 0){
        dropTable($tableName);
        create_table($createTableQuery); 
    }
    else{
        create_table($createTableQuery); 
    }  
}

//This method drops a table.
function dropTable($tableName){
    global $DBConn;
    $dropTableQuery = "DROP TABLE $tableName";
    $dropTableQueryResult = mysqli_query($DBConn, $dropTableQuery);
    if($dropTableQueryResult == FALSE){
        echo "<p>Couldnt drop table</p>";
    }
}

//This method creates a table.//
function create_table($createTableQuery){
    global $DBConn;
    $createTableQueryResult = mysqli_query($DBConn, $createTableQuery);
    if($createTableQueryResult === FALSE){
        echo "<p>Error code: " . mysqli_errno($DBConn) . " : " 
        . mysqli_error($DBConn) . "</p>";
    }
}
