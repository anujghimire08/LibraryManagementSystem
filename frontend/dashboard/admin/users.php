<?php
    session_start();
    require_once("../../includes/db.php");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
        table {
            width: 100%;
            margin-top: 30px;
        }

        table th {
            background-color: #7c8fb1;
        }

    </style>
</head>

<body>
    <?php include_once("../../includes/navbars/admin_navbar.php"); ?>

    <main>
        <div class="head">
            <h1>Librarian Dashboard</h1>
            <div class="pfp-details">
                <div class="pfp"><?= strtoupper($_SESSION["user"][0]) ?></div>
            </div>
        </div> 
        <!-- <div class="dash-contents">
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
        <table rules="all">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined On</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $stmt = mysqli_prepare($conn, "SELECT * FROM users");
                mysqli_stmt_execute($stmt);
                    
                $result = mysqli_stmt_get_result($stmt);
                    
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['role']}</td>";
                    echo "<td>{$row['created_at']}</td>";
                    echo "</tr>";
                }
                mysqli_stmt_close($stmt);
                ?>
            </tbody>

        </table>
    </main>
    <script src="../../script/admin.js"></script>
</body>
</html>