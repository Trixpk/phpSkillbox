<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
// Нажата ли кнопка авторизационной формы
    if (isset($_POST['btn']))
    {
        $userLogin = $_POST['login'];
        $userPassword = $_POST['password'];
        $pass_hash = md5($userPassword);

        $result = mysqli_query($connect, "select * from users where login = '$userLogin' and password = '$pass_hash'");
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<pre>";
            var_export($row);
            echo "</pre>";
        }

        // Если результат поиска логина не равен false и пароль пользователя равен
        // паролю найденному в массиве с паролями по ключу полученному в $searchLogin
        /*if ($searchLogin !== false && $userPassword === $arrPasswords[$searchLogin]) {
            $_SESSION['user'] = $arrLogins[$searchLogin];
            setcookie("login", $arrLogins[$searchLogin], time() + 60 * 60 * 24 * 30, "/");
        } else {
            $autorize_err = true;
        }*/
    }
    if (isset($_POST['exit-btn']))
    {
        userLogout();
    }
?>
<? require_once "include/header.php" ?>
<? if (isset($_GET['login']) && $_GET['login'] == "yes"): ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками
                    с друзьями и просматривать списки друзей.</p>
            </td>
            <td class="right-collum-index">

                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><span>Авторизация</span></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div style="clear: both;"></div>
                </div>
                <div class="index-auth">
                    <form action="/?login=yes" method="POST">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <? if (!isset($_COOKIE['login'])) { ?>
                                <tr>
                                    <td class="iat">Введите логин: <br/> <input id="login_id" size="30" name="login"
                                                                                value="<?= (isset($userLogin)) ? $userLogin : "" ?>"/>
                                    </td>
                                </tr>
                            <? } else { ?>
                                <input type="hidden" name="login" value="<?= $_COOKIE['login'] ?>">
                            <? } ?>
                            <tr>
                                <td class="iat">Ваш пароль: <br/> <input id="password_id" size="30" name="password"
                                                                         type="password"
                                                                         value="<?= (isset($userPassword)) ? $userPassword : "" ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <? if (isset($_SESSION['user'])) { ?>
                                    <td><input type="submit" name="exit-btn" value="Выйти"/></td>
                                <? } else { ?>
                                    <td><input type="submit" name="btn" value="Войти"/></td>
                                <? } ?>
                            </tr>
                        </table>
                    </form>
                    <?
                        if (isset($_SESSION['user']))
                        {
                            require_once "include/success.php";
                        } else if (isset($autorize_err))
                        {
                            require_once "include/autorize_err.php";
                        }
                    ?>
                </div>

            </td>
        </tr>
    </table>
<? endif; ?>
<? require_once "include/footer.php" ?>