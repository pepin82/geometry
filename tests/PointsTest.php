<?php
use Geometry\Points;
use Geometry\Point;

class PointsTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_constructorWithNoPointsMustThrowException() {
        $points = new Points(array());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_constructorWithInvalidPointMustThrowException() {
        $points = new Points(array(1));
    }

    public function test_isClosed_WithLessThanFourPoints_MustReturnFalse() {
        $points = new Points(array(
            new Point(1,1),
            new Point(2,2)
        ));

        $this->assertFalse($points->isClosed());
    }

    public function test_isClosed_WithOpenPoints_MustReturnFalse() {
        $points = new Points(array(
            new Point(1,1),
            new Point(2,2),
            new Point(3,3)
        ));

        $this->assertFalse($points->isClosed());
    }

    public function test_isClosed_WithClosedPoints_MustReturnTrue() {
        $points = new Points(array(
            new Point(1,1),
            new Point(2,2),
            new Point(1,1)
        ));

        $this->assertTrue($points->isClosed());
    }
}