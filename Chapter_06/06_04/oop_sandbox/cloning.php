<?php

class Beverage {

    public $name;

    public function __construct()
    {
        echo "<BR>new beverage was created<BR>";
    }

    public function __clone()
    {
        echo "<br>existing beverage was cloned<BR>";
    }
}

$a = new Beverage();
$a->name = "coffee";
echo $a->name . "<BR>";

echo '<hr>';
$b = clone $a;
echo $a->name . "<BR>";
echo $b->name . "<BR>";

$b->name = 'tea';
echo '<hr>';
echo $a->name . "<BR>";
echo $b->name . "<BR>";

?>