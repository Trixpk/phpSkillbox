<?php
    $host = "localhost"; // адрес сервера БД
    $login = "trix"; // Логин к БД
    $password = "trix40021"; // Пароль к БД
    $dbName = "phpskillbox"; // Имя базы данных

    $connect = mysqli_connect($host, $login, $password, $dbName);

    if (mysqli_connect_errno())
    {
        echo mysqli_connect_error();
    }

    $query = '';

    /*$query = 'create table if not exists `phpskillbox`.`test` (
    `id` INT NOT NULL auto_increment,
    `name` varchar(50) not null,
    `phone` varchar(11) not null,
    primary key (`id`)
)';*/
// test
    //$query = 'drop table if exists `test`';

    //$query = 'alter table `test` modify `email` varchar(60) not null ';

    //$query = 'alter table `test` change column `email` `email_new` int(70) NOT NULL';

    //$query = 'alter table `test` add `email` varchar(50) not null';

    //$query = 'alter table `test` delete `email`';

    //$query = 'alter table `test` drop column `email_new`';

    mysqli_query($connect, $query);