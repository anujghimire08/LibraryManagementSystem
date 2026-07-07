<?php
    session_start();
    require_once("../../includes/db.php");
    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $usermail = $_POST['email'];
        if(isset($_POST['accept'])){
            $stmt= mysqli_prepare($conn, "UPDATE users SET isApproval = 1 WHERE email = ? AND isApproval = 0 ");
            mysqli_stmt_bind_param($stmt, "s", $usermail);
            mysqli_execute($stmt);
        }else{
            echo "reject";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php include_once("../../includes/navbars/admin_navbar.php"); ?>


    <main>
        <div class="head">
            <h1>ADMIN DASHBOARD</h1>
            <div class="pfp-details">
                <div class="pfp">B</div>
            </div>
        </div>
        
    <section id="approval-users">

        <?php

        $stmt= mysqli_prepare($conn, "SELECT * FROM users WHERE isApproval= 0");

        mysqli_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

            while($row = mysqli_fetch_assoc($result)){
            
                echo "<div class='feedback-card'>
                        <div class='user-info'>
                            <img src='../../../assets/defaultprofile.jpg' alt='user' />
                            <div>
                                <h3>{$row['name']}</h3>
                                <p>{$row['email']}</p>
                            </div>
                        </div>
                        <div class='admin-approval-action'>
                            <form method='post'>
                                <input type='text' name='email' value='{$row['email']}' hidden/>
                                <button name='accept' id='accept'>Accept User</button>
                                <button name='reject' id='reject'>Reject User</button>
                            </form>
                        </div>
                    </div>";
            }
        ?>      
    </section>
    </main>
    <script src="../../script/admin.js"></script>
</body>
</html>