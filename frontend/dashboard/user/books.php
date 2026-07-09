<?php
    session_start();

    include("../../includes/db.php");

    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }

    // Number of books per page
    $booksPerPage = 5;

    // Current page
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    if($page < 1){
        $page = 1;
    }

    // Starting record
    $start = ($page - 1) * $booksPerPage;

    // Count total books
    $countQuery = "SELECT COUNT(*) AS total FROM Books";
    $countResult = mysqli_query($conn, $countQuery);
    $countRow = mysqli_fetch_assoc($countResult);

    $totalBooks = $countRow["total"];
    $totalPages = ceil($totalBooks / $booksPerPage);

    // Get books for current page
    $stmt = mysqli_prepare($conn,
        "SELECT * FROM Books
        LIMIT ?, ?");

    mysqli_stmt_bind_param($stmt,"ii",$start,$booksPerPage);

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
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

        .dash-items{
            width: 330px;
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
        .books-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(220px,1fr));
            gap:25px;
            margin-top:30px;
        }

        .book-card{
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:18px;
            display:flex;
            flex-direction:column;
            transition:.25s;
        }

        .book-card:hover{
            transform:translateY(-5px);
            box-shadow:0 8px 20px rgba(0,0,0,.08);
        }

        .book-card img{
            width:130px;
            height:190px;
            object-fit:cover;
            margin:0 auto 18px;
            border-radius:6px;
        }

        .book-card h3{
            font-size:18px;
            margin-bottom:5px;
        }

        .author{
            color:#666;
            font-size:15px;
        }

        .category{
            color:#999;
            font-size:14px;
            margin:5px 0 12px;
        }

        .status{
            display:inline-block;
            align-self:flex-start;
            background:#dcfce7;
            color:#15803d;
            padding:4px 10px;
            border-radius:20px;
            font-size:13px;
            font-weight:600;
            margin-bottom:15px;
        }
    </style>
</head>

<body>
    <?php 
        if($_SESSION["status"] == "pending"){
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
                <h2>Books</h2>
                <p>Explore and discover books available in the library</p>
            </div>
            <div class="dash-items">
                <div class="dash-items-logo">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div class="dash-items-txt">
                    <span class="dash-item-head">
                        Total Books
                    </span>
                    <span class="dash-item-val">
                        <?= $totalBooks ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="books-grid">

            <?php
            while($book = mysqli_fetch_assoc($result)){
            ?>

                <div class="book-card">

                    <img src="../../images/books/default.jpg" alt="Book">

                    <h3><?= htmlspecialchars($book["name"]) ?></h3>

                    <p class="author">
                        <?= htmlspecialchars($book["author"]) ?>
                    </p>

                    <p class="category">
                        <?= htmlspecialchars($book["genre"]) ?>
                    </p>

                    <span class="status">
                        Available
                    </span>

                </div>

            <?php
            }
            ?>

        </div>
        <div style="margin-top:30px; display:flex; justify-content:center; gap:10px;">

        <?php
        for($i = 1; $i <= $totalPages; $i++){
        ?>

            <a
                href="?page=<?= $i ?>"
                style="
                    padding:10px 15px;
                    border:1px solid #2563eb;
                    border-radius:6px;
                    text-decoration:none;
                    <?= ($page == $i)
                        ? 'background:#2563eb;color:white;'
                        : 'background:white;color:#2563eb;' ?>
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