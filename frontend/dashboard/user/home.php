<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../../css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <?php include_once("../../includes/navbars/user_navbar.php"); ?>

    <main>
        <div class="head">
            <h1>USER DASHBOARD</h1>
            <div class="pfp-details">
                <div class="pfp">B</div>
            </div>
        </div> 
        <div class="dash-contents">
            <div class="dash-items"> 
                <span class="dash-contents-head">
                    books
                </span>
            </div>
            <div class="dash-items">
                <span class="dash-contents-head">
                    Borrowed
                </span>
            </div>
            <div class="dash-items">
                <span class="dash-contents-head">
                    to review
                </span>
            </div>
            <div class="dash-items">
                <span class="dash-contents-head">
                    returned
                </span>
            </div>
        </div>
    </main>
    <script src="../../script/user.js"></script>
</body>
</html>