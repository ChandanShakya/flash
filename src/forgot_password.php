<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/forgot_password.css">
</head>

<body>
    <a href="/src/login.php" class="nav-btn back-btn"><i class="fa fa-arrow-left"></i></a>
    <a href="/src/home.php" class="nav-btn home-btn"><i class="fa fa-home"></i></a>
    <section>
        <h1>Reset Password</h1>
        <form method="post" action="process_password_reset.php" onsubmit="return validate()">
            <label for="uname" class="label">Username:</label>
            <input type="text" name="uname" id="uname" placeholder="Username">
            <br>
            <label for="new_password" class="label">New Password:</label>
            <input type="password" name="npass" id="npass" placeholder="New Password">
            <br>
            <label for="confirm_password" class="label">Confirm Password:</label>
            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
            <br>
            <input type="submit" value="Reset Password" class="reset">
        </form>
        <p class="errorm"></p>
    </section>
    <script>
    function validate() {
        var uname = document.getElementById("uname").value;
        var newPassword = document.getElementById("npass").value;
        var confirmPassword = document.getElementById("cpass").value;
        var error = document.querySelector(".errorm");

        if (newPassword === "" || confirmPassword === "" || uname === "" || newPassword === "null" ||
            confirmPassword === "null" || uname === "null") {
            error.innerHTML = "Enter all the details";
            return false;
        }

        if (newPassword.length < 8) {
            error.innerHTML = "Password should be at least 8 characters long.";
            return false;
        }

        if (!/[A-Z]/.test(newPassword) || !/[a-z]/.test(newPassword)) {
            error.innerHTML = "Password should contain at least one uppercase letter and one lowercase letter.";
            return false;
        }

        if (!/\d/.test(newPassword)) {
            error.innerHTML = "Password should contain at least one number.";
            return false;
        }

        if (newPassword !== confirmPassword) {
            error.innerHTML = "New password and confirm password do not match.";
            return false;
        }

        return true;
    }
    </script>
</body>

</html>