<?php
session_start();
include("../../includes/db.php");

if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
    header("location: ../../Auth/logout.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_SESSION["user"];
    $email = $_SESSION["email"];
    $review = filter_input(INPUT_POST, "review", FILTER_SANITIZE_SPECIAL_CHARS);

    if (trim($review) != "") {
        $stmt = mysqli_prepare($conn, "
                    INSERT INTO reviews(name,email,reviews)
                    VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $review);
        mysqli_stmt_execute($stmt);
    }
}

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
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        .form-div {
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            background: #f5f7fb;
        }

        .review-card {
            width: 100%;
            max-width: 650px;
            background: #fff;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .review-card h2 {
            margin-bottom: 8px;
            color: #2d3748;
        }

        .review-card p {
            color: #6b7280;
            margin-bottom: 25px;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            transition: .25s;
            background: #fff;
        }

        input[type="text"] {
            background: #f3f4f6;
            cursor: not-allowed;
        }

        textarea {
            min-height: 140px;
            resize: none;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #4f8df9;
            box-shadow: 0 0 0 3px rgba(79, 141, 249, .15);
        }

        .char-count {
            text-align: right;
            font-size: 13px;
            color: #6b7280;
            margin-top: 6px;
        }

        .submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #4f8df9;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .25s;
        }

        .submit:hover {
            background: #3478f6;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(79, 141, 249, .25);
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

        <div class="form-div">
            <div class="review-card">

                <h2>Leave a Review</h2>
                <p>Share your experience with our library. Your feedback helps us improve.</p>

                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            value="<?= htmlspecialchars($_SESSION["user"]) ?>"
                            disabled>
                    </div>

                    <div class="form-group">
                        <label for="review">Review</label>

                        <textarea
                            name="review"
                            id="review"
                            maxlength="80"
                            placeholder="Write your review here..."
                            required></textarea>

                        <div class="char-count">
                            <span id="count">0</span>/80 characters
                        </div>
                    </div>

                    <input class="submit" type="submit" value="Submit Review">

                </form>

            </div>
        </div>

    </main>
    <script src="../../script/user.js"></script>
</body>

</html>