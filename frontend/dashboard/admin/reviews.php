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


    <section id="approval-users">

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>


        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>

        <div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div><div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div><div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div><div class="feedback-card">
          <div class="user-info">
            <img src="https://i.pravatar.cc/80?img=1" alt="user" />
            <div>
              <h3>John Carter</h3>
              <p>Student</p>
            </div>
          </div>
          <div class="rating">⭐⭐⭐⭐⭐</div>
          <p class="feedback-text">
            The library system helped me access books quickly and improved my
            study routine.
          </p>
        </div>

    </section>
    
    </main>
    <script src="../../script/admin.js"></script>
</body>
</html>