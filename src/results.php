<?php
include_once 'menu.php';
require 'database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="/assets/css/results.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="msg">
        Result cannot be displayed. Please Login !!
    </div>
    <section>
        <div id="uinfo">
            <?php
            // Check if user is logged in
            if (! isset($_SESSION['username']) || empty($_SESSION['username'])) {
                echo '<script>
                    document.querySelector("section").style.display = "none";
                    document.querySelector("#msg").style.display = "block";
                </script>';

                return;
            }

$db = new Database_conn;
$con = $db->getConnection();

$uname = $_SESSION['username'];
$sql = "Select * from user where uname ='$uname'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the information
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $_SESSION['uid'] = $row['id'];

        echo '<h1>User Details</h1>';
        echo '<p>User ID: '.$row['id'].'</p>';
        echo '<p>Name: '.ucfirst($fname).' '.ucfirst($lname).'</p>';
        echo '<p>Email: '.$row['email'].'</p>';
        echo '<p><a href="/src/edit_user.php" id="editt"><i class="fa-solid fa-pen"></i></a></p>';
    }
} else {
    echo '<script>
                    document.querySelector("section").style.display = "none";
                    document.querySelector("#msg").style.display = "block";
                </script>';

    return;
}
?>
        </div>
        <br>

        <!-- Performance Statistics Cards -->
        <div id="stats-cards">
            <?php
// First, get the data
if (isset($_SESSION['username']) && ! empty($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $result_query = "SELECT * FROM result WHERE uname ='$uname'";
    $result_result = mysqli_query($con, $result_query);
    $data = [];

    if (mysqli_num_rows($result_result) > 0) {
        while ($row = mysqli_fetch_assoc($result_result)) {
            $data[] = $row;
        }
    }

    // Calculate statistics
    $totalTests = count($data);
    $avgWPM = $totalTests > 0 ? array_sum(array_column($data, 'wpm')) / $totalTests : 0;
    $avgCPM = $totalTests > 0 ? array_sum(array_column($data, 'cpm')) / $totalTests : 0;
    $bestWPM = $totalTests > 0 ? max(array_column($data, 'wpm')) : 0;
    $bestCPM = $totalTests > 0 ? max(array_column($data, 'cpm')) : 0;
    $totalErrors = array_sum(array_column($data, 'mistake'));
    $accuracy = $totalTests > 0 && $totalTests * 100 > 0 ? max(0, (1 - ($totalErrors / ($totalTests * 100))) * 100) : 0;
} else {
    $data = [];
    $totalTests = $avgWPM = $avgCPM = $bestWPM = $bestCPM = $accuracy = 0;
}
?>
            
            <div class="stat-card">
                <h3><?php echo number_format($avgWPM, 1); ?></h3>
                <p>Average WPM</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($bestWPM); ?></h3>
                <p>Best WPM</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($avgCPM, 1); ?></h3>
                <p>Average CPM</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($bestCPM); ?></h3>
                <p>Best CPM</p>
            </div>
            <div class="stat-card">
                <h3><?php echo number_format($accuracy, 1); ?>%</h3>
                <p>Accuracy</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $totalTests; ?></h3>
                <p>Total Tests</p>
            </div>
        </div>        <!-- Performance Chart -->
        <div id="progress-chart">
            <h2>Performance Trends</h2>
            <div class="chart-controls">
                <button id="showWPM" class="chart-btn active">WPM</button>
                <button id="showCPM" class="chart-btn">CPM</button>
                <button id="showAccuracy" class="chart-btn">Accuracy</button>
            </div>
            <canvas id="performanceChart" width="400" height="200"></canvas>
        </div>

        <hr><br>
        <div id="res_table">
            <h2>Result Status</h2>
            <button id="showTopCPM">Show Top CPMs</button>
            <button id="hideTopCPM" style="display: none;">Hide Top CPMs</button>
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
        // Display the data we already have
        if (! empty($data)) {
            foreach ($data as $row) {
                echo '<tr>';
                echo '<td>'.$row['result_id'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['level'].'</td>';
                echo '<td>'.$row['wpm'].'</td>';
                echo '<td>'.$row['mistake'].'</td>';
                echo '<td>'.$row['cpm'].'</td>';
                echo "<td><a href=\"delete_record.php?r_id={$row['result_id']}\" id=\"btn\"><i class=\"fa-solid fa-trash\"></i></a></td>";
                echo "<td><a href=\"download_result.php?resu={$row['result_id']}\" id=\"btn1\"><i class=\"fa-solid fa-file-arrow-down\"></i></a></td>";
                echo '</tr>';
            }
        }

// Implementing Merge Sort to sort by CPM
function mergeSort(&$arr)
{
    if (empty($arr)) {
        return 0;
    }
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

$mergeSortTime = mergeSort($data);
?>
                </tbody>
            </table>
            <div id="topCPMTable" style="display: none;">
                <!-- Placeholder for the new table -->
            </div>
        </div>
    </section>
    <script>
        // Chart.js implementation
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const data = <?php echo json_encode($data); ?>;

        // Prepare chart data
        const chartData = {
            labels: data.map(item => item.date),
            datasets: [{
                label: 'WPM',
                data: data.map(item => parseInt(item.wpm)),
                borderColor: '#dc0808',
                backgroundColor: 'rgba(220, 8, 8, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'CPM',
                data: data.map(item => parseInt(item.cpm)),
                borderColor: '#333',
                backgroundColor: 'rgba(51, 51, 51, 0.1)',
                tension: 0.4,
                fill: false,
                hidden: true
            }, {
                label: 'Accuracy %',
                data: data.map(item => 100 - (parseInt(item.mistake) || 0)),
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                tension: 0.4,
                fill: false,
                hidden: true
            }]
        };

        const performanceChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    }
                },
                elements: {
                    point: {
                        radius: 4,
                        hoverRadius: 6
                    }
                }
            }
        });

        // Chart control buttons
        document.getElementById('showWPM').addEventListener('click', function() {
            performanceChart.data.datasets[0].hidden = false;
            performanceChart.data.datasets[1].hidden = true;
            performanceChart.data.datasets[2].hidden = true;
            performanceChart.update();

            document.querySelectorAll('.chart-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });

        document.getElementById('showCPM').addEventListener('click', function() {
            performanceChart.data.datasets[0].hidden = true;
            performanceChart.data.datasets[1].hidden = false;
            performanceChart.data.datasets[2].hidden = true;
            performanceChart.update();

            document.querySelectorAll('.chart-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });

        document.getElementById('showAccuracy').addEventListener('click', function() {
            performanceChart.data.datasets[0].hidden = true;
            performanceChart.data.datasets[1].hidden = true;
            performanceChart.data.datasets[2].hidden = false;
            performanceChart.update();

            document.querySelectorAll('.chart-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });

        // Top CPM functionality
        document.getElementById('showTopCPM').addEventListener('click', function() {
            let sortedData = <?php echo json_encode($data); ?>;
            let mergeSortTime = <?php echo json_encode($mergeSortTime); ?>;

            // Generate new table
            let tableHTML = '<h2>Top CPM Results (Sorted using Merge Sort)</h2>';
            tableHTML += '<p><strong>Merge Sort Execution Time:</strong> ' + mergeSortTime.toFixed(6) + ' seconds</p>';
            tableHTML += '<div class="table-wrapper">';
            tableHTML += '<table border="2" class="top-cpm-table">';
            tableHTML += '<thead><tr><th>Rank</th><th>Date</th><th>Level</th><th>WPM</th><th>CPM</th><th>Errors</th></tr></thead>';
            tableHTML += '<tbody>';

            for (let i = 0; i < sortedData.length; i++) {
                tableHTML += '<tr>';
                tableHTML += '<td>' + (i + 1) + '</td>';
                tableHTML += '<td>' + sortedData[i].date + '</td>';
                tableHTML += '<td>' + sortedData[i].level + '</td>';
                tableHTML += '<td>' + sortedData[i].wpm + '</td>';
                tableHTML += '<td><strong>' + sortedData[i].cpm + '</strong></td>';
                tableHTML += '<td>' + sortedData[i].mistake + '</td>';
                tableHTML += '</tr>';
            }

            tableHTML += '</tbody></table></div>';
            document.getElementById('topCPMTable').innerHTML = tableHTML;
            document.getElementById('topCPMTable').style.display = 'block';
            document.getElementById('showTopCPM').style.display = 'none';
            document.getElementById('hideTopCPM').style.display = 'inline-block';
        });

        document.getElementById('hideTopCPM').addEventListener('click', function() {
            document.getElementById('topCPMTable').style.display = 'none';
            document.getElementById('showTopCPM').style.display = 'inline-block';
            document.getElementById('hideTopCPM').style.display = 'none';
        });

        const isLoggedIn = <?php echo (isset($_SESSION['username']) && ! empty($_SESSION['username'])) ? 'true' : 'false'; ?>;
        if (isLoggedIn) {
            document.querySelector("section").style.display = "block";
            document.querySelector("#msg").style.display = "none";
        } else {
            document.querySelector("section").style.display = "none";
            document.querySelector("#msg").style.display = "block";
        }
    </script>
</body>

</html>