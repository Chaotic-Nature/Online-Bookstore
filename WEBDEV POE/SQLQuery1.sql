CREATE TABLE tbluser (
usr_id VARCHAR  (10) PRIMARY KEY,
fname VARCHAR (20),
lname VARCHAR (20),
studnum VARCHAR(10),
username VARCHAR(20),
pwd VARCHAR (255),
email VARCHAR (30)
);

CREATE TABLE orders (
order_id VARCHAR (10) PRIMARY KEY,
usr_id VARCHAR (10),
book_id VARCHAR (10),

FOREIGN KEY (usr_id) REFERENCES tbluser (usr_id),

FOREIGN KEY (book_id) REFERENCES books (book_id) ,


);

CREATE TABLE contact_details (
email VARCHAR (20) PRIMARY KEY,
cell VARCHAR (20)
);

CREATE TABLE books (
book_id VARCHAR (10) PRIMARY KEY,
book_name VARCHAR (20), 
book_price  INT ,
author VARCHAR (30) ,
descp VARCHAR (40) ,
edtion VARCHAR (10),
category VARCHAR (20),
condtion VARCHAR (20)
);

