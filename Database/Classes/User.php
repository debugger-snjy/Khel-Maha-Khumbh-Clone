<?php
session_start();
?>
<?php

class User extends KhelMahaKhumbDatabase
{
    private $tableName = "users";

    function login($newData, $successLocation, $failedLocation)
    {

        $userPass = $newData["password"];
        $userEmail = $newData["emailID"];

        $sql = "SELECT * FROM " . $this->tableName . " WHERE emailID = '$userEmail' AND password = '$userPass'";
        echo $sql;

        $result = $this->executeQuery($sql);
        print_r($result);

        if ($result) {
            echo "<script>console.log('Found')</script>";
            $_SESSION["userData"] = json_encode($result);
            echo "<script>console.log('" . $_SESSION["userData"] . "')</script>";
            print_r($_SESSION);
            setcookie("message", "Login Successfull !!", time() + (86400 * 30), "/");
            setcookie("messageType", "success", time() + (86400 * 30), "/");
            header("Location: $successLocation");
        } else {
            echo "Not Found";
            setcookie("message", "Login Failed !!", time() + (86400 * 30), "/");
            setcookie("messageType", "failed", time() + (86400 * 30), "/");
            header("Location: $failedLocation");
        }
    }

    
}


?>