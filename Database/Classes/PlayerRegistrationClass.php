<?php
class PlayerRegistration extends KhelMahaKhumbDatabase
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

        if ($affectedRows = $this->executeQuery($sql) >= 0) {
            echo "Added";
            setcookie("message", "Your Record has been Inserted Successfully !!", time() + (86400 * 30), "/");
            setcookie("messageType", "success", time() + (86400 * 30), "/");
            setcookie("affectedRows", $affectedRows, time() + (86400 * 30), "/");
        } else {
            echo "Not Added";
            setcookie("message", "Your Record has NOT Inserted Successfully !!", time() + (86400 * 30), "/");
            setcookie("messageType", "failed", time() + (86400 * 30), "/");
            setcookie("affectedRows", $affectedRows, time() + (86400 * 30), "/");
        }
    }
}


?>