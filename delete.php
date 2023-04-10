<?php
session_start();
?>

<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "clash_of _lans_toutnaments";
 
 $id = $_GET['id'];
 $user = $_SESSION['username'];
  // Create connection
  $con = mysqli_connect($servername,$username,$password,$dbname);
 // Check connection
  if ($con->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

 $sql = "DELETE FROM $user WHERE id =$id";
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