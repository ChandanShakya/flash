<?php

require 'database_connection.php';

class crudu
{
    private $con;

    public function connect()
    {
        $db_c = new Database_conn;
        $this->con = $db_c->getConnection();

        return $this->con;
    }

    public function update($table, $set, $cond)
    {
        $query1 = '';
        $condi = '';
        $statement = 'UPDATE '.$table.' SET ';
        foreach ($set as $k => $v) {
            $query1 .= $k."='".$v."',";
        }
        foreach ($cond as $k => $v) {
            $condi .= $k."='".$v."',";
        }

        $query1 = rtrim($query1, ',');
        $condi = rtrim($condi, ', ');
        $uquery = $statement.$query1.' WHERE '.$condi;
        $res = mysqli_query($this->con, $uquery);
        if ($res) {
            echo '<script>alert("Successfully updated");</script>';
            echo '<script>window.location.href = "src/login.php";</script>';

            return true;
        } else {
            return false;
        }
    }

    public function usernameExists($table, $cond)
    {
        $condi = '';
        foreach ($cond as $k => $v) {
            $condi .= $k."='".$v."',";
        }
        $condi = rtrim($condi, ', ');
        $query = 'SELECT COUNT(*) FROM '.$table.' WHERE '.$condi;
        $result = mysqli_query($this->con, $query);
        $row = mysqli_fetch_array($result); // fetches a row

        return $row[0] > 0; // checks if the first element of the $row array is greater than 0.
        // If the count is greater than 0, it means that the username exists in the table.
    }
}
