<?php

class KhelMahaKhumbDatabase
{

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;

    public function __construct($database = "KhelMahaKumbh")
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = $database;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            echo "<script>console.log('Connection Failed');</script>";
        } else {
            echo "<script>console.log('Connection Successfull');</script>";
        }
    }

    function executeQuery($sql)
    {
        try {
            if ($this->conn->query($sql) === TRUE) {
                $affected_rows = $this->conn->affected_rows;
                echo "New record created successfully. Affected rows: $affected_rows";
                return $affected_rows;
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
                return -1;
            }
        } catch (Exception $exp) {
            echo $exp->getMessage();
            return -1;
        }
    }

    function __destruct()
    {
        // Closing the Connection
        mysqli_close($this->conn);
    }

}

?>