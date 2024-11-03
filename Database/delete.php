<!-- Checking whether the user is Logged in or NOT -->
<?php require("checkLoggedIn.php"); ?>

<?php

require "./Classes/Connection.php";
require "./Classes/PlayerClass.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteBtn"])) {

    $deletePlayer = new Player();
    $result = $deletePlayer->deleteByID($_POST["playerId"]);

    if ($result) {
        header("Location: ../Admin/players.php");
    } else {
        header("Location: ../Admin/deleteplayer.php");
    }

}
?>