<?php
    session_start();
    require_once("../../includes/db.php");
    if(!isset($_SESSION['user']) || !isset($_SESSION['role'])){
        header("location: ../../Auth/logout.php");
        exit();
    }
    
    // accessing user name for select elements
    $stmt = mysqli_prepare($conn, "SELECT email FROM users WHERE role='user'");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);


    // accessing book name for select elements
    $stmt = mysqli_prepare($conn, "SELECT name FROM books");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $books = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // total books borrowed count 
    $stmt = mysqli_prepare($conn, "SELECT count(*) AS total FROM borrowrecords");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $totalborrowedbooks = mysqli_fetch_assoc($result)['total'];


    // user ko books borrowed's ko data storing back to database 
    if($_SERVER['REQUEST_METHOD']==="POST"){
        if(isset($_POST['borrowed'])){

        if($_POST['email']=== "" || $_POST['bookname']=== ""){
            return;
        }

         $useremail = $_POST['email'];
         $bookname = $_POST['bookname'];


        $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ? ");
        mysqli_stmt_bind_param($stmt,'s',$useremail );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $userid = mysqli_fetch_assoc($result)['id'];


        $stmt2 = mysqli_prepare($conn, "SELECT id FROM books WHERE name = ? ");
        mysqli_stmt_bind_param($stmt2,'s',$bookname );
        mysqli_stmt_execute($stmt2);
        $result = mysqli_stmt_get_result($stmt2);
        $bookid = mysqli_fetch_assoc($result)['id'];


         $stmtborrow = mysqli_prepare($conn, "INSERT INTO borrowrecords (user_id, book_id)  VALUES (?,?)");
         mysqli_stmt_bind_param($stmtborrow, "ii", $userid, $bookid);
         mysqli_stmt_execute($stmtborrow);
        }
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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/>
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
                        Total Borrowed Books
                    </span>
                    <span class="dash-item-val">
                        <?= $totalborrowedbooks  ?>
                    </span>
                </div>
            </div>
        </div>


        <div id="borrow-section">
            <form method="POST" id="borrow-form">

        <input list='emails' name='email' id='email' placeholder="user@gmail.com">
        <datalist id='emails'>

            <?php 
                    foreach($users as $user){
                    echo "<option value='{$user['email']}'/>";
                    }
            ?> 

        </datalist>

            <select id="books" name='bookname'>
                <option value="" selected disabled>Select Book</option>

                <?php 
                        foreach($books as $book){
                        echo "<option value='{$book['name']}'>{$book['name']}</option>";
                        }
                ?>
          </select>

          <button type='submit' name='borrowed'>Marked as Borrowed</button>

        </form>
        </div>
        
        <?php include_once("../../includes/borrow_guidelines.php")?>
    </main>
    <script src="../../script/admin.js"></script>
</body>
</html>