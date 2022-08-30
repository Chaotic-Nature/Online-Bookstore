<?php
//queries to create tables in bookstore//
//admin table//
$adminQuery = "CREATE TABLE tblAdmin (AD_fName VARCHAR(20), 
                AD_lName VARCHAR(20), AD_num VARCHAR(10), 
                AD_username VARCHAR(20),AD_email VARCHAR(25), 
                AD_pwd VARCHAR(50));";
//order table//
$orderTableQuery = "CREATE TABLE tblOrders (title VARCHAR(30), 
                    author VARCHAR(30), ed VARCHAR(4), categor VARCHAR(8), 
                    price VARCHAR(10), deliveryDate DATE);";
//books table//
$booksTableQuery = "CREATE TABLE tblBooks (title VARCHAR(100), 
                    author VARCHAR(30), ed VARCHAR(4), cate VARCHAR(8), 
                    cond VARCHAR(13), price VARCHAR(10), descript VARCHAR(150), 
                    img1 VARBINARY(255));";

//This method checks if a table exists, 
//deletes it if it does, and recreates it. It takes arguments for
//the name of the table and the sql query
checkTableExistence("tblAdmin", "$adminQuery");
checkTableExistence("tblBooks", "$booksTableQuery");
checkTableExistence("tblOrders", "$orderTableQuery");

//the loadTextData loads text file data into the database. The code for
//this function exists in the CreateTable.php file.
loadTextData("LOAD DATA LOCAL INFILE 
'text_files/adminData.txt'
INTO TABLE tblAdmin FIELDS TERMINATED BY ','");
loadTextData("LOAD DATA LOCAL INFILE 
'text_files/bookData.txt'
INTO TABLE tblBooks FIELDS TERMINATED BY ',,'");
loadTextData("LOAD DATA LOCAL INFILE 
'text_files/orderData.txt'
INTO TABLE tblOrders FIELDS TERMINATED BY ','");