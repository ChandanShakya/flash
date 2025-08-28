
    <header>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <Label class="logo"><a id="home" href="/src/home.php">FLASH</a></Label>
        <ul>
            <li><a class="resize" href="/src/home.php">Home</a></li>
            <li><a class="resize" href="/src/typing_test.php">Start Typing</a></li>
            <li><a class="resize" href="/src/typing_tips.php">Typing Tips</a></li>
            <li><a class="resize" href="/src/results.php">Result</a></li>
            <?php
    session_start();
            if (isset($_SESSION['user_id'])) {
                echo '<li><a class="resize" href="/src/home.php" id="log">Logout</a></li>';
            } else {
                echo '<li><a class="resize" href="/src/login.php" id="sign">Login</a></li>';

            }
            ?>
        </ul>
    </header>
    <script>
    document.addEventListener("DOMContentLoaded",
    function() { //fired when HTML document is completely loaded and parsed
        <?php if (isset($_SESSION['user_id'])) { ?>
        document.getElementById("sign").style.display = "none";
        document.getElementById("log").style.display = "flex";
        <?php } else { ?>
        document.getElementById("log").style.display = "none";
        document.getElementById("sign").style.display = "flex";
        <?php } ?>
    });

    document.getElementById("log").addEventListener("click", function() {
        fetch("/src/logout.php", {  //a fetch request to the logout.php on the server using the POST method, perfromed for logout activity
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