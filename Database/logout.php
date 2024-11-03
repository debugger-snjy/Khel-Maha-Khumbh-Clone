<!-- Checking whether the user is Logged in or NOT -->
<?php require("checkLoggedIn.php"); ?>

<?php
session_start();

require "./Classes/Connection.php";
require "./Classes/User.php";

echo "<script>console.log('Hell');</script>";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["logoutBtn"]) {
    
    KhelMahaKhumbDatabase::logout();
    if(json_decode($_SESSION["userData"], true)[0]["role"] == "User"){
        header("Location: ../login.html");
    }
    else{
        header("Location: ../Admin/index.html");
    }
}

?>