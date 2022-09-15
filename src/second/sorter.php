<html lang="ru">

<head>
    <title>Shell sort</title>
</head>

<body>
    <?php
    $aStr = htmlspecialchars($_GET["arr"]);

    $a = array_map(null, explode(',', $aStr));

    require __DIR__ . '/sort.php';
    print_r(shellSort($a));
    ?>
</body>

</html>
