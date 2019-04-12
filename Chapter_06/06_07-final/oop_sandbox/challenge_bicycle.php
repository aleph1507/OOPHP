<?php

function my_autoload($class) {
    $class = strtolower($class);
    if(preg_match('/\A\w+\Z/', $class)) {
        include 'classes/' . $class . '.class.php';
    }
}
spl_autoload_register('my_autoload');

$bike = new Bicycle(['brand' => 'brand1', 'model' => 'model1', 'color' => 'blue1', 'year' => 1989,
    'category' => 'Mountain', 'gender' => 'Women\'s', 'price' => 100.2, 'description' => 'description1', 'weight' => '200']);

$bike->setConditionId(2);
echo '<br> Bike condition: ' . $bike->condition() . '<br>';

?>