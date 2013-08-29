<?php

require 'classes.php';

$circle    = new Circle(25);
$rectangle = new Rectangle(25, 50);
$triangle  = new Triangle(25, 50);

$circleAdapter = new CircleAdapter($circle);
$rectangleAdapter = new RectangleAdapter($rectangle);
$triangleAdapter = new TriangleAdapter($triangle);

$shapeContainer = new ShapeContainer();
$shapeContainer
    ->appendShape($circleAdapter)
    ->appendShape($rectangleAdapter)
    ->appendShape($triangleAdapter);

$shapeContainer->sortShapesByArea();