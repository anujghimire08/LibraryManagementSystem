<?php
    session_start();
    include("../../includes/db.php");

    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_SESSION["user"];
        $email = $_SESSION["email"];
        $review = filter_input(INPUT_POST,"review",FILTER_SANITIZE_SPECIAL_CHARS); 

        $stmt = mysqli_prepare($conn,"
                    INSERT INTO reviews(name,email,reviews)
                    VALUES (?,?,?)");
        mysqli_stmt_bind_param($stmt,"sss",$name,$email,$review);
        mysqli_stmt_execute($stmt);
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
    <style>
        .form-div{
            height:80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form{
            font-size: larger;

            padding:10px;

            border: 1px solid rgb(176, 174, 174);
            border-radius:10px;
        }
        input{
            margin:10px 0px;
            width:500px;
        }
        textarea{
            margin: 10px 0px;
            width: 500px;
            height: 100px;
            resize: none;
        }
        input,textarea{
            font-size: medium;
            padding: 5px;
            border-radius: 5px;
        }
        .submit{
            font-size: large;
            background-color: #6b9aeb;
            border-radius: 5px;
            border:1px solid black;
        }
        .submit:hover{
            background-color: #5b93f3;
            transform: translateY(-2px);
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
        
        <div class="form-div">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <label for="name">Name:</label>
                <br>
                <input type="text" name="name" id="name" value="<?= $_SESSION["user"] ?>" disabled> <br>
                <label for="review">Your Review Here:</label><br>
                <textarea name="review" id="reviwe" maxlength="80" placeholder="Write your message in 80 character"></textarea><br>
                <input class="submit" type="submit" value="Submit">
            </form>
        </div>
        
    </main>
    <script src="../../script/user.js"></script>
</body>
</html>