<?php
namespace Geometry;
class Point {
    private $x;
    private $y;

    /**
     * @param float $x
     * @param float $y
     */
    public function __construct($x, $y) {
        $this->x = (float) $x;
        $this->y = (float) $y;
    }

    /**
     * @return float
     */
    public function getX() {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY() {
        return $this->y;
    }
}