<?php
require "edit_record.php";
session_start();

$e = new crude();
$con = $e->connect();
$table = "user";

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];
$id= $_SESSION['uid'];


$cond = ["id" => $id];
$item= ["fname"=>$fname, "lname"=>$lname, "email"=>$email];

$e-> edit($table, $item, $cond);
?>