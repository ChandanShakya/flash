<?php
require "database_connection.php";

class crude {
    private $con;

    public function connect() {
        $db_e = new Database_conn();
        $this->con = $db_e->getConnection();
        return $this->con;
    }

    public function edit($table, $set, $cond) {
        $query1 = '';
        $condi = '';
        $statement = "UPDATE " . $table . " SET ";
        foreach ($set as $k => $v) {
            $query1 .= $k . "='" . $v . "',";
        }
        foreach ($cond as $k => $v) {
            $condi .= $k . "='" . $v . "',";
        }

        $query1 = rtrim($query1, ",");
        $condi = rtrim($condi, ", ");
        $uquery = $statement . $query1 . " WHERE " . $condi;

        $res = mysqli_query($this->con, $uquery);
        if ($res) {
            echo '<script>alert("Successfully updated");</script>';
            echo '<script>window.location.href = "src/results.php";</script>';
            return true; 
        } else {
            return false; 
        }
    }
}
?>