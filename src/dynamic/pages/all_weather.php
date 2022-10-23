<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All</title>
</head>
<body>
<div class="container">
        <p>
            <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");

            $result = $mysqli->query("SELECT city, temperature FROM weather");

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo 'Температура в городе '.$row["city"].': '.$row["temperature"].'<br>';
            }
            ?>
        </p>
    </div>
</body>
</html>