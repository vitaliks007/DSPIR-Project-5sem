<?php 
    include 'login.php';

    $path = '../../files/';
    if (substr($_FILES['userfile']['name'], -4) == ".pdf"){
        $redisFiles->set($_FILES['userfile']['name'], file_get_contents($_FILES['userfile']['tmp_name']));
        move_uploaded_file($_FILES['userfile']['tmp_name'], $path . $_FILES['userfile']['name']);
        header('Location: /pages/files.php');
    }
    else {
        echo '<pre>Расширение файла должно быть .pdf</pre>';
    }
?>
