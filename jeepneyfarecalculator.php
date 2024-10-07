<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeepney Fare Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #ff69b4;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="number"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(100% - 22px);
        }

        .radio-group {
            margin-bottom: 10px;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ff1493;
        }

        h3 {
            color: #008b8b;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Jeepney Fare Calculator</h2>

<form method="post" action="">
    <label for="distance">Distance (in km):</label>
    <input type="number" id="distance" name="distance" step="0.01" required>

    <label>Passenger Type:</label>
    <div class="radio-group">
        <label>
            <input type="radio" name="passenger_type" value="regular" required> Regular
        </label>
        <label>
            <input type="radio" name="passenger_type" value="student_elderly" required> Student/Elderly
        </label>
    </div>

    <input type="submit" name="submit" value="Calculate Fare">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $base_fare = 13.00;
    $base_distance = 5;
    $additional_rate = 1.75;
    $discount_rate = 0.20;

    $distance = $_POST['distance'];
    $passenger_type = $_POST['passenger_type'];

    if ($distance <= $base_distance) {
        $total_fare = $base_fare;
    } else {
        $total_fare = $base_fare + (($distance - $base_distance) * $additional_rate);
    }

    if ($passenger_type == "student_elderly") {
        $total_fare = $total_fare - ($total_fare * $discount_rate);
    }

    echo "<h3>Total Fare: Php " . number_format($total_fare, 2) . "</h3>";
}
?>

</body>
</html>