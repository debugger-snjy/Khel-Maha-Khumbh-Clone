<!-- Checking whether the user is Logged in or NOT -->
<?php require("../Database/checkLoggedIn.php"); ?>

<?php
session_start();
echo "<script>console.log('Dashboard : " . $_SESSION["userData"] . "')</script>";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Authority of Gujarat</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once("adminNavBar.php");
    ?>

    <div class="my-4 mx-3">
        <!-- Alert Messages -->
        <div class="alert alert-success alert-dismissible fade show" id="successalertBox" role="alert">
            <strong id="successMsg"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="alert alert-danger alert-dismissible fade show" id="dangeralertBox" role="alert">
            <strong id="dangerMsg"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="bg-white mainCard my-4">

        <button class="btn btn-dark w-25 p-4 fs-3 fw-bolder"
            onclick="window.location.href = './players.php'">Players</button>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- jQuery Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- jQuery Validation Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- jQuery Cookie Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- My Script -->
    <script src="../JS/script.js"></script>

</body>

</html>