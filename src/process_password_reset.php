<?php
require "update_user.php";

$u = new crudu();
$con = $u->connect();
$table = "user";

$npass = $_POST['npass'];
$cpass = $_POST['cpass'];
$uname = $_POST['uname'];

$hash_npw = password_hash($npass, PASSWORD_DEFAULT);
$hash_cpw = password_hash ( $cpass, PASSWORD_DEFAULT);

$cond = ["uname" => $uname];
$item= ["password"=>$hash_npw, "cpassword"=>$hash_cpw];

$minLength = 8;
$msg =array();

if (empty($uname) || empty($npass) || empty($cpass)) {
    $msg[] ="Please enter all necessary details.";
}
else if (!($u->usernameExists($table, $cond))) {
    echo '<script>alert("Did not find the username");</script>';
    echo '<script>window.location.href = "src/forgot_password.php";</script>';
    $msg[]= "User not found";
}
else if (strlen($npass) < $minLength) {
    $msg[] = "Password should have at least $minLength characters.";
}

else if (!preg_match("/[A-Z]/", $npass)) {
    $msg[] = "Password should contain at least one uppercase letter.";
}

else if (!preg_match("/[a-z]/", $npass)) {
    $msg[] = "Password should contain at least one lowercase letter.";
}

else if (!preg_match("/\d/", $npass)) {
    $msg[] = "Password should contain at least one number.";
}

else if ($npass !== $cpass) {
    $msg[] = "Passwords do not match.";
}
if(!empty($msg)){
    foreach($msg as $key => $value){
            echo $value ."<br>";
    }
}
 else {
    echo "Successful";
    $u->update($table, $item, $cond);
}

//$item = ["password" => $npass, "cpassword" => $cpass]; 
?>