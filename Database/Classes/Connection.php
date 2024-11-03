<?php
// session_start();

class KhelMahaKhumbDatabase
{

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;

    public function __construct($database = "KhelMahaKhumb")
    {
        // session_start();

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

            $result = $this->conn->query($sql);

            if ($result) {
                // If the query was an INSERT, DELETE, or UPDATE
                if (stripos($sql, 'INSERT') === 0 || stripos($sql, 'DELETE') === 0 || stripos($sql, 'UPDATE') === 0) {
                    // Get the number of affected rows
                    $affectedRows = $this->conn->affected_rows;

                    // Return the affected rows
                    return $affectedRows;
                } else { // If the query was a SELECT
                    // Store the result set in memory
                    mysqli_store_result($this->conn);

                    $queryResultInAssocArr = [];

                    // Fetch the rows from the result set as associative arrays
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Add each row to the data array
                        $queryResultInAssocArr[] = $row;
                    }

                    return $queryResultInAssocArr;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
                return -1;
            }
        } catch (Exception $exp) {
            echo $exp->getMessage();
            return -1;
        }
    }

    static function logout()
    {
        session_destroy();
    }

    function __destruct()
    {
        // Closing the Connection
        mysqli_close($this->conn);
    }

}

?>