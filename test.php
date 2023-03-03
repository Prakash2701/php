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
    <title>Sign Up</title>
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
        width: 230px;
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
        $dbname = "signup";
       
        $con =  mysqli_connect($servername,$username,$password,$dbname);
        if ($con->connect_error) {
           die("Connection failed: " . $con->connect_error);
         } else {
         
         }
          
        
         if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $phone =$_POST['phone'];
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
           
            $pass = password_hash($password,PASSWORD_BCRYPT);
            $cpass = password_hash($confirm_password,PASSWORD_BCRYPT);

            $emailq = "SELECT * FROM signup WHERE email = '$email' ";
            $q = mysqli_query($con,$emailq);

            $emailcount = mysqli_num_rows($q);
            if ($emailcount>0) {
                 ?>
    <script>
    alert("email already exists");
    </script>

    <?php
                
            }else {
                if ($password === $confirm_password) {
                   $insertq =" INSERT INTO signup( username, email, phone, `password`, confirm_password) VALUES ('$name','$email','$phone','$pass','$cpass')";
                   $iq = mysqli_query($con,$insertq); 
                   header('location:Clash of Clans tournaments test.html');
                }else {
                    ?>
    <script>
    alert("Password are not matching");
    </script>

    <?php
                }
            }

           
         }
    ?>
    <div class="signup-form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">

                <input type="text" class="form-control" name="name" placeholder=" Name" required="required">


            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="phone" class="form-control" name="phone" placeholder="phone" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
                    required="required">
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a
                        href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        <div class="hint-text">Already have an account? <a href=".//test2.php">Login here</a></div>
    </div>
</body>

</html>