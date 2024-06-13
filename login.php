<?php 

    session_start();

    $email = $password = "";

    $emailErr = $passwordErr = "";



    if($_SERVER["REQUEST_METHOD"] == "POST") {



        if(empty($_POST["email"])) {

            $emailErr = "Email is required!";

        } else {

            $email = $_POST["email"];

        }



        if(empty($_POST["password"])) {

            $passwordErr = "Password is required!";

        } else {

            $password = $_POST["password"];

        }



        if($email && $password) {

            include_once("connection.php");



            $check_email = mysqli_query($conn, "SELECT * FROM users  WHERE email = '$email'");

            $check_email_row = mysqli_num_rows($check_email);



            if($check_email_row > 0) {

                while($row = mysqli_fetch_assoc($check_email)) {                  

                    $db_password = $row["Password"];

                    $db_account_type = $row["Account_Type"];



                    if($password == $db_password) {
     
                        if($db_account_type == "1") {
                           
$_SESSION['email'] = $email;                      header("location:admin.php");
die;

                        } else {
$_SESSION['email'] = $email;                                            header("location:user.php");
die;
                        }

                    } else {

                        $passwordErr = "Password is incorrect!";

                    }

                }

            } else {

                $emailErr = "Email is incorrect!";

            }

        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header"></div>
        <section>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="error"><?php echo $emailErr;?></span><br>
                <div class="input-box">
                    <input type="text" class="input-field" name="email" placeholder="Email" value="<?php echo $email?>"><br>
                </div>
                <span class="error"><?php echo $passwordErr;?></span><br>
                <div class="input-box">
                    <input type="password" class="input-field" name="password" placeholder="Password" value="<?php echo $password?>"><br>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                    <a href="forgot.php"> Forgot Password?</a>
                </div>
                <div class="input-submit">
                    <button class="submit-btn">Login</button>
                    <label for="submit"></label>
                </div>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </section>
    </div>
</body>
</html>