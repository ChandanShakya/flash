<html>

<head>
    <title>Download</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
    body {
        background-color: #f2f2f2;
        font-family: "Poppins", sans-serif;
        text-align: center;
    }

    #download_content {
        padding: 20px;
        margin: auto;
        width: 50%;
        height: 60%;
        background-color: #fff;
        color: #333;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
        margin-top: 30px;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
        width: 80%;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        margin-top: 3%;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border: 1px solid black;
    }
    #generatePDFButton{
        height:50px;
        width:120px;
        background-color:#333;
        color:white;
        border-radius:10px;
        font-size:15px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>

<body>
    <div id="download_content">
        <?php
require 'database_connection.php';

        $res_id = $_GET['resu'];
        $db = new Database_conn;
        $con = $db->getConnection();

        $sql2 = "SELECT * from download where result_id = '$res_id'";
        $resu = mysqli_query($con, $sql2);

        if ($resu->num_rows > 0) {
            echo '<h1>User Detail</h1>'.'<br>';

            while ($rows = $resu->fetch_assoc()) {
                echo '<strong>User Id: </strong> '.$rows['id'].'<br>';
                echo '<strong>Name: </strong>'.ucfirst($rows['fname']).' '.ucfirst($rows['lname']).'<br>';
                echo '<strong>Email: </strong>'.$rows['email'].'<br>';
                echo '<br>';
            }

            mysqli_data_seek($resu, 0); // Move the pointer back to the beginning of the result set
            echo '<h1>Result Detail</h1>'.'<br>';
            echo '<table>';
            echo '<tr><th>Result ID</th><th>Record_Saved Date</th><th>Level</th><th>WPM</th><th>Mistakes</th><th>CPM</th></tr>';

            while ($rows = $resu->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$rows['result_id'].'</td>';
                echo '<td>'.$rows['date'].'</td>';
                echo '<td>'.$rows['level'].'</td>';
                echo '<td>'.$rows['wpm'].'</td>';
                echo '<td>'.$rows['mistake'].'</td>';
                echo '<td>'.$rows['cpm'].'</td>';
                echo '</tr>';
            }

            echo '</table>';
        }

        ?>
    </div>
    <button id="generatePDFButton">Generate PDF</button>

    <script>
    document.getElementById('generatePDFButton').addEventListener('click', function() {

        const content = document.querySelector("#download_content");
        console.log(content);

        var element = document.getElementById('element-to-print');
        var opt = {
            margin: 0,
            filename: ' ',
            image: {
                type: 'jpeg',
                quality: 1.0
            },
            html2canvas: {
                scale: 3
            },
            jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'landscape'
            }
        };
        // Convert the content to an image using html2canvas
        html2pdf().from(content).set(opt).save();
    });
    </script>
</body>
</html>