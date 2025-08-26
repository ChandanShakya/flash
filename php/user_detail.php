<?php
require "conn.php";


$db_r= new Database_conn();
$conn = $db_r->getConnection();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT id,fname,lname,uname,email FROM signin");
$stmt->execute();
$result = $stmt->get_result();

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link rel="stylesheet" href="user_detail.css">
</head>
<body>
<div class="menu">
        <a href="#">Profile</a>
        <a href="user_detail.php">Users</a>
        <a href="admin.php">Dashboard</a>
    </div>
    <h1>User Details</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                
            </tr>
        <?php } ?>
    </table>
</body>
</html>
