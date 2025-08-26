<?php
require "ins_result.php";

session_start();

$r = new save();
$con=$r->connect();

$t = new save();
$con= $t->connect();

$username = $_SESSION['username'];
$level = $_POST['levelValue'];
$wpm = $_POST['wpmValue'];
$mistake = $_POST['mistakeValue'];
$cpm = $_POST['cpmValue'];
$date = date('Y-m-d');
$_SESSION["accuracy"] =$_POST['accuracy'];

$table = "result";
$table1= "test";

$item = ["uname"=>$username, "level"=>$level, "wpm"=>$wpm, "mistake"=>$mistake, "cpm"=>$cpm, "date"=>$date];

$itemm =["uname"=>$username, "level"=>$level, "wpm"=>$wpm];

$r ->insert_result($table, $item);

$t -> insert_test($table1,$itemm);

?>

