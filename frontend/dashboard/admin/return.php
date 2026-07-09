<?php
    session_start();
    require_once("../../includes/db.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['borrowed'])) {

            if ($_POST['email'] === "" || $_POST['bookname'] === "") {
                return;
            }

            $useremail = $_POST['email'];
            $bookname = $_POST['bookname'];


            $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ? ");
            mysqli_stmt_bind_param($stmt, 's', $useremail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $userid = mysqli_fetch_assoc($result)['id'];


            $stmt2 = mysqli_prepare($conn, "SELECT id FROM books WHERE name = ? ");
            mysqli_stmt_bind_param($stmt2, 's', $bookname);
            mysqli_stmt_execute($stmt2);
            $result = mysqli_stmt_get_result($stmt2);
            $bookid = mysqli_fetch_assoc($result)['id'];


            $stmtreturn = mysqli_prepare($conn, "DELETE FROM borrowrecords
                                                WHERE user_id= ? AND book_id=?");
            mysqli_stmt_bind_param($stmtreturn, "ii", $userid, $bookid);
            mysqli_stmt_execute($stmtreturn);
        }
    }
    header("location: borrow.php");
    exit();
?>