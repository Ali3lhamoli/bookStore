<?php

class DatabaseConnection
{
    // Hold single instance of class
    private static $instance;

    // Store connection
    private $connection;

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "bookstore";

    // Private constructor to prevent multiple instances
    private function __construct()
    {
        // Establish connection without selecting a database first
        $this->connection = new mysqli($this->host, $this->username, $this->password);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $sql = "SHOW DATABASES LIKE '$this->dbname'";
        $result = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $this->selectDatabase();
        }
    }
    // Get the single instance of the class
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }

        return self::$instance;
    }

    // Get the active connection
    public function getConnection()
    {
        return $this->connection;
    }

    // Select the database after creating it
    public function selectDatabase()
    {
        return $this->connection->select_db($this->dbname);
    }

    // Get the database name
    public function getDbName()
    {
        return $this->dbname;
    }

    // Close the connection
    public function closeConnection()
    {
        $this->connection->close();
    }

    // Prevent cloning
    public function __clone()
    {
        trigger_error("Clone is not allowed.", E_USER_ERROR);
    }

    // Prevent unserializing
    public function __wakeup()
    {
        trigger_error("Unserializing is not allowed.", E_USER_ERROR);
    }
}
