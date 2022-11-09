<?php
function get_body() {
    return json_decode(file_get_contents('php://input'), true);
}

function get_params() {
    $query = $_SERVER['QUERY_STRING'];
    $params = [];

    if (!empty($query)) {
        foreach(explode('&', $query) as $param) {
            list($key, $val) = explode('=', $param);
            $key = urldecode($key);
            $val = urldecode($val);
            $params[$key] = $val;
        }
    }
    return $params;
}
?>