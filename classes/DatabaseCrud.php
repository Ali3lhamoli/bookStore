<?php
 
class DatabaseCrud
{
    private $connection;

    public function __construct()
    {
        $this->connection = DatabaseConnection::getInstance()->getConnection();
    }

  // CREATE: Insert data into the table
  public function create($table_name, $data)
  {
      $columns = implode(", ", array_keys($data));
      $values = implode("', '", array_values($data));
      $sql = "INSERT INTO $table_name ($columns) VALUES ('$values')";

      if (mysqli_query($this->connection, $sql)) {
          return mysqli_insert_id($this->connection);
      } else {
          return "Error: " . mysqli_error($this->connection);
      }
  }

    // READ: Fetch data from the table
    public function read($table_name, $where = "", $fields = "*")
    {
        $sql = "SELECT $fields FROM $table_name";
        if ($where) {
            $sql .= " WHERE $where";
        }

        $result = mysqli_query($this->connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    public function readLIMIT($table_name)
    {
        $sql= "SELECT * from $table_name LIMIT 0,4" ;

      

        $result = mysqli_query($this->connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

      
    // UPDATE: Update data in the table
    public function update($table_name, $data, $where)
    {
        $updateValues = "";
        foreach ($data as $column => $value) {
            $updateValues .= "$column = '$value', ";
        }
        $updateValues = rtrim($updateValues, ', ');

        $sql = "UPDATE $table_name SET $updateValues WHERE $where";

        if (mysqli_query($this->connection, $sql)) {
            return mysqli_affected_rows($this->connection);
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }

    // DELETE: Delete data from the table
    public function delete($table_name, $where)
    {
        $sql = "DELETE FROM $table_name WHERE $where";

        if (mysqli_query($this->connection, $sql)) {
            return mysqli_affected_rows($this->connection);
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
}
