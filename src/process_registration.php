<?php

require 'registration.php';

$i = new crudi;

$con = $i->connect();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
$email = $_POST['email'];

$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['email'] = $_POST['email'];

$hash_pw = password_hash($pass, PASSWORD_DEFAULT);
$hash_cpw = password_hash($cpass, PASSWORD_DEFAULT);
$table = 'user';
$item = ['fname' => $fname, 'lname' => $lname, 'uname' => $uname, 'password' => $hash_pw, 'cpassword' => $hash_cpw, 'email' => $email];

// server side validation
// unique uname
$sql = "select * from user where uname= '$uname'";
$result = mysqli_query($con, $sql);
$numrows = mysqli_num_rows($result);

// name length
$flen = strlen($fname);
$llen = strlen($lname);

// pass length
$minLength = 8;

$msg = [];
if ($numrows > 0) {
    echo "<script>alert('Username has been taken.');window.location.href = 'register.php';</script>";
    $msg[] = 'Username has been taken.';
} elseif (empty($fname) || empty($lname) || empty($uname) || empty($pass) || empty($cpass) || empty($email)) {
    $msg[] = 'Please enter all necessary details.';
} elseif ($flen > 10 || $llen > 10) {
    $msg[] = 'Name cannot be longer than 10 letters.';
} elseif (strlen($pass) < $minLength) {
    $msg[] = "Password should have at least $minLength characters.";
} elseif (! preg_match('/[A-Z]/', $pass)) {
    $msg[] = 'Password should contain at least one uppercase letter.';
} elseif (! preg_match('/[a-z]/', $pass)) {
    $msg[] = 'Password should contain at least one lowercase letter.';
} elseif (! preg_match("/\d/", $pass)) {
    $msg[] = 'Password should contain at least one number.';
} elseif ($pass !== $cpass) {
    $msg[] = 'Passwords do not match.';
} elseif (! preg_match('/^[A-Za-z]+$/', $fname) || ! preg_match('/^[A-Za-z]+$/', $lname)) {
    $msg[] = 'Name cannot contain numbers or special symbols.';
} elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg[] = 'Please enter a valid email address.';
}
if (! empty($msg)) {
    foreach ($msg as $value) {
        echo $value.'<br>';
    }
} else {
    $i->insert($table, $item);
    echo 'Successfully Inserted';
}
