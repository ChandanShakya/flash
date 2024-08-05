<?php
include_once("menu.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="result.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div id="msg">
        Result cannot be displayed. Please Login !!
    </div>
    <section>
        <div id="uinfo">
            <?php
$con = mysqli_connect("localhost","root","","project");

$uname = $_SESSION['username'];
$sql =  "Select * from user where uname ='$uname'";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the information
    while ($row = mysqli_fetch_assoc($result)) {
        $fname= $row['fname'];
        $lname = $row['lname'];
        $_SESSION['uid'] = $row['id'];

        echo "<h1>User Details</h1>";
        echo "<p>User ID: " . $row['id'] . "</p>";
        echo "<p>Name: " . ucfirst($fname) ." ". ucfirst($lname). "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p><a href=\"edit.php\" id=\"editt\"><i class=\"fa-solid fa-pen\"></i></a></p>";
    }
}
?>
        </div>
        <br><hr><br>
        <div id="res_table">
            <h2>Result Status</h2>
            <table border='2'>
                <tr>
                    <th>Result ID</th>
                    <th>Record Saved Date</th>
                    <th>Level</th>
                    <th>W.P.M</th>
                    <th>Errors</th>
                    <th>C.P.M</th>
                    <th>Delete</th>
                    <th>Download</th>
                </tr>
                <?php
$con = mysqli_connect("localhost","root","","project");

$uname = $_SESSION['username'];
$sql =  "Select * from result where uname ='$uname'";
$result = mysqli_query($con,$sql);

    if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" .$row['result_id'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['level'] . "</td>";
        echo "<td>" . $row['wpm'] . "</td>";
        echo "<td>" . $row['mistake'] . "</td>";
        echo "<td>" . $row['cpm'] . "</td>";
        echo "<td><a href=\"delete_rec.php?r_id={$row['result_id']}\" id=\"btn\"><i class=\"fa-solid fa-trash\"></i></a></td>";
       echo "<td>" . "<a href=\"download.php?resu={$row['result_id']}\" id=\"btn1\"><i class=\"fa-solid fa-file-arrow-down\"></i></a>" . "</td>";
        echo "</tr>";
    }
    } 
    ?>
            </table>
        </div>
    </section>
    <script>
    <?php if (isset($_SESSION['user_id'])): ?>
    isLoggedIn = "true";
    document.querySelector("section").style.display = "block";
    document.querySelector("#msg").style.display = "none"
    <?php else: ?>
    isLoggedIn = "false";
    document.querySelector("section").style.display = "none";
    document.querySelector("#msg").style.display = "block"
    <?php endif; ?>


    </script>
</body>

</html>