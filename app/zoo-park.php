<?php
namespace Zoopark;

class Cat
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}

class Dog
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}

class Fish
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
}

$cat = new Cat('Murka');
$cat1 = new Cat('Barsik');
$cat2 = new Cat('Koshka');

$dog = new Dog('Sharik');
$dog = new Dog('Marli');
$dog = new Dog('Sam');
$dog = new Dog('Charli');
$dog = new Dog('Zohan');

$fish = new Fish("Nemo");