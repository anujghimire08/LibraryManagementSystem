<?php
    session_start();
    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
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
        <!--<div class="dash-contents">
            <div class="dash-items"> 
                <span class="dash-contents-head">
                    books
                </span>
            </div>
            <div class="dash-items">
                <span class="dash-contents-head">
                    Borrowed
                </span>
            </div>
            <div class="dash-items">
                <span class="dash-contents-head">
                    to review
                </span>
            </div>
            <div class="dash-items">
                <span class="dash-contents-head">
                    returned
                </span>
            </div>
        </div> -->
    </main>
    <script src="../../script/admin.js"></script>
</body>
</html>