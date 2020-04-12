<?php
namespace ToyFactory;

class ToyFactory
{
    public function createToy($name)
    {
        $price = rand(1000, 5000);
        return new Toy($name, $price);
    }
}

class Toy
{
    public $name;
    public $price;

    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$factory = new ToyFactory;
$count = rand(5, 20);
$toys = Array();
$toysNames = Array("Кукла", "Слоненок", "Панда", "Машинка", "Робокоп");

for ($i = 0; $i < $count; $i++)
{
    $toyName = rand(0, 4);
    $toys[$i] = $factory->createToy($toysNames[$toyName]);
    echo $toys[$i]->name . "-" . $toys[$i]->price . "<br>";
}
$result = 0;
for ($u = 0; $u < count($toys); $u++)
{
    $result += $toys[$u]->price;
}
echo "Итого - " . $result;