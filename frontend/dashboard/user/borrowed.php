<?php
session_start();
    include("../../includes/db.php");

    if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
        header("location: ../../Auth/logout.php");
        exit();
    }

    $user_id = $_SESSION["id"];

    // Number of records per page
    $recordsPerPage = 4;
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    if ($page < 1) {
        $page = 1;
    }

    //start of the table
    $start = ($page - 1) * $recordsPerPage;

    // Count total records
    $countStmt = mysqli_prepare($conn,
        "SELECT COUNT(*) AS total
        FROM BorrowRecords
        WHERE user_id = ?"
    );

    mysqli_stmt_bind_param($countStmt, "i", $user_id);
    mysqli_stmt_execute($countStmt);

    $countResult = mysqli_stmt_get_result($countStmt);
    $totalRecords = mysqli_fetch_assoc($countResult)["total"];

    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Get records for current page
    $stmt = mysqli_prepare($conn,
        "SELECT *
        FROM BorrowRecords
        WHERE user_id = ?
        LIMIT ?, ?"
    );

    mysqli_stmt_bind_param($stmt,"iii",$user_id,$start,$recordsPerPage);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../../css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        .borrow-head {
            display: flex;
            margin-top: 20px;
            justify-content: space-between;
        }

        .borrow-head-title {
            font-size: large;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .dash-items {
            width: 350px;
            background: #7a7a7a;
            color: white;
            border-radius: 15px;
            padding: 25px;
            display: flex;
            align-items: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
            transition: all .25s ease;
            overflow: hidden;
            position: relative;
        }

        .dash-items:hover {
            transform: translateY(-6px);
            background: #666;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .35);
        }

        .dash-items-logo {
            width: 75px;
            height: 75px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .12);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 34px;
        }

        .dash-items-txt {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 8px;
            margin-left: 15px;
        }

        .dash-item-head {
            font-size: 16px;
            font-weight: 600;
            color: rgba(255, 255, 255, .85);
        }

        .dash-item-val {
            font-size: 42px;
            font-weight: 700;
            line-height: 1;
        }

        table {
            width: 100%;
            margin-top: 30px;
        }

        table th {
            background-color: #7c8fb1;
            padding: 10px;
        }

        table tr td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION["status"] == "pending") {
        include("status.php");
    }
    include_once("../../includes/navbars/user_navbar.php");
    ?>

    <main>
        <div class="head">
            <h1>USER DASHBOARD</h1>
            <div class="pfp-details">
                <div class="pfp"><?= strtoupper($_SESSION["user"][0]) ?></div>
            </div>
        </div>
        
        <div class="borrow-head">
            <div class="borrow-head-title">
                <h2>Borrowed Books</h2>
                <p>Manage and view all the books you have currently borrowed</p>
            </div>
            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                        Currently Borrowed Books
                    </span>
                    <span class="dash-item-val">
                        <?= $totalRecords  ?>
                    </span>
                </div>
            </div>
        </div>

        <table rules="all">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Borrowed On</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($result)){
                    $book_id = $row["book_id"];
                    $bookResult = mysqli_query($conn, "SELECT * FROM Books WHERE id = $book_id");
                    $book = mysqli_fetch_assoc($bookResult);
                ?>

                    <tr>
                        <td><?= $book["name"] ?></td>
                        <td><?= $book["author"] ?></td>
                        <td><?= $row["borrow_date"] ?></td>
                        <td><?= $row["due_date"] ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
        <div style="margin-top:20px;">

        <?php
        for($i = 1; $i <= $totalPages; $i++){
        ?>

            <a href="?page=<?= $i ?>"
                style="
                    padding:8px 14px;
                    margin-right:5px;
                    border:1px solid black;
                    text-decoration:none;
                    <?= $page == $i ? 'background:#7c8fb1;color:white;' : '' ?>
                "
            >
                <?= $i ?>
            </a>

        <?php
        }
        ?>

        </div>      
    </main>
    <script src="../../script/user.js"></script>
</body>

</html>