<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select 10 Cities</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fbf7;
        }

        #head {
            text-align: center;
            margin-top: 20px;
        }

        form {
            background-color: #c7eee2;
            border: 2px solid #34495e;
            border-radius: 8px;
            width: 360px;
            padding: 20px;
            margin: 0 auto;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #27ae60;
        }

        #warning {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="head">
        <h1>Select Exactly 10 Cities</h1>
    </div>

    <div id="option">
        <?php
        $con = mysqli_connect("localhost", "root", "", "AQI");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT city, country, AQI FROM AQI";
        $result = mysqli_query($con, $sql);

        echo "<form action='showaqi.php' method='post' onsubmit='return validateSelection()'>";

        if (mysqli_num_rows($result) > 0) {
            while ($entry = mysqli_fetch_assoc($result)) {
                $label = $entry['city'] . ", " . $entry['country'] . " (AQI: " . $entry['AQI'] . ")";
                echo "<div class='checkbox-row'>
                        <label>
                            <input type='checkbox' name='checkbox[]' value='" . htmlspecialchars($entry['city']) . "'>
                            $label
                        </label>
                      </div>";
            }
        } else {
            echo "<p>No data found.</p>";
        }

        echo "<input type='submit' value='Submit'>";
        echo "<div id='warning'></div>";
        echo "</form>";

        mysqli_close($con);
        ?>
    </div>

    <script>
        function validateSelection() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const warning = document.getElementById('warning');
            if (checkboxes.length !== 10) {
                warning.textContent = "Please select exactly 10 cities.";
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
