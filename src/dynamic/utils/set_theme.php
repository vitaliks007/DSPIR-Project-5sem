<?php
    include '../utils/login.php';

    $data_redis = json_decode($redis->get($_SERVER['PHP_AUTH_USER']));
    $data_redis->theme = $_POST['theme_select'];
    $redis_data = json_encode($data_redis);

    $redis->set($_SERVER['PHP_AUTH_USER'], $redis_data);
    
    $_SESSION['theme'] = $_POST['theme_select'];

    header('Location: ../pages/settings.php');
?>