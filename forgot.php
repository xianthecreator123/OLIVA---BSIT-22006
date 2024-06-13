<?php 
    $email = $otp = "";
    $emailErr = $otpErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate Email
        if(empty($_POST["email"])) {
            $emailErr = "Email is required!";
        } else {
            $email = $_POST["email"];
            // Add email validation if needed
        }

        // Validate OTP
        if(empty($_POST["otp"])) {
            $otpErr = "OTP is required!";
        } else {
            $otp = $_POST["otp"];
            // Add OTP validation if needed
        }

        // If both fields are valid, proceed with verification
        if($email && $otp) {
            // Perform OTP verification here
            // You can add your OTP verification logic here
            // For now, let's just redirect to a success page
            header("Location: verify_otp.php");
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesss.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header"></div>
        <section>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="error"><?php echo $emailErr;?></span><br>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email"><br>
            </div>
            <span class="error"><?php echo $otpErr;?></span><br>
            <div class="input-box">
                <input type="text" class="input-field" name="otp" placeholder="OTP"><br>
            </div>
            <div class="input-submit">
                <button type="submit" class="submit-btn">Verify OTP</button>
            </div>
            </form>
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </section>
    </div>
</body>
</html>