<?php

class DatabaseCrud
{
    private $connection;

    public function __construct()
    {
        $this->connection = DatabaseConnection::getInstance()->getConnection();
    }

    // CREATE: Insert data into the table (escaping values for safety)
    public function create($table_name, $data)
    {
        $columns = implode(", ", array_keys($data));
        $escaped_values = array_map(function ($value) {
            return mysqli_real_escape_string($this->connection, $value);
        }, array_values($data));
        $values = implode("', '", $escaped_values);
        $sql = "INSERT INTO $table_name ($columns) VALUES ('$values')";

        if (mysqli_query($this->connection, $sql)) {
            return mysqli_insert_id($this->connection);
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }

    // READ: Fetch data from the table, with optional ORDER BY clause
    public function read($table_name, $where = "", $fields = "*", $orderBy = "")
    {
        $sql = "SELECT $fields FROM $table_name";

        // If WHERE condition is provided, append it
        if (!empty($where)) {
            $sql .= " WHERE " . $where;
        }

        // Append the ORDER BY clause or any additional SQL if provided
        if (!empty($orderBy)) {
            $sql .= " " . $orderBy;
        }

        $result = mysqli_query($this->connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // READ with LIMIT: Fetch a limited number of rows from the table
    public function readLIMIT($table_name, $limit = 4)
    {
        $sql = "SELECT * FROM $table_name LIMIT 0, $limit";

        $result = mysqli_query($this->connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // UPDATE: Update data in the table (escaping values for safety)
    public function update($table_name, $data, $where)
    {
        if (empty($where)) {
            return "Error: A WHERE condition is required to update.";
        }

        $updateValues = "";
        foreach ($data as $column => $value) {
            $escaped_value = mysqli_real_escape_string($this->connection, $value);
            $updateValues .= "$column = '$escaped_value', ";
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
        if (empty($where)) {
            return "Error: A WHERE condition is required to delete.";
        }

        $sql = "DELETE FROM $table_name WHERE $where";

        if (mysqli_query($this->connection, $sql)) {
            return mysqli_affected_rows($this->connection);
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }

    // ALTER TABLE: Add columns to a table dynamically
    public function alterTableAddColumn($table_name, $columns)
    {
        $columnDefinitions = [];
        foreach ($columns as $column_name => $column_definition) {
            $columnDefinitions[] = "ADD $column_name $column_definition";
        }
        $sql = "ALTER TABLE $table_name " . implode(", ", $columnDefinitions);

        if (mysqli_query($this->connection, $sql)) {
            return "Columns added successfully to $table_name.";
        } else {
            return "Error adding columns: " . mysqli_error($this->connection);
        }
    }
}
