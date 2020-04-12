<?php

if (! empty($_POST)) {


    $status = false;
    $messages = [];

    // Имитируем ошибку или ок
    if (rand(0, 1)) {

        $status = true;
        $text = $_POST['text'];
        for ($i = 0; $i < strlen($text); $i++) {
            $messages[] = 'Под индексом ' . $i . ' лежит символ: ' . $text[$i];
        }

    } else {
        $messages[] = 'Что-то пошло не так';
    }

    // конвертируем массив в json, выводим в качестве результата работы, и прерываем скрипт - остальное же нам не нужно
    echo json_encode(['status' => $status, 'messages' => $messages]);
    die;


}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Пример</title>
</head>
<body>
<div class="container">
    <h1>Пример работы с ajax и json</h1>
    <p>Страничку html я взял со страницы: <a href="https://getbootstrap.com/docs/4.1/getting-started/introduction/">https://getbootstrap.com/docs/4.1/getting-started/introduction/</a> </p>

    <hr>
    <div id="result-block">Сюда будем вставлять результат</div>

    <form name="customForm">
        <div class="form-group">
            <label for="inputText">Введите что-нибудь</label>
            <input type="text" name="text" class="form-control" id="inputText" placeholder="Введите что-нибудь">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>






<script type="text/javascript">
    $(function() {

        // Перехватывает нажатие кнопки отправить
        $('form').on('submit', function() {

            // $(this) - это наша форма
            // данные для отправки формы, этим способом файлы не отправляются, в вашем случае за вас работает плагин ajaxForm
            var formData = $(this).serializeArray();

            $.ajax({
                url: '/gallery/example.php',
                type: 'post',
                data: formData,
                dataType: "json",
                success: function(data, textStatus, jqXHR) {

                    var $place = $('#result-block');

                    var type = data['status'] ? 'success' : 'danger';

                    $place.html('');

                    for (var key in data['messages']) {
                        $place.append(getHtmlMessage(data['messages'][key], type));
                    }
                },
                error: function(data, textStatus, jqXHR) {
                    alert('Ошибка: ' + textStatus + ' ' + jqXHR);
                },
            });

            return false;

        });

        function getHtmlMessage(text, type) {
            return '<div class="alert alert-' + type + '" role="alert">' + text + '</div>';
        }

    });
</script>









</body>
</html>