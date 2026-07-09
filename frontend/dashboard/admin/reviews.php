<?php
    session_start();
    require_once("../../includes/db.php");
    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }

    $stmt = mysqli_prepare($conn, "SELECT * FROM reviews");

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $reviews = mysqli_fetch_all($result,MYSQLI_ASSOC);

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
    </style>
</head>

<body>
    <?php include_once("../../includes/navbars/admin_navbar.php"); ?>

    <main>
        <div class="head">
            <h1>ADMIN DASHBOARD</h1>
            <div class="pfp-details">
                <div class="pfp"><?= strtoupper($_SESSION["user"][0]) ?></div>
            </div>
        </div> 


    <section id="approval-users">


      <?php 
           
          foreach($reviews as $review){?>
            <div class='feedback-card'>
            <div class='user-info'>
              <img src='../../../assets/defaultprofile.jpg' alt="<?= htmlspecialchars($review['name']) ?>" />
              <div>
                <h3><?= htmlspecialchars($review['name']) ?></h3>
                <p><?= htmlspecialchars($review['email']) ?></p>
              </div>
            </div>
            <p class='feedback-text'>
              <?= htmlspecialchars($review['reviews'])  ?>
            </p>
          </div>
          <?php } ?>

      
        
        

    </section>
    
    </main>
    <script src="../../script/admin.js"></script>
</body>
</html>