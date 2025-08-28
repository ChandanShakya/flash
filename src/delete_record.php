<?php

$con = mysqli_connect('localhost', 'root', '', 'project');
$res_id = $_GET['r_id'];

$sql = "DELETE FROM result WHERE result_id = '$res_id'";

if (mysqli_query($con, $sql)) {
    header('location:src/results.php');
} else {
    echo "<script>alert('Failed to delete the record.');</script>";
}
