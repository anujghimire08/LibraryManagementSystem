<?php
    $db_server = "localhost";
    $db_user ="root";
    $db_pass = "sql123";
    $db_name = "LMS";
    
    try{
        $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
        // echo "connected";
    }
    catch(mysqli_sql_exception){
        echo "couldnt connect to database";
    }
?>