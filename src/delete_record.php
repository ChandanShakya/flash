<?php

require 'database_connection.php';

$db = new Database_conn;
$con = $db->getConnection();

$res_id = $_GET['r_id'];

$sql = "DELETE FROM result WHERE result_id = '$res_id'";

if (mysqli_query($con, $sql)) {
    header('location:results.php');
} else {
    echo "<script>alert('Failed to delete the record.');</script>";
}
