<?php

function my_autoload($class)
{
    echo 'classes/' . strtolower($class) . '.class.php';

    if(preg_match('/\A\w+\Z/', strtolower($class))) {
        echo 'classes/' . strtolower($class) . '.class.php';
        include 'classes/' . strtolower($class) . '.class.php';
    }
}

spl_autoload_register('my_autoload');

$bike = new Bicycle("bike");

$bike->brand = 'Trek';
echo '<br>' . $bike->brand . '<br>';

$uni = new Unicycle();
$uni->brand = 'uni';

?>