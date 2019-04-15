<?php

interface ShapeInterface {
    public function draw();
    public function colour();
}

class Circle implements ShapeInterface{
    public function draw() {

    }

    public function colour() {

    }

    public function reDraw()
    {
        // TODO: Implement reDraw() method.
    }
}

class Square implements ShapeInterface{
    public function draw() {

    }

    public function colour() {

    }
}

abstract class Line implements ShapeInterface {
    public function draw() {

    }

    public function colour() {

    }
}

class Painter {
    public function addShape(ShapeInterface $shape) {
        return $shape->draw();
    }
}

$shape = new Square();
$artist = new Painter();
$artist->addShape($shape);

?>