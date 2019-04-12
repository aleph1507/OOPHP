<?php

class Bicycle {

    public $brand;
    public $model;
    public $year;
    public $description = 'Used bicycle';
    protected $weight_kg = 0.0;
    protected static $wheels = 2;
    protected static $instance_count = 0;
    public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
    private $category;

    public function name() {
        return $this->brand . " " . $this->model . " (" . $this->year . ")";
    }

    /**
     * @return int
     */
    public static function getInstanceCount()
    {
        return self::$instance_count;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }



    public static function wheel_details() {
        $wheel_string = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
        return "It has " . $wheel_string . ".";
    }

    public function weight_kg() {
        return $this->weight_kg . ' kg';
    }

    public function set_weight_kg($value) {
        $this->weight_kg = floatval($value);
    }

    public function weight_lbs() {
        $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
        return $weight_lbs . ' lbs';
    }

    public function set_weight_lbs($value) {
        $this->weight_kg = floatval($value) / 2.2046226218;
    }

    public static function create()
    {
//        return get_called_class() == 'Bicycle' ? new Bicycle() : new Unicycle();
        $class_name = get_called_class();
        static::$instance_count++;
//        return new $class_name;
//        return new self;
        return new static;
    }


    public function identity()
    {
        return get_called_class();
    }

}

class Unicycle extends Bicycle {
    // visibility must match property being overridden
    protected static $wheels = 1;

    public function bug_test() {
        return $this->weight_kg;
    }
}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

$uni = new Unicycle;

echo "Bicycle: " . Bicycle::wheel_details() . "<br />";
echo "Unicycle: " . Unicycle::wheel_details() . "<br />";
echo "<hr />";

echo "Set weight using kg<br />";
$trek->set_weight_kg(1);
echo $trek->weight_kg() . "<br />";
echo $trek->weight_lbs() . "<br />";
echo "<hr />";

echo "Set weight using lbs<br />";
$trek->set_weight_lbs(2);
echo $trek->weight_kg() . "<br />";
echo $trek->weight_lbs() . "<br />";
echo "<hr />";

// Will this work?
echo "Set weight for Unicycle<br />";
$uni->set_weight_kg(1);
echo $uni->weight_kg() . "<br />";
echo $uni->weight_lbs() . "<br />";

echo $uni->bug_test() . "<br />";

$created_bicycle = Bicycle::create();
$created_unicycle = Unicycle::create();

echo '<br>called_bicycle get_called_class:' . $created_bicycle->identity() . '<br>';
echo '<br>called_unicycle get_called_class:' . $created_unicycle->identity() . '<br>';

?>
