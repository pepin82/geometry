<?php
use Geometry\Point;
class PointTest extends \PHPUnit_Framework_TestCase {
    public function test_getters() {
        $point = new Point(1.0, 1.0);
        $this->assertEquals(1.0, $point->getX());
        $this->assertEquals(1.0, $point->getY());
    }
}