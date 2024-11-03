<?php

require "./Classes/Connection.php";
require "./Classes/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userData = array(
        "emailID" => $_POST["userEmailID"],
        "password" => $_POST["userPassword"],
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

    // Adding the User Role // Here it will be Admin
    $userData["role"] = "Admin";

    $user = new User();
    $successLocation = "../Admin/dashboard.php";
    $failedLocation = "../Admin/index.html";
    $user->login($userData, $successLocation, $failedLocation);
}

?>