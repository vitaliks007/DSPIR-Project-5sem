<?php
    include '../utils/login.php';

    $data_redis = json_decode($redis->get($_SERVER['PHP_AUTH_USER']));
    $data_redis->language = $_POST['language_select'];
    $redis_data = json_encode($data_redis);

    $redis->set($_SERVER['PHP_AUTH_USER'], $redis_data);
    
    $_SESSION['language'] = $_POST['language_select'];

    header('Location: ../pages/settings.php');
?>