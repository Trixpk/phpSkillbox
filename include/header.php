<?
if (!isset($_SESSION['user']) && !isset($_GET['login'])) {
    header("Location: /?login=yes");
}else {
    setcookie(session_name(), session_id(), time() + 1200, '/');
    setcookie("login", $_COOKIE['login'], time() + 60 * 60 * 24 * 30, "/");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="/styles.css" rel="stylesheet"/>
    <title>Project - ведение списков</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"/></div>
    <div style="clear: both"></div>
    <!--  Подключаем меню с шаблоном header  -->
    <? showMenu("menu-header", $arMenuLinks); ?>
</div>