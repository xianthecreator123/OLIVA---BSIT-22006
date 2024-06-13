<?php 

    $fullname = $email = $password = $confirm_password = "";
    $fullnameErr = $emailErr = $passwordErr = $confirm_passwordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate Full Name
        if(empty($_POST["fullname"])) {
            $fullnameErr = "Full Name is required!";
        } else {
            $fullname = $_POST["fullname"];
        }

        // Validate Email
        if(empty($_POST["email"])) {
            $emailErr = "Email is required!";
        } else {
            $email = $_POST["email"];
        }

        // Validate Password
        if(empty($_POST["password"])) {
            $passwordErr = "Password is required!";
        } else {
            $password = $_POST["password"];
        }

        // Validate Confirm Password
        if(empty($_POST["confirm_password"])) {
            $confirm_passwordErr = "Confirm Password is required!";
        } else {
            $confirm_password = $_POST["confirm_password"];
            if($password !== $confirm_password) {
                $confirm_passwordErr = "Passwords do not match!";
            }
        }

        // If all fields are valid, proceed with registration
        if($fullname && $email && $password && $confirm_password && ($password === $confirm_password)) {
            // Perform registration actions here
            // You can add your database insertion code or other actions
            // For now, let's just redirect to a success page
            header("Location: registration_success.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <title>Registration</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header"></div>
        <section>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="error"><?php echo $fullnameErr;?></span><br>
            <div class="input-box">
                <input type="text" class="input-field" name="fullname" placeholder="Full Name" value="<?php echo $fullname;?>"><br>
            </div>
            <span class="error"><?php echo $emailErr;?></span><br>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" value="<?php echo $email;?>"><br>
            </div>
            <span class="error"><?php echo $passwordErr;?></span><br>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password"><br>
            </div>
            <span class="error"><?php echo $confirm_passwordErr;?></span><br>
            <div class="input-box">
                <input type="password" class="input-field" name="confirm_password" placeholder="Confirm Password"><br>
            </div>
            <div class="input-submit">
                <button type="submit" class="submit-btn">Register</button>
            </div>
            </form>
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </section>
    </div>
</body>
</html>