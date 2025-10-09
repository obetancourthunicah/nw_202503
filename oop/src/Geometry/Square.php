<?php

namespace Unicah\Oop\Geometry;

class Square extends Shape
{
    private float $size;
    public function __construct(float $size)
    {
        parent::__construct("square");
        $this->size = $size;
    }
    public function area(): float
    {
        return $this->size * $this->size;
    }
    public function perimeter(): float
    {
        return $this->size * 4;
    }
}
