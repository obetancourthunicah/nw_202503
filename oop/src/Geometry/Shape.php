<?php

namespace Unicah\Oop\Geometry;

abstract class Shape
{
    private string $shapeName;
    protected function __construct(string $shapeName)
    {
        $this->shapeName = $shapeName;
    }

    public abstract function area(): float;
    public abstract function perimeter(): float;

    public function toString(): string
    {
        return $this->shapeName;
    }
}
