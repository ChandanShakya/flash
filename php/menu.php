<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<link rel="stylesheet" href="menu.css">
</head>

<body>
    <header>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <Label class="logo"><a id="home" href="home.php">FLASH</a></Label>
        <ul>
            <li><a class="resize" href="home.php">Home</a></li>
            <li><a class="resize" href="typing.php">Start Typing</a></li>
            <li><a class="resize" href="tips.php">Typing Tips</a></li>
            <li><a class="resize" href="result.php">Result</a></li>
            <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<li><a class="resize" href="home.php" id="log">Logout</a></li>';
    } else {
        echo '<li><a class="resize" href="loginpage.php" id="sign">Login</a></li>';
        
    }
    ?>
        </ul>
    </header>
    <script>
    document.addEventListener("DOMContentLoaded",
    function() { //fired when HTML document is completely loaded and parsed
        <?php if (isset($_SESSION['user_id'])): ?>
        document.getElementById("sign").style.display = "none";
        document.getElementById("log").style.display = "flex";
        <?php else: ?>
        document.getElementById("log").style.display = "none";
        document.getElementById("sign").style.display = "flex";
        <?php endif; ?>
    });

    document.getElementById("log").addEventListener("click", function() {
        fetch("logout.php", {  //a fetch request to the logout.php on the server using the POST method, perfromed for logout activity
                method: "POST"
            })
            .then(function(response) { //executed when the fetch request receives a response from the serve
                if (response.ok) { //checks if the response status is within the range of 200-299, indicating a successful response
                    location.reload(); //reloads the current page
                } else {
                    console.log(
                    "Logout failed"); //error message to the browser console if the response status is not successful
                }
            })
            .catch(function(error) { // executed if there is an error during the fetch request
                console.log(error);
            });
    });
    </script>
</body>

</html>