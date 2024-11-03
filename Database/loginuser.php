<?php

require "./Classes/Connection.php";
require "./Classes/PlayerClass.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userData = array(
        "emailID" => $_POST["playerEmailID"],
        "password" => $_POST["playerPassword"],
    );

    print_r($userData);

    // Triming the Whitespace for Given Data :
    foreach ($userData as $key => $value) {
        if (is_int($value)) {
            $userData[$key] = (int) trim($value);
        } else {
            $userData[$key] = trim($value);
        }
    }

    print_r($userData);

    $player = new Player();
    $successLocation = "../player/dashboard.php";
    $failedLocation = "../login.html";
    $player->loginplayer($userData, $successLocation, $failedLocation);
}

?>