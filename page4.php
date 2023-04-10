<?php

session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href=".//page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href=".//inputform.css">
    <title>Clan War</title>


</head>

<body style="background-color:rgb(228, 221, 221) ;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href=".//Clash of Clans tournaments 1.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="background">
        <h2>Clans War</h2>
        <div class="container">

            <div class="panel pricing-table">

                <div class="container">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <table align="center">
                            <tr>
                                <td><label>Day :</label></td>
                                <td><input type="number" name="day" class="input" required="required"></td>
                            </tr>
                            <tr>
                                <td><label>Clan name or number :</label></td>
                                <td><input type="text" name="clanname" class="input" required="required"></td>
                            </tr>
                            <tr>
                                <td><label>player number or name :</label></td>
                                <td><input type="text" name="playername" class="input" required="required"></td>
                            </tr>
                            <tr>
                                <td><label>Town Hall (Level) :</label></td>
                                <td><input type="number" name="townhall" class="input" required="required"></td>
                            </tr>
                            <tr>
                                <td><label>War stars :</label> </td>
                                <td> <input type="number" name="warstar" class="input" required="required"></td>

                            </tr>
                            <tr>
                                <td><label>Attack percentage :</label></td>
                                <td><input type="number" name="attack" class="input" required="required"></td>
                            </tr>
                            <tr>
                                <td><label>Attack time : </label></td>
                                <td><input type="number" name="attacktime" class="input" required="required"></td>
                            </tr>


                            <tr>


                                <td><a href=".\\getdata_page4.php">
                                        <button type="button" class="inputcss btn btn-secondary btn-sm">data</button>
                                    </a>
                                </td>
                                <td><input type="submit" class="inputcss btn btn-primary btn-sm" name="page4"
                                        value="submit"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "clash_of _lans_toutnaments";
            
             $con =  mysqli_connect($servername,$username,$password,$dbname);
             if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
              } else {
                echo "Connection";
              
              }
               
             $name =$_SESSION['username'];
             $id ="SELECT * FROM signup WHERE username = '$name' ";
             $q = mysqli_query($con,$id);
             $Name_ = mysqli_fetch_assoc($q);
             $Signup_id = $Name_['signup_id'];
             echo $Signup_id;
             $date1 = date("Y-m-d");
             
              if(isset($_POST['page4'])){
                $sql="INSERT INTO `user_records` (`id`, `user_id`, `day`, `clanname`, `playername`, `townhall`, `warstar`, `attack`, `attacktime`,`credit_by`) VALUES (NULL, '$Signup_id', '$_POST[day]', '$_POST[clanname]', '$_POST[playername]', '$_POST[townhall]', '$_POST[warstar]', '$_POST[attack]', '$_POST[attacktime]','$date1')"; 
                
                 $r = mysqli_query($con,$sql);
                 if($r){
                    ?>
    <script>
    alert("user_records successful insert");
    </script>

    <?php 
                 }else{
                    ?>
    <script>
    alert("user records not insert");
    </script>

    <?php 
                 }

                 
              }
              $con->close();
      ?>

</body>

</html>