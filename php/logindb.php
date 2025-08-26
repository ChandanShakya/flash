<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "project");
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$query= "Select password from user";

$sql = "SELECT * FROM user WHERE uname='$uname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($pass,$row['password'])){
            $_SESSION['username']= $row['uname'];
            $_SESSION['user_id'] = $row['id']; 
            header("Location: home.php");
            exit();
        }
        else {
            echo "<script>
            alert('Incorrect Username or Password');
            window.location.href = 'loginpage.php';
            </script>";
        }
    } 
}
else {
    echo "<script>
    alert('Incorrect Username or Password');
    window.location.href = 'loginpage.php';
    </script>";
}

?>