<?php
    session_start();
    require_once("../includes/db.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
        $password = trim($_POST["password"]);
        $co_password = trim($_POST["co-password"]);

        if(!empty($name) && $email != false && $password != "" && $co_password != "" && $password == $co_password ){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn,
            "INSERT INTO users (name,email,password,role)
                VALUES (?,?,?,?)
            ");
            $role ="user";
            mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$hash,$role);
            mysqli_stmt_execute($stmt);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="../css/register.css">
    

</head>
<body>
    
        <div class="container">

            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

                <h1>REGISTER</h1>

                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="input-box">
                    <input type="password" name="co-password" placeholder="Confirm Password" required>
                </div>

                <div class="terms">
                    <input type="checkbox" required>
                    I accept Terms of use
                </div>

                <button type="submit" class="btn">Signup</button>

                <div class="login">
                    <p>Already have an account ?
                    <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </body>
</html>