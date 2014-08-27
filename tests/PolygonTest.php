<?php
use Geometry\Points;
use Geometry\Point;
use Geometry\Polygon;
class PolygonTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \Geometry\Polygon
     */
    private $polygon;

    public function setUp() {
        $this->polygon = new Polygon(new Points(array(
            new Point(-1, -1),
            new Point(-1, 1),
            new Point(1, 1),
            new Point(1, -1),
            new Point(-1, -1)
        )));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_ConstructorWithOpenPoints_MustThrowException() {
        new Polygon(new Points(array(
            new Point(-1, -1),
            new Point(-1, 1),
            new Point(1, 1)
        )));
    }

    public function test_Contains() {
        $this->assertFalse($this->polygon->contains(new Point(-2, -2)));
        $this->assertTrue($this->polygon->contains(new Point(0, 0)));
        $this->assertTrue($this->polygon->contains(new Point(1, 0)));
        $this->assertTrue($this->polygon->contains(new Point(1, 1)));
    }
}