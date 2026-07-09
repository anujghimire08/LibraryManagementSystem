<?php
    session_start();
    include("../../includes/db.php");
    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }


    //total borrow records 
    $user_id = $_SESSION["id"];
    $countStmt = mysqli_prepare($conn,
        "SELECT COUNT(*) AS total
        FROM BorrowRecords
        WHERE user_id = ?"
    );

    mysqli_stmt_bind_param($countStmt, "i", $user_id);
    mysqli_stmt_execute($countStmt);

    $countResult = mysqli_stmt_get_result($countStmt);
    $totalRecords = mysqli_fetch_assoc($countResult)["total"];


    //total books count
    $countQuery = "SELECT COUNT(*) AS total FROM Books";
    $countResult = mysqli_query($conn, $countQuery);
    $countRow = mysqli_fetch_assoc($countResult);

    $totalBooks = $countRow["total"];

    //total reviews
    $countReview = mysqli_prepare($conn,"SELECT COUNT(*) AS total FROM reviews
                    WHERE email = ?");
    mysqli_stmt_bind_param($countReview,"s",$_SESSION["email"]);
    mysqli_stmt_execute($countReview);

    $reviewResult = mysqli_stmt_get_result($countReview);
    $totalReview = mysqli_fetch_assoc($reviewResult)["total"];
                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
        .dash-contents{
            margin:30px 0;
            display:grid;
            grid-template-columns:repeat(3,minmax(250px,1fr));
            gap:25px;
        }

        .dash-items{
            background:rgba(107, 154, 235, 0.41);
            color:black;
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
        .dash-items-logo{
            color:rgb(82, 143, 248);
            width:75px;
            height:75px;
            border-radius:50%;
            background:rgba(107, 154, 235, 0.52);
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
            color:rgb(59, 128, 247);
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
        if($_SESSION["status"]!== 1){
            include("status.php");
        }
        include_once("../../includes/navbars/user_navbar.php"); 
    ?>

    <main>
        <div class="head">
            <h1>User Dashboard</h1>
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
                        Books
                    </span>
                    <span class="dash-item-val">
                        <?= $totalBooks ?>
                    </span>
                </div>                
            </div>
            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="ri-bookmark-fill"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                        Borrowed
                    </span>
                    <span class="dash-item-val">
                        <?= $totalRecords ?>
                    </span>
                </div>  
            </div>
            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="ri-feedback-fill"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                        Review
                    </span>
                    <span class="dash-item-val">
                        <?= $totalReview?>
                    </span>
                </div>  
            </div>
        </div>
    </main>
    <script src="../../script/user.js"></script>
</body>
</html>