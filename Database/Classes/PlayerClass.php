<?php


class Player extends KhelMahaKhumbDatabase
{
    private $tableName = "players";

    function register($newData)
    {

        $colFields = array_keys($newData);
        $colValues = array_values($newData);

        foreach ($colValues as $index => $value) {
            if (is_string($value)) {
                // $valuesInQuery .= "'$value'";
                $colValues[$index] = "'$value'";
            } else if (is_integer($value)) {
                // $valuesInQuery .= $value;
                $colValues[$index] = $value;
            }
        }

        $sql = "INSERT INTO " . $this->tableName . " (" . implode(", ", $colFields) . ") VALUES (" . implode(", ", $colValues) . ")";

        // TODO : Check For the Execution !!
        $affectedRows = $this->executeQuery($sql)["affected_rows"];

        if ($affectedRows >= 0) {
            echo "Added";
            setcookie("message", "Your Record has been Inserted Successfully !!", time() + (86400 * 30), "/");
            setcookie("messageType", "success", time() + (86400 * 30), "/");
            // setcookie("affectedRows", $affectedRows, time() + (86400 * 30), "/");
        } else {
            echo "Not Added";
            setcookie("message", "Your Record has NOT Inserted Successfully !!", time() + (86400 * 30), "/");
            setcookie("messageType", "failed", time() + (86400 * 30), "/");
            // setcookie("affectedRows", $affectedRows, time() + (86400 * 30), "/");
        }
    }

    function fetch()
    {
        echo "<script>console.log('Fetching !!');</script>";
        $sql = "SELECT * FROM " . $this->tableName . ";";

        $result = $this->executeQuery($sql);

        // if ($result) {
        //     setcookie("message", "All Players Fetched Successfully !!", time() + (86400 * 30), "/");
        //     setcookie("messageType", "success", time() + (86400 * 30), "/");
        // } else {
        //     setcookie("message", "All Players NOT Fetched Successfully !!", time() + (86400 * 30), "/");
        //     setcookie("messageType", "danger", time() + (86400 * 30), "/");
        // }

        return $result;
    }

    function fetchByID($playerID)
    {
        echo "<script>console.log('Fetching !!');</script>";
        $sql = "SELECT * FROM " . $this->tableName . " where playerId = " . $playerID . ";";

        $result = $this->executeQuery($sql);

        if ($result) {
            setcookie("message", "Player Data Fetched Successfully !!", time() + (86400 * 30), "/");
            setcookie("messageType", "success", time() + (86400 * 30), "/");
        } else {
            setcookie("message", "Player Data NOT Fetched Successfully !!", time() + (86400 * 30), "/");
            setcookie("messageType", "danger", time() + (86400 * 30), "/");
        }

        return $result;
    }

    function deleteByID($playerID)
    {

        // Fetching the User Data
        $userData = $this->fetchByID($playerID);

        if ($userData) {
            // Deleting the Profile Image of the user
            unlink($userData[0]["profileImage"]);

            echo "<script>console.log('Fetching !!');</script>";
            $sql = "DELETE FROM " . $this->tableName . " where playerId = " . $playerID . ";";

            $result = $this->executeQuery($sql);

            if ($result) {
                setcookie("message", "Player Deleted Successfully !!", time() + (86400 * 30), "/");
                setcookie("messageType", "success", time() + (86400 * 30), "/");
            } else {
                setcookie("message", "Player Deletion Failed !!", time() + (86400 * 30), "/");
                setcookie("messageType", "danger", time() + (86400 * 30), "/");
            }

            return $result;
        } else {
            setcookie("message", "Player NOT Found !!", time() + (86400 * 30), "/");
            setcookie("messageType", "danger", time() + (86400 * 30), "/");
        }


    }

    function updatePlayerData($updatedData)
    {

        // Fetching the User Data
        $userData = $this->fetchByID((int)$updatedData["playerId"]);

        if ($userData) {

            $sqlQuery = "Update " . $this->tableName . " \nSET ";

            foreach ($updatedData as $index => $value) {

                $sqlQuery .= $index . " = ";

                if (is_string($value)) {
                    // $valuesInQuery .= "'$value'";
                    $sqlQuery .= "'$value'";
                } else if (is_integer($value)) {
                    // $valuesInQuery .= $value;
                    $sqlQuery .= $value;
                }

                if ($index != array_key_last($updatedData)) {
                    $sqlQuery .= ", ";
                } else {
                    $sqlQuery .= " ";
                }
            }

            $sqlQuery .= "WHERE playerId = " . $updatedData["playerId"] . ";";

            echo "<hr>" . $sqlQuery;

            $resultAffectedRows = $this->executeQuery($sqlQuery);

            if ($resultAffectedRows > 0) {
                echo "Updated";
                setcookie("message", "Your Record has been Updated Successfully !!", time() + (86400 * 30), "/");
                setcookie("messageType", "success", time() + (86400 * 30), "/");
            } else {
                echo "Not Updated";
                setcookie("message", "Your Record has NOT Updated Successfully !!", time() + (86400 * 30), "/");
                setcookie("messageType", "failed", time() + (86400 * 30), "/");
            }
        } else {
            setcookie("message", "Player NOT Found !!", time() + (86400 * 30), "/");
            setcookie("messageType", "danger", time() + (86400 * 30), "/");
        }
        return $resultAffectedRows;

    }

    function loginplayer($playerCredentials, $successLocation, $failedLocation)
    {
        session_start();

        $userPass = $playerCredentials["password"];
        $userEmail = $playerCredentials["emailID"];

        $sql = "SELECT * FROM " . $this->tableName . " WHERE email = '$userEmail'";
        echo $sql;

        $result = $this->executeQuery($sql);
        print_r($result);
        // echo "<hr>" . $result[0]["password"] . "<hr>";
        // echo "<hr>" . $userPass . "<hr>";
        // echo "<hr>" . password_verify($userPass,$result[0]["password"]) . "<hr>";

        // Adding the User Role // Here it will be User
        $result[0]["role"] = "User";

        if (password_verify($userPass, $result[0]["password"])) {
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