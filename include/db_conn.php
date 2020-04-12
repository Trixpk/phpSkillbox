<?php
$host = "localhost"; // адрес сервера БД
$login = "trixpk"; // Логин к БД
$password = "trix40021"; // Пароль к БД
$dbName = "phpskillbox"; // Имя базы данных

// Подключение к БД
$connect = mysqli_connect($host, $login, $password, $dbName);
mysqli_query($connect, "SET NAMES UTF8");

