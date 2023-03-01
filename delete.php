<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "clanswar";
 
 $id = $_GET['id'];
  // Create connection
  $con = mysqli_connect($servername,$username,$password,$dbname);
 // Check connection
  if ($con->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

 $sql = "DELETE FROM page4 WHERE id =$id";
 $q = mysqli_query($con,$sql);
   if ($q) {
  ?>
      <script>
                    alert("deleted");
        </script>    
 <?php   

    header('location:getdata2.php');
 }


?>