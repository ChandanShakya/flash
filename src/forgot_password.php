<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: gainsboro;
    }

    section {
        width: 350px;
        height: auto;
        padding: 2rem 1rem;
        margin: 250px auto;
        background-color: white;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0)
    }

    h1 {
        font-size: 2rem;
        color: #0b5510;
        margin-bottom: 1.2rem;
    }

    form input {
        width: 92%;
        outline: none;
        border: 1px solid white;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 20px;
        background: rgb(236, 234, 234);
        margin-top: 10px;
    }

    .reset {
        font-size: 1rem;
        padding: 10px 0;
        width: 50%;
        cursor: pointer;
        color: white;
        background-color: #0b5510;
    }

    .label {
        font-size: 20px;
        color: #0b5510;
    }

    .errorm {
        color: red;
    }
    </style>
</head>

<body>
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