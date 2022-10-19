<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
</head>
<body>
    <div class="container">
        <p>
            <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");

            if ($_GET) {
                $var = $_GET['city_select'];
                $result = $mysqli->query("SELECT temperature FROM weather WHERE city = 'Moscow'");
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo 'Температура: '.$row["temperature"];
            } else {
                echo 'Неверный город!';
            }
            ?>
        </p>
    </div>
</body>
</html>