<?php
use Geometry\Points;
use Geometry\Point;
use Geometry\Polygon;
class PolygonTest extends \PHPUnit_Framework_TestCase {

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

    public function test_Contains_Case1() {
        $polygon = new Polygon(new Points(array(
            new Point(-1, -1),
            new Point(-1, 1),
            new Point(1, 1),
            new Point(1, -1),
            new Point(-1, -1)
        )));

        $this->assertFalse($polygon->contains(new Point(-2, -2)));
        $this->assertTrue($polygon->contains(new Point(0, 0)));
        $this->assertTrue($polygon->contains(new Point(1, 0)));
        $this->assertTrue($polygon->contains(new Point(1, 1)));
    }

    public function test_Contains_Case2() {
        $polygon = new Polygon(new Points(array(
            new Point(30.517455, 50.439635),
            new Point(30.519381, 50.438067),
            new Point(30.521543, 50.439133),
            new Point(30.518684, 50.440199),
            new Point(30.517455, 50.439635)
        )));

        $this->assertTrue($polygon->contains(new Point(30.51954, 50.43899)));
    }
}