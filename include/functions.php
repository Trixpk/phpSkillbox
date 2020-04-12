<?php
function printArr($arr)
{
    echo "<pre style='color: #fff;'>";
    print_r($arr);
    echo "</pre>";
}

// Функция сортирует массив по полю $key, $sort - способ сортировки

function array_sort($array, $key = 'sort', $sort = 'asc')
{
    usort($array, function ($a, $b) use ($key, $sort) {
        return ($sort == 'desc') ? $b[$key] <=> $a[$key] : $a[$key] <=> $b[$key];
    });
    return $array;
}

// Функция для вывода меню

function showMenu($class, $items, $sort = 'asc')
{
//  Сортируем пункты меню по полю "sort"

    $sortArray = array_sort($items, 'sort', $sort);

    ?>

    <ul class="<?= $class ?>">
        <? foreach ($sortArray as $menuLink): ?>
            <li><a class="<?= (strpos($_SERVER['REQUEST_URI'], $menuLink['path']) !== false ? "active" : "") ?>"
                   href="<?= $menuLink['path'] ?>"><?= $menuLink['title'] ?></a></li>
        <? endforeach; ?>
    </ul>
    <?
}

// Функция для разавторизации пользователя
function userLogout()
{
    unset($_SESSION['user']);
    setcookie(session_name(), session_id(), 20, '/');
}

?>