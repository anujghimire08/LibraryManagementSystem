<?php
require_once("db.php");

$sql = "
SELECT
    borrowrecords.id,
    users.name AS username,
    books.name AS bookname,
    borrowrecords.due_date
FROM borrowrecords
JOIN users
    ON borrowrecords.user_id = users.id
JOIN books
    ON borrowrecords.book_id = books.id
WHERE borrowrecords.return_date IS NULL
";

$result = mysqli_query($conn, $sql);

$events = [];

while($row = mysqli_fetch_assoc($result)){

    $events[] = [
        "id" => $row["id"],
        "title" => "Due:" . $row["username"] . " - " . $row["bookname"],
        "start" => $row["due_date"],
        "color" => "#6b9aeb"
    ];
}

header("Content-Type: application/json");
echo json_encode($events);