<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";

if (!isset($_SESSION['user']) && !isset($_GET['login'])) {
    header("Location: /?login=yes");
}else {
    setcookie(session_name(), session_id(), time() + 1200, '/');
    setcookie("login", $_COOKIE['login'], time() + 60 * 60 * 24 * 30, "/");
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";

// Проходимся по массиву пунктов меню и выводим h1 в зависимости от текущего url
function showTitle($items)
{
    foreach ($items as $item) {
        $path = $item['path'];
        $title = $item['title'];
        if (strpos($_SERVER['REQUEST_URI'], $path) !== false) {
            return $title;
        }
    }
}

?>
<form action="/?login=yes" method="POST">
    <input type="submit" name="exit-btn" value="Выйти">
</form>
<h1 style='color: #fff;text-align: center'><?= showTitle($arMenuLinks); ?></h1>

<? require_once $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php"; ?>

