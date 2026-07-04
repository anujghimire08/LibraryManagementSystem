<?php
session_start();
require_once "../includes/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = trim($_POST["password"]);

    if ($email !== false && $password !== "") {

        $stmt = mysqli_prepare($conn,
            "SELECT name, email, password, role
            FROM users
            WHERE email = ?"
        );

        if (!$stmt) {
            die(mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
                $_SESSION["user"] = $row["name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["status"] = "confirmed";
                mysqli_stmt_close($stmt);
                if ($row["role"] === "admin") {
                    header("Location: ../dashboard/admin/home.php");
                } else {
                    header("Location: ../dashboard/user/home.php");
                }
                exit();
            } 
            else{
                $error = "Invalid email or password.";
            }

        } 
        else{
            $error = "Invalid email or password.";
        }

        mysqli_stmt_close($stmt);

    } else {
        $error = "Please enter a valid email and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <link rel="stylesheet" href="../css/login.css">

    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <h1>Login Form</h1>

            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <i class="ri-user-3-line"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="ri-lock-line"></i>
            </div>

            <div class="remember-forget">
                <label>
                    <input type="checkbox">
                    Remember Me
                </label>
                <a href="#">forget password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="register.php"> Register</a></p>
            </div>
            <?= htmlspecialchars($error) ?>
        </form>
    </div>
</body>
</html>