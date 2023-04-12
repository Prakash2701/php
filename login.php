<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    body {
        color: #fff;
        background: #3598dc;
        font-family: 'Roboto', sans-serif;
    }

    .form-control {
        height: 41px;
        background: #e1dddd;
        box-shadow: none !important;
        border: none;

    }

    .form-control:focus {
        background: #e2e2e2;
    }

    .form-control,
    .btn {
        border-radius: 3px;
    }

    .signup-form {
        width: 390px;
        margin: 30px auto;
    }

    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .signup-form h2 {
        color: #333;
        font-weight: bold;
        margin-top: 0;
    }

    .signup-form hr {
        margin: 0 -30px 20px;
    }

    .signup-form .form-group {
        margin-bottom: 20px;
    }

    .signup-form input[type="checkbox"] {
        margin-top: 3px;
    }

    .signup-form .row div:first-child {
        padding-right: 10px;
    }

    .signup-form .row div:last-child {
        padding-left: 10px;
    }

    .signup-form .btn {
        font-size: 16px;
        font-weight: bold;
        background: #3598dc;
        border: none;
        min-width: 140px;
    }

    .signup-form .btn:hover,
    .signup-form .btn:focus {
        background: #2389cd !important;
        outline: none;
    }

    .signup-form a {
        color: #fff;
        text-decoration: underline;
    }

    .signup-form a:hover {
        text-decoration: none;
    }

    .signup-form form a {
        color: #3598dc;
        text-decoration: none;
    }

    .signup-form form a:hover {
        text-decoration: underline;
    }

    .signup-form .hint-text {
        padding-bottom: 15px;
        text-align: center;
    }
    </style>
</head>

<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clash_of_clans_toutnaments";
       
        $con =  mysqli_connect($servername,$username,$password,$dbname);
        if ($con->connect_error) {
           die("Connection failed:".$con->connect_error);
         } else {
         
         }
          
        
         if(isset($_POST['submit'])){
           $email = $_POST['email'];
           $password = $_POST['password'];

           $email_q = "SELECT * FROM signup WHERE email = '$email' ";
           $q = mysqli_query($con,$email_q);
           $email_c = mysqli_num_rows($q);
           if ($email_c) {
               $email_pass = mysqli_fetch_assoc($q);
               $pass = $email_pass['password'];
               $_SESSION['username'] = $email_pass['username'];
               $pass_decode = password_verify($password,$pass);
               if ($pass_decode) {
                
                 ?>
    <script>
    alert("login successful");
    </script>
    <?php
             header('location:Clash of Clans tournaments 1.php');
               }else {
                echo "password incorrect";
               }
           }else {
              echo " invalid email";
           }

         }
?>
    <div class="signup-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Login</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>

            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a
                        href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
        </form>
        <div class="hint-text">Create account? <a href=".//signup.php">SignUp here</a></div>
    </div>
</body>

</html>