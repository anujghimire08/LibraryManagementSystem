<?php
    session_start();
    include("../../includes/db.php");
    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }

    $countStmt = mysqli_prepare($conn,
        "SELECT COUNT(*) AS total
        FROM BorrowRecords");

    mysqli_stmt_execute($countStmt);

    $countResult = mysqli_stmt_get_result($countStmt);
    $totalBorrowRecords = mysqli_fetch_assoc($countResult)["total"];


    $countResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM Books");
    $countRow = mysqli_fetch_assoc($countResult);

    $totalBooksRecords = $countRow["total"];

    $countReview = mysqli_prepare($conn,"SELECT COUNT(*) AS total FROM reviews");
    mysqli_stmt_execute($countReview);

    $reviewResult = mysqli_stmt_get_result($countReview);
    $totalReviewRecords = mysqli_fetch_assoc($reviewResult)["total"];

    $countStmt = mysqli_prepare($conn,
        "SELECT COUNT(*) AS total
        FROM users WHERE isApproval = 1");

    mysqli_stmt_execute($countStmt);

    $countResult = mysqli_stmt_get_result($countStmt);
    $totalUserRecords = mysqli_fetch_assoc($countResult)["total"];

    $countStmt = mysqli_prepare($conn,
        "SELECT COUNT(*) AS total
        FROM users WHERE isApproval = 0");

    mysqli_stmt_execute($countStmt);

    $countResult = mysqli_stmt_get_result($countStmt);
    $totalRequestRecords = mysqli_fetch_assoc($countResult)["total"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <style>
        .dash-contents{
            margin:30px 0;
            display:grid;
            grid-template-columns:repeat(3,minmax(250px,1fr));
            gap:25px;
        }

        .dash-items{
            background:#7a7a7a;
            color:white;
            border-radius:20px;
            padding:25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 8px 20px rgba(0,0,0,.25);
            transition:all .25s ease;
            overflow:hidden;
            position:relative;
        }

        .dash-items:hover{
            transform:translateY(-6px);
            background:#666;
            box-shadow:0 12px 30px rgba(0,0,0,.35);
        }
        .dash-items-logo{
            width:75px;
            height:75px;
            border-radius:18px;
            background:rgba(255,255,255,.12);
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:34px;
        }

        .dash-items-txt{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            gap:8px;
        }

        .dash-item-head{
            font-size:18px;
            font-weight:600;
            color:rgba(255,255,255,.85);
        }

        .dash-item-val{
            font-size:42px;
            font-weight:700;
            line-height:1;
        }
    </style>
    
</head>

<body>
    <?php 
        include_once("../../includes/navbars/admin_navbar.php"); 
    ?>

    <main>
        <div class="head">
            <h1>Librarian Dashboard</h1>
            <div class="pfp-details">
                <div class="pfp"><?= strtoupper($_SESSION["user"][0]) ?></div>
            </div>
        </div> 
        <div class="dash-contents">
            <div class="dash-items"> 
                <div class="dash-items-logo">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                      Total Books
                    </span>
                    <span class="dash-item-val">
                        <?= $totalBooksRecords ?>
                    </span>
                </div>                
            </div>

            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="fa-regular fa-bookmark"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                      Total Borrowed
                    </span>
                    <span class="dash-item-val">
                        <?= $totalBorrowRecords ?>
                    </span>
                </div>  
            </div>

            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                       Total Review
                    </span>
                    <span class="dash-item-val">
                        <?= $totalReviewRecords ?>
                    </span>
                </div>  
            </div>

            <div class="dash-items">
                <div class="dash-items-logo">
                   <i class="fa-solid fa-user"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                       Total Users
                    </span>
                    <span class="dash-item-val">
                        <?= $totalUserRecords ?>
                    </span>
                </div>  
            </div>

            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                       Total Request
                    </span>
                    <span class="dash-item-val">
                        <?= $totalRequestRecords ?>
                    </span>
                </div>  
            </div>

            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                     Available Books
                    </span>
                    <span class="dash-item-val">
                        <?= $totalBooksRecords - $totalBorrowRecords  ?>
                    </span>
                </div>  
            </div>
        </div>

        <div class="calendar-container">
            <div id="calendar"></div>
        </div>
    </main>
    <script src="../../script/user.js"></script>
</body>
</html>