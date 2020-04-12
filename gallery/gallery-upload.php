<?
require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";

define("MAX_FILE_SIZE", 4194304);
define("MAX_PICTURES", 5);
$file_types = Array("image/jpeg", "image/jpg", "image/png"); // разрешенные к загрузке типы файлов
if (isset($_POST['picture_upload'])) {
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/upload/"; // Директория для загрузки файлов
    $feedback_error = ""; // Текст ошибки при отправке формы
    $feedback_success = ""; // Текст об успешной отправке
    $files = array(); // Преобразованный массив $_FILES
    if (empty($_FILES)) {
        $feedback_error .= "<br>Загрузите хотя бы один файл";
    } else {
        foreach ($_FILES['picture'] as $k => $l) { // Преобразуем массив $_FILES в удобный для перебора foreach
            foreach ($l as $i => $v) {
                $files[$i][$k] = $v;
            }
        }
        if (count($files) > MAX_PICTURES) {
            $feedback_error = "Максимальное количество картинок " . MAX_PICTURES;
        } else {
            foreach ($files as $file) {
                if ($file['name'] == "") { // Если название файла пустое, пропускаем этот файл
                    continue;
                }
                if (!in_array($file['type'], $file_types)) { // Если тип файла не находится в массиве допустимых типов
                    $feedback_error .= "<br>Недопустимый тип файла";
                    continue;
                }
                if ($file['size'] > MAX_FILE_SIZE) { // Если размер файла больше 4МБ
                    $feedback_error .= "<br>Слишком большой файл";
                    continue;
                }
                if (move_uploaded_file($file['tmp_name'], $uploadPath . $file['name'])) {
                    $feedback_success = "Файлы успешно загружены";
                } else {
                    $feedback_error .= "<br>Файлы не были загружены";
                }
            }
        }
    }

}

if (isset($_POST['format']) && $_POST['format'] == 'json') {
    echo json_encode(['feedback_error' => strip_tags($feedback_error), 'feedback_success' => $feedback_success]);
    die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/include/header.php";

?>

    <form enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="picture-form">
            <h3>Загрузите картинки:</h3>
            <input type='hidden' name='format' value='json'>
            <input type="file" name="picture[]" multiple><br><br>
            <!--<input type="file" name="picture[]"><br><br>
            <input type="file" name="picture[]"><br><br>
            <input type="file" name="picture[]"><br><br>
            <input type="file" name="picture[]"><br><br>-->
            <input type="submit" name="picture_upload" value="Загрузить">
            <div id="feedback_error"></div>
        </div>
    </form>

    <script>
        $(function () {
            var error = $('#feedback_error');
            var options = {
                resetForm: true,
                dataType: "json",
                success: function (data, textStatus) {
                    if (data['feedback_success'] == "Файлы успешно загружены") {
                        error.text("");
                        error.attr('id', 'feedback_success');
                        error.append(data['feedback_success']);
                    } else {
                        error.append(data['feedback_error']);
                    }
                }
            };
            $("form").ajaxForm(options);
        });
    </script>

<? require_once $_SERVER['DOCUMENT_ROOT'] . "/include/footer.php"; ?>