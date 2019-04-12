<?php

class Bicycle {

  public static $instance_count = 0;

  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $gender;
  public $price;
  public $description = 'Used bicycle';
  protected $weight_kg = 0.0;
  protected static $wheels = 2;
  protected $condition_id;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  public const GENDERS = ['men\'s', 'women\'s', 'unisex'];
  public static $condition_options = [1 => 'Beat up', 2 => 'Decent', 3 => 'Good', 4 => 'Great', 5 => 'Like New'];

  public function __construct($args=[])
  {

    foreach($args as $k => $v) {
      if(property_exists($this, $k)) {
        $this->$k = $v;
      }
    }

//    $this->brand = $args['brand'] ?? NULL;
//    $this->model = $args['model'] ?? NULL;
//    $this->year = $args['year'] ?? NULL;
//    $this->category = array_search($args['category'], self::CATEGORIES) ? array_search($args['category'], self::CATEGORIES) : NULL;
//    $this->color = $args['color'] ?? NULL;
//    $this->gender = array_search($args['gender'], self::GENDERS) ? array_search($args['gender'], self::GENDERS) : NULL;
//    $this->price = $args['price'] ?? NULL;
//    $this->description = $args['description'] ?? NULL;
//    $this->weight_kg = $args['weight_kg'] ?? 0.0;
  }

  /**
   * @return mixed
   */
  public function getConditionId()
  {
    return $this->condition_id;
  }

  /**
   * @param mixed $condition_id
   */
  public function setConditionId($condition_id): void
  {
//    isset(static::$condition_options[$condition_id]) ? $this->condition_id = $condition_id : echo '';
    if(isset(static::$condition_options[$condition_id])) {
      $this->condition_id = $condition_id;
    } //else {
//      return false;
//    }
  }

  public function condition() : string
  {
    return static::$condition_options[$this->condition_id];
  }

  public static function create() {
    $class_name = get_called_class(); // must retrieve string first
    $obj = new $class_name;           // "new" expects a class or a string
    // $obj = new static              // self & static work here too!
    self::$instance_count++;
    return $obj;
  }

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
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

}

?>
