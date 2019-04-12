<?php

    class Bicycle {
        var $brand;
        var $model;
        var $year;
        var $description;
        var $weight_kg;

        var $kg_in_lbs = 2.2046226218;

        function name() {
            return implode('-', [$this->brand, $this->model, $this->year]);
        }

        function weight_lbs() {
            return floatval($this->weight_kg * $this->kg_in_lbs);
        }

        function set_weight_lbs($lbs) {
            $this->weight_kg = floatval($lbs) / $this->kg_in_lbs;
        }

        function setBike($brand, $model, $year, $description, $weight_kg = 0) {
            $this->brand = $brand;
            $this->model = $model;
            $this->year = $year;
            $this->description = $description;
            $this->weight_kg = $weight_kg;
        }
    }

    $bikes = [new Bicycle(), new Bicycle(), new Bicycle()];

    for($i = 0; $i<count($bikes); $i++) {
        $bikes[$i]->setBike("brand$i", "model$i", 2000+$i, "description$i", $i);
    }

    foreach($bikes as $bike) {
//        echo "<br>name: $bike->name()<br>";
        echo "<br>";
        echo $bike->name();
        echo "<br>";
        echo "<br>weight: $bike->weight_kg<br>";
    }


?>