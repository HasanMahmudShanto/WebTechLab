<?php
if (isset($_POST['checkbox'])) {
    $selected = $_POST['checkbox'];
    $count = count($selected);

    if ($count !== 10) {
        echo "<h3 style='color:red; text-align: center;'>Please select exactly 10 cities. You will be redirected back shortly...</h3>";
        header("Refresh: 2; url=" . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $con = mysqli_connect("localhost", "root", "", "AQI");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2fdfc;
        }
        #head {
            text-align: center;
            margin-top: 20px;
        }
        table {
            border: 3px solid #1abc9c;
            border-collapse: collapse;
            margin: 20px auto;
            width: 80%;
            max-width: 700px;
        }
        th, td {
            border: 1px solid #1abc9c;
            padding: 10px 15px;
            text-align: center;
        }
        th {
            background-color: #c1f0e9;
        }
    </style>";

    echo "<div><h1 id='head'>AQI of 10 Selected Cities</h1></div>";

    echo "<table>
            <tr>
                <th>City</th>
                <th>Country</th>
                <th>AQI</th>
            </tr>";

    foreach ($selected as $city) {
        $cityEscaped = mysqli_real_escape_string($con, $city);
        $sql = "SELECT city, country, AQI FROM AQI WHERE city = '$cityEscaped'";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['city']) . "</td>
                    <td>" . htmlspecialchars($row['country']) . "</td>
                    <td>" . htmlspecialchars($row['AQI']) . "</td>
                  </tr>";
        }
    }

    echo "</table>";
    mysqli_close($con);

} else {
    echo "<h3 style='color:red; text-align: center;'>No cities selected. You will be redirected back shortly...</h3>";
    header("Refresh: 2; url=" . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
