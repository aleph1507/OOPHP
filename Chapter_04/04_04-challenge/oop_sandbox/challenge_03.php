<?php

class Bicycle {

    public $brand;
    public $model;
    public $year;
    public $description = 'Used bicycle';
    private $weight_kg = 0.0;
    protected $wheels = 2;


    public function name() {
        return $this->brand . " " . $this->model . " (" . $this->year . ")";
    }

    public function weight_lbs() {
        $weight_lbs = (floatval($this->weight_kg) * 2.2046226218);
        return  $weight_lbs . "lbs";
    }

    public function set_weight_lbs($value) {
        $this->weight_kg = floatval($value) / 2.2046226218;
    }

    public function wheel_details() {
        return "it has $this->wheels wheels";
    }

//    public function wheel_details() {
//        return "it has $this->wheels wheels";
//    }

    public function get_weight(){
        return $this->weight_kg . "kg";
    }

    public function set_weight($w) {
        $this->weight_kg = $w;
    }

}

class Unicycle extends Bicycle {
    protected $wheels = 1;

}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';
$trek->set_weight(1.0);

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';
$cd->set_weight(8.0);

echo $trek->name() . "<br />";
echo $cd->name() . "<br />";

echo $trek->get_weight() . "<br />";
echo $trek->weight_lbs() . "<br />";

// notice that one is property, one is a method

$trek->set_weight_lbs(2);
echo $trek->get_weight() . "<BR>";
echo $trek->weight_lbs() . "<br />";

$uni = new Unicycle();
echo '<br>' . $trek->wheel_details() . '<br>';
echo '<br>' . $uni->wheel_details() . '<br>';

echo '<hr>';

$uni->set_weight(20);
echo '<br>' . $uni->get_weight() . '<br>';


?>
