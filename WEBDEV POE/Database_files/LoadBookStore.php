<?php
//Variables created.
$tableAdmin = "tblAdmin";
$tableBooks = "tblBooks";
$tableOrders = "tblOrders";

//Queries to create tables in bookstore.
//Admin table.
$adminQuery = "CREATE TABLE $tableAdmin (
    AD_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    AD_fName VARCHAR(20),AD_lName VARCHAR(20),
    AD_num VARCHAR(10), AD_username VARCHAR(20),
    AD_email VARCHAR(25), AD_pwd VARCHAR(255));"
;
//Books table.
$booksTableQuery = "CREATE TABLE $tableBooks (
    bookID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(100), author VARCHAR(30), 
    ed VARCHAR(4), cate VARCHAR(8), 
    cond VARCHAR(13), price VARCHAR(10), 
    descript VARCHAR(150), img1 VARBINARY(255));"
;
//Order table
$orderTableQuery = "CREATE TABLE $tableOrders (
    order_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL REFERENCES tblUser(userID),
    bookID INT NOT NULL REFERENCES tblBooks(bookID), 
    deliveryDate DATE);"
;

/*This method checks if a table exists, deletes it if
it does, and recreates it with the dummy text file data. 
It takes arguments for the name of the table to be created and 
the sql query to create it. The method can be found in CreateTable.php*/
checkTableExistence($tableAdmin, "$adminQuery");
checkTableExistence($tableBooks, "$booksTableQuery");
checkTableExistence($tableOrders, "$orderTableQuery");

//the loadTextData loads text file data into the database. The code for
//this function exists in the functions.php file.
loadTextData("LOAD DATA LOCAL INFILE 'text_files/adminData.txt' 
INTO TABLE $tableAdmin FIELDS TERMINATED BY ','");

loadTextData("LOAD DATA LOCAL INFILE 'text_files/bookData.txt'
INTO TABLE $tableBooks FIELDS TERMINATED BY ',,'");

loadTextData("LOAD DATA LOCAL INFILE 'text_files/orderData.txt'
INTO TABLE $tableOrders FIELDS TERMINATED BY ','");