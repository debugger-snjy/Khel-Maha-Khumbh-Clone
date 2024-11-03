<!-- Checking whether the user is Logged in or NOT -->
<?php require("../Database/checkLoggedIn.php"); ?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="../Images/logo.png" alt="Sports Authority of Gujarat"></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent" style="justify-content: flex-end;">
            <div class="d-flex">
                <h5 class="mx-2 my-0">
                    <a class="text-decoration-none"
                        style="color:<?php echo (str_contains($_SERVER["REQUEST_URI"], "dashboard.php")) ? 'white' : 'grey' ?>;"
                        href="dashboard.php">Dashboard</a>
                </h5>
                <h5 class="mx-2 my-0">
                    <a class="text-decoration-none"
                        style="color:<?php echo (str_ends_with($_SERVER["REQUEST_URI"], "players.php")) ? 'white' : 'grey' ?>;"
                        href="players.php">Players</a>
                </h5>
            </div>
            <div class="d-flex">
                <h5 class="text-white mx-2 my-0">Welcome
                    <?php
                    echo json_decode($_SESSION["userData"], true)[0]["firstName"];
                    ?>
                </h5>
                <form action="../Database/logout.php" method="post" class="my-0">
                    <input type="submit" name="logoutBtn" class="btn btn-danger mx-2 fw-bolder" value="Logout">
                </form>
            </div>
        </div>
    </div>
</nav>