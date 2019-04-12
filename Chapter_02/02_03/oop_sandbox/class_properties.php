<?php

class Student {
  var $first_name;
  var $last_name;
  var $country = 'None';

  /**
   * @return mixed
   */
  public function getFirstName()
  {
    return $this->first_name;
  }

  /**
   * @param mixed $first_name
   */
  public function setFirstName($first_name)
  {
    $this->first_name = $first_name;
  }
}

$student1 = new Student;
$student1->first_name = 'Lucy';
$student1->last_name = 'Ricardo';

$student2 = new Student;
$student2->first_name = 'Ethel';
$student2->last_name = 'Mertz';

echo $student1->first_name . " " . $student1->last_name . "<br>";
echo $student2->first_name . " " . $student2->last_name . "<br>";

$class_vars = get_class_vars('Student');
echo "Class vars:<br>";
echo '<pre>';
print_r($class_vars);
echo '</pre>';

$object_vars = get_object_vars($student1);
echo 'student1 object vars:<br>';
echo '<pre>';
print_r($object_vars);
echo '</pre>';

if(property_exists('Student', 'first_name')) {
  echo "Property first_name exists in student class";
} else {
  echo "Property first_name does not exists in student class";
}

?>
