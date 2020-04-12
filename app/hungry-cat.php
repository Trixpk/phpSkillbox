<?php
namespace HungryCat;

class HungryCat
{
    public $name;
    public $color;
    public $favoriteFood;

    function __construct($name, $color, $favoriteFood)
    {
        $this->name = $name;
        $this->color = $color;
        $this->favoriteFood = $favoriteFood;
    }

    public function eat($food)
    {
        $result = "Голодный кот $this->name, особые приметы: цвет - $this->color, съел $food";
        if($food == $this->favoriteFood)
        {
            $result .= " и замурчал 'мррррр' от своей любимой еды";
        }
        echo $result . "<br>";
    }
}

$cat1 = new HungryCat("Барсик", "черный", "молоко");
$cat2 = new HungryCat("Оливка", "серый", "мясо");

$cat1->eat("яйцо");
$cat1->eat("суп");
$cat1->eat("яблоко");
$cat1->eat("сок");
$cat1->eat("молоко");
echo "<br>";
$cat2->eat("рис");
$cat2->eat("банан");
$cat2->eat("йогурт");
$cat2->eat("хлеб");
$cat2->eat("мясо");