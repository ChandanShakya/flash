
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
    function() {
        <?php if (isset($_SESSION['user_id'])) { ?>
        document.getElementById("sign").style.display = "none";
        document.getElementById("log").style.display = "flex";
        <?php } else { ?>
        document.getElementById("log").style.display = "none";
        document.getElementById("sign").style.display = "flex";
        <?php } ?>
    });

    document.getElementById("log").addEventListener("click", function() {
        fetch("/src/logout.php", {
                method: "POST"
            })
            .then(function(response) {
                if (response.ok) {
                    location.reload();
                } else {
                    console.log(
                    "Logout failed");
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    });
    </script>