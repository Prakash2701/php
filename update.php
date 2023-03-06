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

    <title>Clan War</title>
    <h1 style="text-align:center">Clans War</h1>
    <style>
    .input {
        width: 90%;
        padding: 8px 12px;
        display: inline-block;
        border: 2px solid green;
        box-sizing: border-box;
    }

    label {
        color: rgb(28, 15, 15);
        text-shadow: #44096e;
        font-size: 150%;
    }

    .div1 {
        width: 100%;
        height: 60%;
    }

    .div2 {
        height: 20%;
        min-height: 35%;
        text-align: center;
        margin-top: 10%;
    }

    .div3 {
        height: 20%;
        min-height: 35%;
        text-align: center;
        margin-top: 3%;
    }

    .t {
        margin-top: 2%;
        border: 1px rgb(213, 192, 192) solid;
        padding: 8px;
        text-align: center;
    }

    .y {
        margin-top: 2%;
        border: 1px rgb(134, 131, 131) solid;
        padding: 8px;
        text-align: center;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        font-size: 150%;
        border: 1px rgb(135, 133, 133) solid;
    }
    </style>
</head>

<body style="background-color:rgb(228, 221, 221) ;">
    <div class="div1">
        <form method="post" enctype="multipart/form-data">
            <?php
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "clanswar";

             
              
             $con = mysqli_connect($servername,$username,$password,$dbname);
             if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
              } else {
                ?>
            <script>
            alert("connected");
            </script>
            <?php   
              }
               
             
              $id = $_GET['id'];
              $user = $_SESSION['username'];

              $sql = "SELECT * FROM   $user  where id=$id";
    
              $q = mysqli_query($con,$sql);

              $r = mysqli_fetch_assoc($q);
              if (isset($_POST['page4'])) {
               $up =" UPDATE `$user` SET `day`='$_POST[day]',`clanname`='$_POST[clanname]',`playername`='$_POST[playername]',`townhall`='$_POST[townhall]',`warstar`='$_POST[warstar]',`attack`='$_POST[attack]',`attacktime`='$_POST[attacktime]' WHERE id =$id";
              
               $q = mysqli_query($con,$up);
               header('location:page4.php');
            
            }

            $con->close();      
              
    ?>
            <table align="center">
                <tr>
                    <td><label>Day :</label></td>
                    <td><input type="number" class="input" name="day" value="<?php echo $r['day'];?>"></td>
                </tr>
                <tr>
                    <td><label>Clan name or number :</label></td>
                    <td><input type="text" class="input" name="clanname" value="<?php echo $r['clanname'];?>"></td>
                </tr>
                <tr>
                    <td><label>player number or name :</label></td>
                    <td><input type="text" class="input" name="playername" value="<?php echo $r['playername'];?>"></td>
                </tr>
                <tr>
                    <td><label>Town Hall (Level) :</label></td>
                    <td><input type="number" class="input" name="townhall" value="<?php echo $r['townhall'];?>"></td>
                </tr>
                <tr>
                    <td><label>War stars :</label> </td>
                    <td> <input type="number" class="input" name="warstar" value="<?php echo $r['warstar'];?>"></td>

                </tr>
                <tr>
                    <td><label>Attack percentage :</label></td>
                    <td><input type="number" class="input" name="attack" value="<?php echo $r['attack'];?>"></td>
                </tr>
                <tr>
                    <td><label>Attack time : </label></td>
                    <td><input type="number" class="input" name="attacktime" value="<?php echo $r['attacktime'];?>">
                    </td>
                </tr>
                <tr>


                    <td>
                    </td>
                    <td><input type="submit" class="inputcss btn btn-primary btn-sm" name="page4" value="Update"></td>

                </tr>
            </table>
        </form>
    </div>


</body>

</html>