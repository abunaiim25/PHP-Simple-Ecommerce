<?php
// firstly create database on MySql, then......

$host = "localhost";
$username = "root";
$password = "";
$database = "php_ecom";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else{
    //echo "Connected Successfully";
}


?> 

<?php
/*
//-------------------------------TABLE & COLUMN CREATE------------------------------
"CREATE TABLE `php_ecom`.`orders` 
(`id` INT NOT NULL AUTO_INCREMENT , 
`tracking_id` VARCHAR(191) NOT NULL , 
`user_id` INT(191) NOT NULL , 
`name` VARCHAR(191) NOT NULL , 
`email` VARCHAR(191) NOT NULL ,
`phone` VARCHAR(191) NOT NULL , 
`address` MEDIUMTEXT NOT NULL , 
`pincode` INT(191) NOT NULL ,
`total_price` INT(191) NOT NULL , 
`payment_mode` TEXT NOT NULL , 
`payment_id` VARCHAR(191) NULL , 
`status` TINYINT NOT NULL DEFAULT '0' , 
`comments` VARCHAR(255) NULL ,
`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;"
 */
?>