<?
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";

$dir = "../upload/";

function getSizePicture($file)
{
    // Размер файла
    $fileSize = filesize("../upload/" . $file);
    // Если размер файла меньше 10КБ
    if ($fileSize < 10240) {
        $size = $fileSize . "b";
    } elseif ($fileSize > 10240 && $fileSize < 1048576) { // Если размер файла больше 10КБ и меньше 1МБ
        $size = round($fileSize / 1024, 0) . "Kb";
    } elseif ($fileSize > 1048576 && $fileSize < 4194304) { // Если размер файла больше 1МБ и меньше 4МБ
        $size = round($fileSize / 1048576) . "Mb";
    }
    return $size;
}

if (isset($_POST['delete'])) {
    foreach ($_POST['delete'] as $value) {
        unlink($dir . $value); // Удаляем все выбранные картинки
    }
}
// Проверяем директорию на наличие файлов
$files = scandir($dir);
?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <? foreach ($files as $key => $picture) { // Парсим каждый найденный файл
            // Если в массив не попали ссылки на родительские категории
            if ($picture != "." && $picture != "..") {
                // Путь к файлу
                $path = $dir . $picture;
                // Дата последнего редактирования файла
                $fileEdit = date("d.m.Y", filemtime("../upload/" . $picture));
                $pictureSize = getSizePicture($picture);
                ?>

                <img src=<?= $path ?> width="300px"><p style='color: #fff;font-size: 16px;'><?= $picture ?><br>
                    Размер файла: <?= $pictureSize ?><br>
                    Дата загрузки файла: <?= $fileEdit ?><br>
                    Удалить картинку: <input type="checkbox" value="<?= $picture ?>" name="delete[]">
                </p><br><br>
                <?
            }
        } ?>
        <input type="submit" name="deletePictures" value="Удалить картинки">
    </form>


<? require_once $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php"; ?>