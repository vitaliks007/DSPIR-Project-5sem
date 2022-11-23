<?php
    $login = '"' . $_POST['login'] . '"';
    $password = '"' . $_POST['password'] . '"';

    $mysqli = new mysqli("db", "user", "password", "appDB");
    $mysqli->query("INSERT INTO users (login, password) 
    VALUES ($login, $password);");

    header('Location: /index.html');
?>