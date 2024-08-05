<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <a href="home.php" class="arrow"><i id="icon" class="fa fa-arrow-left"></i></a>
    <div class="wrapper">
        <h1>Create an Account</h1>
        <p class="message">Enter Necessary Details</p>

        <form name="regform" action="insertvalue.php" method="post" onsubmit="return vali()">
            <div>
                <input type="text" placeholder="First Name" name="fname">
                <input type="text" placeholder="Last Name" name="lname">
                <input type="text" placeholder="Username" name="uname">
                <input type="password" placeholder="Password" name="pass">
                <input type="password" placeholder="Confirm Password" name="cpass">
                <input type="text" placeholder="Email" name="email">
            </div>
            <input type="submit" value="Register" class="reg">
        </form>
        <p id="error_message"></p>
        <div class="already">
            Already have an Account? <a href="loginpage.php">Login</a>
        </div>
    </div>
    <script>
    var error = document.querySelector("#error_message");

    function vali() {
        var fname = document.regform.fname.value;
        var lname = document.regform.lname.value;
        var uname = document.regform.uname.value;
        var pass = document.regform.pass.value;
        var cpass = document.regform.cpass.value;
        var email = document.regform.email.value;
        error.style.color = "red";

        if (fname === "" || lname === "" || uname === "" || pass === "" || cpass === "" || email === "") {
            error.innerHTML = "Please enter all necessary details.";
            return false;
        }
        flen = fname.length;
        llen = lname.length;

        if (flen > 10 || llen > 10) {
            error.innerHTML = "Name cannot be longer than 10 letters.";
            return false;
        }

        var minLength = 8;
        var upper = /[A-Z]/.test(pass);
        var lower = /[a-z]/.test(pass);
        var num = /\d/.test(pass);

        if (pass.length < minLength) {
            error.innerHTML = "Password should have at least " + minLength + " characters.";
            return false;
        }

        if (!upper) {
            error.innerHTML = "Password should contain at least one uppercase letter.";
            return false;
        }

        if (!lower) {
            error.innerHTML = "Password should contain at least one lowercase letter.";
            return false;
        }

        if (!num) {
            error.innerHTML = "Password should contain at least one number.";
            return false;
        }

        if (pass !== cpass) {
            error.innerHTML = "Passwords do not match";
            return false;
        }

        var nameRegex = /^[A-Za-z]+$/;
        if (!nameRegex.test(fname) || !nameRegex.test(lname)) {
            error.innerHTML = "First name and last name cannot contain numbers.";
            return false;
        }
        var emailRegex = /^([a-zA-Z0-9\._]+)@([a-zA-Z]+)(\.[a-zA-Z]+)+$/;

        if (!emailRegex.test(email)) {
            error.innerHTML = "Please enter a valid email address.";
            return false;
        }
        
        return true;
    }


    </script>
</body>

</html>
