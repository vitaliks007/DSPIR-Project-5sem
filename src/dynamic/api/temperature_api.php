<?php
    include '../utils/get_data.php';

    function get_temperature($params) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $result = $mysqli->query("SELECT temperature FROM temperatures WHERE city_id = $params[city_id]");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo json_encode(array(
            'temperature' => $row["temperature"]
        ));
    }

    function create_temperature($body) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $mysqli->query("INSERT INTO temperatures (temperature, city_id) 
        VALUES ($body[temperature], $body[city_id]);");
    }

    function update_temperature($params, $body) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $mysqli->query("UPDATE temperatures 
        SET temperature = $body[temperature] WHERE (city_id = $params[city_id]);");
    }

    function delete_temperature($params) {
        $mysqli = new mysqli("db", "user", "password", "appDB");

        $mysqli->query("DELETE FROM temperatures WHERE (city_id = $params[city_id]);");
    }

    $method = $_SERVER['REQUEST_METHOD'];
    $body = get_body();
    $params = get_params();
    
    match ($method){
        'GET' => get_temperature($params),
        'PATCH' => update_temperature($params, $body),
        'POST' => create_temperature($body),
        'DELETE' => delete_temperature($params),
    };
?>