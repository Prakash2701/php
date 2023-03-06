<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$con =  mysqli_connect($servername,$username,$password,$dbname);
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
 } else {
 
 }
  

 
  
   $email_q = "SELECT * FROM signup WHERE email = '$email' ";
   $q = mysqli_query($con,$email_q);
   $email_c = mysqli_num_rows($q);
   if ($email_c) {
       $email_pass = mysqli_fetch_assoc($q);
    
       $_SESSION['username'] = $email_pass['username'];
    
       if ($_SESSION['username']) {
        
    
         header('location:create_table.php');
       }
       
  

    }


?>