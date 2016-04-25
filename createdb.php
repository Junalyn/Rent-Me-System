<?php
require_once('class.user.php');

$dbc = new USER();

$table1 = 'users';
$query1 = 'CREATE TABLE IF NOT EXISTS users (
	id_user Integer NOT NULL UNIQUE AUTO_INCREMENT,
	username Varchar(255) NOT NULL,
    firstname Varchar(255) NOT NULL,
    middlename Varchar(255),
    lastname Varchar(255) NOT NULL,
	password Varchar(255),
	address text NOT NULL,
	contact_no varchar(255) NOT NULL,
	profile_pic varchar(255) DEFAULT NULL,
Primary Key (id_user)
) ENGINE = InnoDB AUTO_INCREMENT=1 ; ';

if(!$dbc->tableExists($table1) ){
    $dbc->createTable($table1,$query1);
}

$table2 = 'admin';
$query2 = 'CREATE TABLE IF NOT EXISTS admin (
	id_ad Integer NOT NULL UNIQUE AUTO_INCREMENT,
	username Varchar(40) NOT NULL,
	password Varchar(255) NOT NULL,
Primary Key (id_ad)
) ENGINE = InnoDB AUTO_INCREMENT=1 ; ';

$insert2 = 'INSERT INTO admin (id_ad, username, password)
    VALUES (NULL, "admin", "admin")';

if(!$dbc->tableExists($table2) ){
    $dbc->createTable($table2,$query2);
    $dbc->insertRecord($insert2);
}

$table2 = 'categories';
$query2 = 'CREATE TABLE IF NOT EXISTS categories (
	category_id Integer NOT NULL UNIQUE AUTO_INCREMENT,
	cat_description Varchar(255) NOT NULL,
	profile_pic varchar(255) DEFAULT NULL,
Primary Key (category_id)
) ENGINE = InnoDB AUTO_INCREMENT=1; ';


$insert2 = 'INSERT INTO categories (category_id, cat_description, profile_pic)
    VALUES (1, "Furniture" , ""),
    (2, "Equipment" , ""),
    (3, "Clothing" , ""),
    (4, "Home Decors" , "")';

if(!$dbc->tableExists($table2) ){
    $dbc->createTable($table2,$query2);
    $dbc->insertRecord($insert2);
}



$table3 = 'items';
$query3 = 'CREATE TABLE IF NOT EXISTS items (
	item_id Integer NOT NULL UNIQUE AUTO_INCREMENT,
	category_id Integer NOT NULL,
	description Varchar(255) NOT NULL,
    profile_pic varchar(255) DEFAULT NULL,
	amount Decimal(14,2) NOT NULL,
Primary Key (item_id)
) ENGINE = InnoDB AUTO_INCREMENT=1; ';


$insert3 = 'INSERT INTO items (description,category_id,profile_pic,amount)
    VALUES ("Sofa",1,"sofa.jpg",600.00),
    ("iMac Computer",2,"imac_computer.jpg",10599.00),
    ("Pink Top",3,"pink_top.jpg",250.00),
    ("Starry Night Painting",4,"starry_night.jpg",5000.00),
	("Super Man Costume",3, "c1.jpg", 900.00),
	("Super Mario Costume(Female)",3, "c2.jpg", 1200.00),
	("Toddler Yoda Costume", 3, "c3.jpg",500.00),
	("Minion Costume", 3, "c4.jpg",550.00),
	("Black Tux", 3, "c5.jpg", 2500.00),
	("Peach Dress", 3, "c7.jpg",1500.00),
	("Gold Tux", 3, "c8.jpg", 5000.00),
	("Wall Mount set", 4,"d1.jpg", 300.00),
	("Table Decor set", 4,"d2.jpg", 600.00),
	("Lanterns", 4,"d4.jpg", 299.00),
	("Paper bird house set", 4,"d5.jpg", 399.00),
	("Angel Sculptures", 4,"d6.jpg", 349.00),
	("Silver Fish Decor", 4,"d7.jpg", 479.00),
	("Outdoor Decor", 4,"d8.jpg", 589.00),
	("Round Table", 1,"f1.jpg", 688.00),
	("Wooden Chairs (12pcs)", 1,"f2.jpg", 600.00),
	("Plastic Chairs (20pcs)", 1,"f3.jpg", 250.00),
	("Sofa set", 1,"f4.jpg", 999.00),
	("Wooden Cabinet(Large)",1,"f5.jpg", 1500.00),
	("Single Wooden Cabinet",1,"f6.png", 1000.00),
	("Single Bed",1,"f7.jpg",  800.00),
	("Power Tools",2,"p1.jpg", 250.00),
	("Silver Wrench Set",2,"p2.jpg", 150.00),
	("Cement Mixer",2,"p3.jpg", 500.00),
	("Photograpy Studio Set",2,"p4.jpeg", 2500.00),
	("Gas Generator",2,"p5.jpg", 4500.00),
	("DJ Mixer",2,"p6.jpeg", 999.00),
	("Sound and lights Set",2,"p7.jpg", 2500.00)';

if(!$dbc->tableExists($table3) ){
    $dbc->createTable($table3,$query3);
    $dbc->insertRecord($insert3);
}

$table4 = "records";
$query4 = "CREATE TABLE IF NOT EXISTS records (
	id_records Integer NOT NULL UNIQUE AUTO_INCREMENT,
	cat_description Varchar(255) NOT NULL,
	user Varchar(255) NOT NULL,
	amount Decimal(14,2) NOT NULL,
	date_borrowed date NOT NULL,
	time Varchar(255) NOT NULL,
	date_returned date NULL,
Primary Key (id_records)
) ENGINE = InnoDB AUTO_INCREMENT = 1; ";

if (!$dbc->tableExists($table4) ){
	 $dbc->createTable($table4,$query4);
}
?>