<!-- Checking whether the user is Logged in or NOT -->
<?php require("../Database/checkLoggedIn.php"); ?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg" style="background-color: #133b70">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="../Images/logo.png" alt="Sports Authority of Gujarat"></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end;flex-direction: row;">
            
                <h5 class="text-white mx-2 my-2">Welcome
                    <?php
                    echo json_decode($_SESSION["userData"], true)[0]["firstName"];
                    ?>
                </h5>
                <form action="../Database/logout.php" method="post" class="my-2">
                    <input type="submit" name="logoutBtn" class="btn btn-danger mx-2 fw-bolder" value="Logout">
                </form>
        </div>
    </div>
</nav>