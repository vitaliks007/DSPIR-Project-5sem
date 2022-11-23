<?php
    include '../utils/login.php';
    include '../utils/alphabet.php';

    if ($_SESSION['language'] == 'ru') {
        $dict = new RUS_DICTIONARY;
    } else {
        $dict = new ENG_DICTIONARY;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <?php
        if ($_SESSION['theme'] != 'classic') {
            echo '<link rel="stylesheet" href="/css/'.$_SESSION['theme'].'.css">';
        }
    ?>
    
    <title><?php echo $dict->SETTINGS ?></title>
</head>
<body>
    <div class="container">
        <p>
            <?php echo $dict->HELLO ?>, <?php echo $_SESSION['name']?>!
        </p>

        <form action="/utils/set_theme.php" method="post">
            <select name="theme_select" id="">
                <option selected="true" disabled="true" value="default"><?php echo $dict->THEME_SELECT ?></option>
                <option value="dark"><?php echo $dict->DARK ?></option>
                <option value="classic"><?php echo $dict->CLASSIC ?></option>
            </select>
            <input type="submit" value="<?php echo $dict->SET_THEME ?>">
        </form>

        <form action="/utils/set_language.php" method="post">
            <select name="language_select" id="">
                <option selected="true" disabled="true" value="default"><?php echo $dict->LANGUAGE_SELECT ?></option>
                <option value="ru">Русский</option>
                <option value="en">English</option>
            </select>
            <input type="submit" value="<?php echo $dict->SET_LANGUAGE ?>">
        </form>
    </div>
</body>
</html>