<?php
    include '../utils/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/files.css">
    <title>Управление файлами</title>
</head>
<body>
    <div class="container">
        <h2>PDF</h2>
        <form enctype="multipart/form-data" action="/utils/save_file.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input type="file" name="userfile" id="">
            <input type="submit" value="Отправить файл" />
        </form>

        <h2>Загрузка файлов</h2>

        <?php
            $filenames = $redisFiles->keys('*');
            echo "<ul>";
            foreach ($filenames as $filename) {
                echo "<li><a href=\"/utils/download_file.php?name={$filename}\" target=\"_blank\">{$filename}</a></li>";
            }
            echo "</ul>";
        ?>

    </div>
</body>
</html>