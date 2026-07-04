
<section class="status_div">
        <img src="https://cdn-icons-png.flaticon.com/512/8832/8832880.png" id="status-logo">
        <div class="status_msg">
            <p><?= "Name: " . $_SESSION["user"] ?></p>
            <p><?= "Email: " . $_SESSION["email"] ?></p>
            <p><?= "Status: " . "Pending" ?></p>
            <p style="text-align: center;font-weight:bold; margin-top:10px">Please wait for the registration to be approved by the admin</p>
        </div>
    </section>