<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>getdata</title>
    <style>
    .Operation {
        background: transparent;
        font-size: small;
    }

    h3,
    th {
        text-transform: uppercase;
    }

    .O {
        list-style-type: none;
    }

    html {
        box-sizing: border-box;
        font-family: "Open Sans", sans-serif;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .background {
        padding: 0 25px 25px;
        position: relative;
        width: 100%;
    }

    .background::after {
        content: "";
        background: #60a9ff;
        background: -moz-linear-gradient(top, #60a9ff 0%, #4394f4 100%);
        background: -webkit-linear-gradient(top, #60a9ff 0%, #4394f4 100%);
        background: linear-gradient(to bottom, #60a9ff 0%, #4394f4 100%);
        filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#60a9ff', endColorstr='#4394f4', GradientType=0);
        height: 350px;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    @media (min-width: 900px) {
        .background {
            padding: 0 0 25px;
        }
    }

    .container {
        margin: 0 auto;
        padding: 50px 0 0;
        max-width: 960px;
        width: 100%;

    }

    .flex {}

    .panel {
        background-color: #fff;
        border-radius: 10px;
        padding: 15px 25px;
        position: relative;
        width: 100%;
        z-index: 10;
    }

    .pricing-table {
        box-shadow: 0px 10px 13px -6px rgba(0, 0, 0, 0.08), 0px 20px 31px 3px rgba(0, 0, 0, 0.09), 0px 8px 20px 7px rgba(0, 0, 0, 0.02);
        display: flex;
        flex-direction: column;
    }

    @media (min-width: 900px) {
        .pricing-table {
            flex-direction: row;
        }
    }

    .pricing-table * {
        text-align: center;

    }

    .pricing-plan {
        border-bottom: 1px solid #e1f1ff;
        padding: 25px;
    }

    .pricing-plan:last-child {
        border-bottom: none;
    }

    @media (min-width: 900px) {
        .pricing-plan {
            border-bottom: none;
            border-right: 1px solid #e1f1ff;
            flex-basis: 100%;
            padding: 25px 50px;
        }

        .pricing-plan:last-child {
            border-right: none;
        }
    }

    .pricing-img {
        margin-bottom: 25px;
        max-width: 100%;
    }

    .pricing-header {
        color: #888;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .pricing-features {
        color: #016ff9;
        font-weight: 600;
        letter-spacing: 1px;
        margin: 50px 0 25px;
    }

    .pricing-features-item {
        border-top: 1px solid #e1f1ff;
        font-size: 12px;
        line-height: 1.5;
        padding: 15px 0;
    }

    .pricing-features-item:last-child {
        border-bottom: 1px solid #e1f1ff;
    }

    .pricing-price {
        color: #016ff9;
        display: block;
        font-size: 32px;
        font-weight: 700;
    }

    .pricing-button {
        border: 1px solid #9dd1ff;
        border-radius: 10px;
        color: #348efe;
        display: inline-block;
        margin: 25px 0;
        padding: 15px 35px;
        text-decoration: none;
        transition: all 150ms ease-in-out;
    }

    .pricing-button:hover,
    .pricing-button:focus {
        background-color: #e1f1ff;
    }

    .pricing-button.is-featured {
        background-color: #48aaff;
        color: #fff;
    }

    .pricing-button.is-featured:hover,
    .pricing-button.is-featured:active {
        background-color: #269aff;
    }
    </style>
</head>

<body>
    <h1></h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <div class="background">
        <div class="container">
            <div class="panel pricing-table">
                <div class="container flex">
                    <h3>player records</h3>
                    <form>
                        <?php
        
                              $servername = "localhost";
                              $username = "root";
                              $password = "";
                              $dbname = "clash_of _lans_toutnaments";
                          
                              // Create connection
                              $conn = new mysqli($servername, $username, $password, $dbname);
                              // Check connection
                              if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                              }
                                
                                $name =$_SESSION['username'];
                                $id ="SELECT * FROM signup WHERE username = '$name' ";
                                $q = mysqli_query($conn,$id);
                                $Name_ = mysqli_fetch_assoc($q);
                                $Signup_id = $Name_['signup_id'];

                             
                              $sql = "SELECT * FROM   `user_records`WHERE `user_id` ='$Signup_id' ";
                          
                              $result = $conn->query($sql);
                          
                          
                              if ($result->num_rows > 0) {
                                echo "<tbody><table class='table'><thead><tr><th scope='col'>Id</th><th scope='col'>Day</th><th scope='col'>clanname</th><th scope='col'>Playername</th><th scope='col'>Townhall</th><th scope='col'>warstar</th><th scope='col'>attack</th><th scope='col'>attacktime</th><th scope='col'>Operation</th></tr></sthead>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr><th scope='row'>$row[id]</th>
                                  
                                  <td>  $row[day]</td>
                                  <td> $row[clanname] </td>
                                 <td> $row[playername]</td>
                                 <td> $row[townhall]</td>
                                 <td>$row[warstar]</td>
                                 <td>$row[attack]</td>
                                 <td>$row[attacktime]</td>
                                 <td class='O' ><li><a href='.\\update.php?id=$row[id]'> <button type='button'class='Operation btn btn-outline-primary btn-sm'>update</button> </a></li><a href='.\\delete.php?id=$row[id]'> <button type='button'class='Operation btn btn-outline-primary btn-sm'>Delete</button> </a><li></td>
                                 </tr> ";
                                }
                                echo "</table></tbody>";
                              } else {
                                echo "0 results";
                              }
                          
                              $conn->close();
                         ?>


                        </table>
                    </form>
                </div>


            </div>
        </div>
    </div>


</body>

</html>