<?php
	include 'login.php';

	$query = $_SERVER['QUERY_STRING'];

    $delete_args = [];

    if ( !empty( $query ) )
    {
        foreach( explode('&', $query ) as $param )
        {
            list($key, $val) = explode('=', $param);
            $key = urldecode($key);
            $val = urldecode($val);
            $delete_args[$key] = $val;
        }
    }

    $file_name = $delete_args['name'];
    $file_content = $redisFiles->get($file_name);
    $file_address = "/var/www/files/{$file_name}";
    file_put_contents($file_address, $file_content);
    header("Location: /files/{$file_name}");
?>
