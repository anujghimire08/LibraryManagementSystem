<?php
session_start();
include("../../includes/db.php");
if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
    header("location: ../../Auth/logout.php");
    exit();
}


//total borrow records 
$user_id = $_SESSION["id"];
$countStmt = mysqli_prepare(
    $conn,
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
$countReview = mysqli_prepare($conn, "SELECT COUNT(*) AS total FROM reviews
                    WHERE email = ?");
mysqli_stmt_bind_param($countReview, "s", $_SESSION["email"]);
mysqli_stmt_execute($countReview);

$reviewResult = mysqli_stmt_get_result($countReview);
$totalReview = mysqli_fetch_assoc($reviewResult)["total"];
$userId = $_SESSION["id"];

$suggestionStmt = mysqli_prepare($conn, "
    SELECT b.id, b.name, b.author, b.genre, b.imgpath
    FROM Books b
    WHERE b.id NOT IN (
        SELECT book_id
        FROM BorrowRecords
        WHERE user_id = ?
    )
    ORDER BY RAND()
    LIMIT 4
");

mysqli_stmt_bind_param($suggestionStmt, "i", $userId);
mysqli_stmt_execute($suggestionStmt);
$suggestionResult = mysqli_stmt_get_result($suggestionStmt);
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
        * {
            font-family: 'Inter', sans-serif;
        }

        .dash-contents {
            margin: 30px 0;
            display: grid;
            grid-template-columns: repeat(3, minmax(250px, 1fr));
            gap: 25px;
        }

        .dash-items {
            background: rgba(107, 154, 235, 0.41);
            color: black;
            border-radius: 20px;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
            transition: all .25s ease;
            overflow: hidden;
            position: relative;
        }

        .dash-items-logo {
            color: rgb(82, 143, 248);
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: rgba(107, 154, 235, 0.52);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 34px;
        }

        .dash-items-txt {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .dash-item-head {
            font-size: 18px;
            font-weight: 600;
            color: rgb(59, 128, 247);
        }

        .dash-item-val {
            font-size: 42px;
            font-weight: 700;
            line-height: 1;
        }

        .suggestion-section {
            margin-top: 45px;
        }

        .suggestion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .suggestion-header h2 {
            font-size: 28px;
            color: #2d3748;
        }

        .suggestion-header p {
            color: #6b7280;
            margin-top: 5px;
        }

        .suggestion-books {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .suggestion-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            border: 1px solid #e5e7eb;
            transition: .3s;
        }

        .suggestion-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, .12);
        }

        .suggestion-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .book-details {
            padding: 18px;
        }

        .book-details h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #222;
        }

        .book-author {
            color: #6b7280;
            margin-bottom: 10px;
        }

        .book-genre {
            display: inline-block;
            background: #e8f0ff;
            color: #2563eb;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .view-btn {
            display: block;
            margin-top: 18px;
            text-align: center;
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 10px;
            border-radius: 8px;
            transition: .25s;
        }

        .view-btn:hover {
            background: #1d4ed8;
        }
    </style>

</head>

<body>
    <?php
    if ($_SESSION["status"] !== 1) {
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
                        <?= $totalReview ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="suggestion-section">

            <div class="suggestion-header">
                <div>
                    <h2>Suggested Books</h2>
                    <p>Books you may like to read next.</p>
                </div>
            </div>

            <div class="suggestion-books">

                <?php while ($book = mysqli_fetch_assoc($suggestionResult)) { ?>

                    <div class="suggestion-card">

                        <img src="<?= "../../../" . $book["imgpath"] ?>" alt="Book Cover">

                        <div class="book-details">

                            <h3><?= htmlspecialchars($book["name"]) ?></h3>

                            <div class="book-author">
                                <i class="fa-solid fa-user-pen"></i>
                                <?= htmlspecialchars($book["author"]) ?>
                            </div>

                            <span class="book-genre">
                                <?= htmlspecialchars($book["genre"]) ?>
                            </span>

                            <a href="books.php" class="view-btn">
                                View Library
                            </a>

                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>
    </main>
    <script src="../../script/user.js"></script>
</body>

</html>