<?php
namespace Geometry;
class Polygon {

    /**
     * @var \Geometry\Points
     */
    private $points;
    /**
     * @param \Geometry\Points $points
     * @throws \InvalidArgumentException
     */
    public function __construct(Points $points) {
        if(!$points->isClosed()) {
            throw new \InvalidArgumentException("points are not closed");
        }

        $this->points = $points;
    }

    /**
     * @param Point $point
     * @return bool
     */
    public function contains(Point $point) {
        $vertices = $this->points->getPoints();

        // Check if the point is inside the polygon or on the boundary
        $intersections = 0;
        for($i=1; $i < $this->points->getPoints()->count(); $i++) {
            $vertex1 = $vertices->offsetGet($i-1);
            $vertex2 = $vertices->offsetGet($i);

            // Check if point is on an horizontal polygon boundary
            if ($vertex1->getY() == $vertex2->getY() && $vertex1->getY() == $point->getY() && $point->getX() > min($vertex1->getX(), $vertex2->getX()) && $point->getX() < max($vertex1->getX(), $vertex2->getX())) {
                return true;
            }

            if ($point->getY() > min($vertex1->getY(), $vertex2->getY()) && $point->getY() <= max($vertex1->getY(), $vertex2->getY()) && $point->getX() <= max($vertex1->getX(), $vertex2->getX()) and $vertex1->getY() != $vertex2->getY()) {
                $xinters = ($point->getY() - $vertex1->getY()) * ($vertex2->getX() - $vertex1->getX()) / ($vertex2->getY() - $vertex1->getY()) + $vertex1->getX();

                // Check if point is on the polygon boundary (other than horizontal)
                if ($xinters == $point->getX()) {
                    return true;
                }
                if ($vertex1->getX() == $vertex2->getX() || $point->getY() <= $xinters) {
                    $intersections++;
                }
            }
        }

        // If the number of edges we passed through is odd, then it's in the polygon.
        if ($intersections % 2 != 0) {
            return true;
        } else {
            return false;
        }
    }
}