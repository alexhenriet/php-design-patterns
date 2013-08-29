<?php

interface ShapeInterface
{
    public function getArea();
}

class Circle
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }
}

class Rectangle
{
    private $length;
    private $width;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getWidth()
    {
        return $this->width;
    }
}

class Triangle
{
    private $base;
    private $height;

    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }

    public function getBase()
    {
        return $this->base;
    }

    public function getHeight()
    {
        return $this->height;
    }
}

class CircleAdapter implements ShapeInterface
{
    private $circle;

    public function __construct(Circle $circle)
    {
        $this->circle = $circle;
    }

    public function getArea()
    {
        return round(M_PI * pow($this->circle->getRadius(), 2), 2);
    }
}

class RectangleAdapter implements ShapeInterface
{
    private $rectangle;

    public function __construct(Rectangle $rectangle)
    {
        $this->rectangle = $rectangle;
    }

    public function getArea()
    {
        return $this->rectangle->getLength() * $this->rectangle->getWidth();
    }
}

class TriangleAdapter implements ShapeInterface
{
    private $triangle;

    public function __construct(Triangle $triangle)
    {
        $this->triangle = $triangle;
    }

    public function getArea()
    {
        return ($this->triangle->getBase() * $this->triangle->getHeight()) / 2;
    }
}

class ShapeContainer
{
    private $shapes = [];

    public function appendShape(\ShapeInterface $shape)
    {
        $this->shapes[] = $shape;
        return $this;
    }

    public function sortShapesByArea()
    {
        usort($this->shapes, function ($firstShape, $secondShape)
        {
            $firstShapeArea = (int) $firstShape->getArea();
            $secondShapeArea = (int) $secondShape->getArea();
            if ($firstShapeArea === $secondShapeArea) {
                return 0;
            }
            return ($firstShapeArea < $secondShapeArea) ? -1 : 1;
        });
        foreach($this->shapes as $shape) {
            echo get_class($shape) . ' : ' . $shape->getArea() . PHP_EOL;
        }
    }
}