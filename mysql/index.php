<?php
$host = "localhost"; // адрес сервера БД
$login = "trix"; // Логин к БД
$password = "trix40021"; // Пароль к БД
$dbName = "phpskillbox"; // Имя базы данных

// Подключение к БД
$connect = mysqli_connect($host, $login, $password, $dbName);
mysqli_query($connect, "SET NAMES UTF8");

//
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
} else {
    $result = mysqli_query(
        $connect,
        "select products.name as 'Название товара', price, count, stock_id, stock.name as 'Название склада' 
          from products left join stock on stock_id = stock.id"
    );

//    var_export($result);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<pre>";
        var_export($row);
        echo "</pre>";
    }

}


// Закрываем подключение к БД
mysqli_close($connect);

// Пароли к юзерам
// trix = qwerty12345
// user = qwerty
// petya = petya140