<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href=".//page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href=".//inputform.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <form method="post" enctype="multipart/form-data">
                        <table align="center">

                            <tr>
                                <td><label>player number or name :</label></td>
                                <td><input type="text" class="input" name="playername"></td>
                            </tr>
                            <tr>
                                <td><label>Town Hall (Level) :</label></td>
                                <td><input type="number" class="input" name="townhall"></td>
                            </tr>
                            <tr>
                                <td><label>War stars :</label> </td>
                                <td> <input type="number" class="input" name="warstar"></td>

                            </tr>
                            <tr>
                                <td><label>Attack percentage :</label></td>
                                <td><input type="number" class="input" name="attack"></td>
                            </tr>
                            <tr>
                                <td><label>Attack time : </label></td>
                                <td><input type="number" class="input" name="attacktime"></td>
                            </tr>
                            <tr>

                                <td>
                                    <a href=".\\getdata.php">
                                        <button type="button" class="inputcss btn btn-secondary btn-sm">data</button>
                                    </a>
                                </td>
                                <td>
                                    <input type="submit" name="page3" class="inputcss btn btn-primary btn-sm"
                                        value="submit">
                                </td>



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
             $dbname = "clash_of_clans_toutnaments";
            
             $con =  mysqli_connect($servername,$username,$password,$dbname);
             if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
              } else {
    
              }
              $name = $_SESSION['username'];
              $id ="SELECT * FROM signup WHERE username = '$name' ";
              $q = mysqli_query($con,$id);
              $Name_ = mysqli_fetch_assoc($q);
              $Signup_id = $Name_['signup_id'];
              echo $Signup_id;
              $bstk = date("Y-m-d");
              

            $now = new DateTime();
              $NOWS =$now->format('Y-m-d ');    
          echo "<br>";
          echo $NOWS;
               
              
              if(isset($_POST['page3'])){
                
                $sql= "INSERT INTO `small_user_record` (`id`, `signup_id`, `playername`, `warstar`, `attack`, `attack _time`, `date`) VALUES (NULL, '$Signup_id', '$_POST[playername]', '$_POST[townhall]', '$_POST[warstar]', '$_POST[attack]', '$_POST[attacktime]','$NOWS')";
                $r = mysqli_query($con,$sql);
                if($r){
                                ?>

    <script>
    alert("user records  insert");
    </script>

    <?php 
                            }
                            $con->close();

                        }
                    ?>


</body>

</html>