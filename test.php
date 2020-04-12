<?php
/*$host = "localhost"; // адрес сервера БД
$login = "trixpk"; // Логин к БД
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
        "select products.name as 'Название продукта', price, count, stock_id, stock.name as 'Название склада' from products right join stock on stock_id = stock.id"
    );

//    var_export($result);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>";
        var_export($row);
        echo "</p>";
    }

}


// Закрываем подключение к БД
mysqli_close($connect);*/

// === Подготовленные запросы === //

$user = 'trixpk';
$password = 'trix40021';
$dsn = 'mysql:host=localhost;dbname=phpskillbox';

// Устанавливаем подключение к БД
$pdo = new PDO($dsn, $user, $password);

// Создаем подготовленный запрос
//$stmt = $pdo->prepare("insert into stock (name) values (:name)");
$pdo->query("SET NAMES UTF8");
$stmt = $pdo->query('select * from stock');

// Выполняем запрос
//$stmt->execute([':name' => 'Склад1']);
while($row = $stmt->fetch()) {
    echo $row['name'] . "<br>";
}


// Закрываем соединение
$pdo = null;