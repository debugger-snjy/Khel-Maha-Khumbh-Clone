<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset ($_SESSION["userData"])) {
    setcookie("message", "Kindly Login to Access !!", time() + (86400 * 30), "/");
    setcookie("messageType", "danger", time() + (86400 * 30), "/");
    header("Location:../login.html");
}
?>