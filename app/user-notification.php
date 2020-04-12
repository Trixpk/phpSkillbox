<?php
namespace UserNotification;

class User
{
    public $fio;
    public $email;
    public $age;
    public $gender;
    public $phone;

    function __construct($fio, $email, $age, $gender, $phone)
    {
        $this->fio = $fio;
        $this->email = $email;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;
    }

    function notifyOnEmail($message)
    {
        $this->send();
    }

    function notifyOnPhone($message)
    {
        $this->send();
    }

    function notify($message)
    {

    }

    function censor($message)
    {

    }

    function send($message)
    {
        echo "Уведомление клиенту: $this->fio на <канал уведомления> (<email или телефон клиента>): <message>";
    }
}

$user = new User("Поляков Павел Юрьквич", test@mail.ru);
echo $user->send();