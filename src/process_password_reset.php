<?php

require 'update_user.php';

$u = new crudu;
$con = $u->connect();
$table = 'user';

$npass = $_POST['npass'];
$cpass = $_POST['cpass'];
$uname = $_POST['uname'];

$hash_npw = password_hash($npass, PASSWORD_DEFAULT);
$hash_cpw = password_hash($cpass, PASSWORD_DEFAULT);

$cond = ['uname' => $uname];
$item = ['password' => $hash_npw, 'cpassword' => $hash_cpw];

$minLength = 8;
$msg = [];

if (empty($uname) || empty($npass) || empty($cpass)) {
    $msg[] = 'Please enter all necessary details.';
} elseif (! ($u->usernameExists($table, $cond))) {
    echo '<script>alert("Did not find the username");</script>';
    echo '<script>window.location.href = "src/forgot_password.php";</script>';
    $msg[] = 'User not found';
} elseif (strlen($npass) < $minLength) {
    $msg[] = "Password should have at least $minLength characters.";
} elseif (! preg_match('/[A-Z]/', $npass)) {
    $msg[] = 'Password should contain at least one uppercase letter.';
} elseif (! preg_match('/[a-z]/', $npass)) {
    $msg[] = 'Password should contain at least one lowercase letter.';
} elseif (! preg_match("/\d/", $npass)) {
    $msg[] = 'Password should contain at least one number.';
} elseif ($npass !== $cpass) {
    $msg[] = 'Passwords do not match.';
}
if (! empty($msg)) {
    foreach ($msg as $value) {
        echo $value.'<br>';
    }
} else {
    echo 'Successful';
    $u->update($table, $item, $cond);
}

// $item = ["password" => $npass, "cpassword" => $cpass];
