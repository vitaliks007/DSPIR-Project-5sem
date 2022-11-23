<?php

    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
    }

    $mysqli = new mysqli("db", "user", "password", "appDB");
    $stmt = $mysqli->prepare("SELECT password FROM users WHERE login=?");
    $res = $stmt->bind_param('s', $_SERVER['PHP_AUTH_USER']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_array(MYSQLI_ASSOC);

    if ($_SERVER['PHP_AUTH_PW'] !== $user['password']) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
    }
    session_start();

    $redis = new Redis();
    $redis->connect('redis', 6379);
    
    $redis_data = json_decode($redis->get($_SERVER['PHP_AUTH_USER']));

    if (!$redis_data) {
        $default_data = [
            "language" => 'ru',
            "theme" => 'classic',
            'name' => $_SERVER['PHP_AUTH_USER'],
        ];

        $default_data_redis = json_encode($default_data);

        $redis->set($_SERVER['PHP_AUTH_USER'], $default_data_redis);

        $redis_data = json_decode($default_data_redis);
    }

    $_SESSION['language'] = $redis_data->language;
    $_SESSION['theme'] = $redis_data->theme;
    $_SESSION['name'] = $redis_data->name;

    $redisFiles = new Redis();
    $redisFiles->connect('redis-files', 6379);
?>