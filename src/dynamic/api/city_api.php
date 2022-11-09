<?php
    include '../utils/get_data.php';

    function get_city($params) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $result = $mysqli->query("SELECT city_name, city_name_rus FROM cities WHERE ID = $params[id]");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo json_encode(array(
            'city_name' => $row["city_name"],
            'city_name_rus' => $row["city_name_rus"]
        ));
    }

    function create_city($body) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $sql_city_name = '"'.$body["city_name"].'"';
        $sql_city_name_rus = '"'.$body["city_name_rus"].'"';
        $mysqli->query("INSERT INTO cities (city_name, city_name_rus) 
        VALUES ($sql_city_name, $sql_city_name_rus);");
    }

    function delete_city($params) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $mysqli->query("DELETE FROM cities WHERE (ID = $params[id]);");
    }

    $method = $_SERVER['REQUEST_METHOD'];
    $body = get_body();
    $params = get_params();
    
    match ($method){
        'GET' => get_city($params),
        'POST' => create_city($body),
        'DELETE' => delete_city($params),
    };
?>