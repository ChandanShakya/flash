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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
</head>

<body>
    <div id="msg">
        Result cannot be displayed. Please Login !!
    </div>
    <section>
        <div id="uinfo">
            <?php
            $con = mysqli_connect("localhost", "root", "", "project");

            $uname = $_SESSION['username'];
            $sql =  "Select * from user where uname ='$uname'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and display the information
                while ($row = mysqli_fetch_assoc($result)) {
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $_SESSION['uid'] = $row['id'];

                    echo "<h1>User Details</h1>";
                    echo "<p>User ID: " . $row['id'] . "</p>";
                    echo "<p>Name: " . ucfirst($fname) . " " . ucfirst($lname) . "</p>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p><a href=\"edit.php\" id=\"editt\"><i class=\"fa-solid fa-pen\"></i></a></p>";
                }
            }
            ?>
        </div>
        <br>
        <hr><br>
        <div id="res_table">
            <h2>Result Status</h2>
            <button id="showTopCPM">Show Top CPMs</button>
            <table id="resultTable" border="2" style="width:100%">
                <thead>
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
                </thead>
                <tbody id="resultBody">
                    <?php
                    $result_query = "SELECT * FROM result WHERE uname ='$uname'";
                    $result_result = mysqli_query($con, $result_query);

                    $data = [];
                    if (mysqli_num_rows($result_result) > 0) {
                        while ($row = mysqli_fetch_assoc($result_result)) {
                            $data[] = $row;
                            echo "<tr>";
                            echo "<td>" . $row['result_id'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['level'] . "</td>";
                            echo "<td>" . $row['wpm'] . "</td>";
                            echo "<td>" . $row['mistake'] . "</td>";
                            echo "<td>" . $row['cpm'] . "</td>";
                            echo "<td><a href=\"delete_rec.php?r_id={$row['result_id']}\" id=\"btn\"><i class=\"fa-solid fa-trash\"></i></a></td>";
                            echo "<td><a href=\"download.php?resu={$row['result_id']}\" id=\"btn1\"><i class=\"fa-solid fa-file-arrow-down\"></i></a></td>";
                            echo "</tr>";
                        }
                    }

                    // Implementing Bubble Sort to sort by CPM
                    function bubbleSort(&$arr)
                    {
                        $start = microtime(true);
                        $n = count($arr);
                        for ($i = 0; $i < $n; $i++) {
                            for ($j = 0; $j < $n - $i - 1; $j++) {
                                if ($arr[$j]['cpm'] < $arr[$j + 1]['cpm']) {
                                    $temp = $arr[$j];
                                    $arr[$j] = $arr[$j + 1];
                                    $arr[$j + 1] = $temp;
                                }
                            }
                        }
                        $end = microtime(true);
                        return $end - $start;
                    }

                    // Implementing Merge Sort to sort by CPM
                    function mergeSort(&$arr)
                    {
                        $start = microtime(true);
                        mergeSortHelper($arr, 0, count($arr) - 1);
                        $end = microtime(true);
                        return $end - $start;
                    }

                    function mergeSortHelper(&$arr, $left, $right)
                    {
                        if ($left < $right) {
                            $middle = floor(($left + $right) / 2);
                            mergeSortHelper($arr, $left, $middle);
                            mergeSortHelper($arr, $middle + 1, $right);
                            merge($arr, $left, $middle, $right);
                        }
                    }

                    function merge(&$arr, $left, $middle, $right)
                    {
                        $leftArr = array_slice($arr, $left, $middle - $left + 1);
                        $rightArr = array_slice($arr, $middle + 1, $right - $middle);

                        $i = 0;
                        $j = 0;
                        $k = $left;

                        while ($i < count($leftArr) && $j < count($rightArr)) {
                            if ($leftArr[$i]['cpm'] >= $rightArr[$j]['cpm']) {
                                $arr[$k] = $leftArr[$i];
                                $i++;
                            } else {
                                $arr[$k] = $rightArr[$j];
                                $j++;
                            }
                            $k++;
                        }

                        while ($i < count($leftArr)) {
                            $arr[$k] = $leftArr[$i];
                            $i++;
                            $k++;
                        }

                        while ($j < count($rightArr)) {
                            $arr[$k] = $rightArr[$j];
                            $j++;
                            $k++;
                        }
                    }

                    $bubbleSortTime = bubbleSort($data);
                    $dataCopy = $data; // Create a copy for merge sort
                    $mergeSortTime = mergeSort($dataCopy);
                    ?>
                </tbody>
            </table>
            <div id="topCPMTable">
                <!-- Placeholder for the new table -->
            </div>
        </div>
    </section>
    <script>
        document.getElementById('showTopCPM').addEventListener('click', function() {
            let data = <?php echo json_encode($data); ?>;
            let dataCopy = <?php echo json_encode($dataCopy); ?>;
            let bubbleSortTime = <?php echo json_encode($bubbleSortTime); ?>;
            let mergeSortTime = <?php echo json_encode($mergeSortTime); ?>;

            // Generate new table
            let tableHTML = '<h2>Top CPM Results</h2>';
            tableHTML += '<p>Bubble Sort Time: ' + bubbleSortTime.toFixed(6) + ' seconds</p>';
            tableHTML += '<p>Merge Sort Time: ' + mergeSortTime.toFixed(6) + ' seconds</p>';
            tableHTML += '<table border="2">';
            tableHTML += '<tr><th>Bubble Sort CPM</th><th>Merge Sort CPM</th></tr>';

            for (let i = 0; i < Math.min(data.length, dataCopy.length); i++) {
                tableHTML += '<tr>';
                tableHTML += '<td>' + data[i].cpm + '</td>';
                tableHTML += '<td>' + dataCopy[i].cpm + '</td>';
                tableHTML += '</tr>';
            }

            tableHTML += '</table>';
            document.getElementById('topCPMTable').innerHTML = tableHTML;
        });
        <?php if (isset($_SESSION['user_id'])) : ?>
            isLoggedIn = "true";
            document.querySelector("section").style.display = "block";
            document.querySelector("#msg").style.display = "none"
        <?php else : ?>
            isLoggedIn = "false";
            document.querySelector("section").style.display = "none";
            document.querySelector("#msg").style.display = "block"
        <?php endif; ?>
    </script>
</body>

</html>