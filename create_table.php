<?php
 session_start();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clanswar";

// checking connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql code to create table
$user = $_SESSION['username'];
$sql = " CREATE TABLE `$user` (`id` INT NOT NULL AUTO_INCREMENT ,
 `day` INT NOT NULL , 
 `clanname` VARCHAR(255) NOT NULL ,
  `playername` VARCHAR(255) NOT NULL , 
  `townhall` INT NOT NULL , 
  `warstar` INT NOT NULL , 
  `attack` INT NOT NULL , 
  `attacktime` INT NOT NULL ,
   PRIMARY KEY (`id`)) ENGINE = InnoDB"; 

if ($conn->query($sql) === TRUE) {
    echo "Table employees created successfully";
    header('location:test2.php');
    
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>