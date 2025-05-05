<?php
    echo '<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f0f0;
        }
        .content {
            text-align: left;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .back-button {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 16px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .back-button:hover {
            background: #45a049;
        }
        .button-box{
            display: flex;
            justify-content: space-between;
        }
    </style>';

    echo '<div class="content">';
    echo "<h2>User Details</h2>";
    echo "Name: ".$_GET['fullname']; 
    echo "<br>Email: ".$_GET['email'];
    echo "<br>Password: ".$_GET['password'];
    echo "<br>DOB: ".$_GET['date'];
    echo "<br>Country: ".$_GET['country'];
    echo "<br>Gender: ".$_GET['gender'];
    echo "<br>Do you want to confirm this?";
    echo '<br><br><div class = "button-box"><a href="javascript:history.back()" class="back-button">Go Back</a>';
    echo '<a href="javascript:history.back()" class="back-button">Confirm</a>';
    echo '</div>';
    echo '</div>'
?>