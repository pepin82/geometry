<?php
namespace Geometry;
class Points {

    /**
     * @var \ArrayObject
     */
    private $points;

    /**
     * @param array $points
     * @throws \InvalidArgumentException
     */
    public function __construct(array $points) {
        if(empty($points)) {
            throw new \InvalidArgumentException("array can't be empty");
        }

        foreach($points as $point) {
            if(!$point instanceof Point) {
                throw new \InvalidArgumentException(sprintf('expected type \Geometry\Point %s given instead', gettype($point)));
            }
        }

        $this->points = new \ArrayObject($points);
    }

    /**
     * @return bool
     */
    public function isClosed() {
        if($this->points->count() < 3) {
            return false;
        }

        $firstPoint = $this->points->offsetGet(0);
        $lastPoint  = $this->points->offsetGet($this->points->count() - 1);

        if($firstPoint->getX() == $lastPoint->getX() && $firstPoint->getY() == $lastPoint->getY()) {
            return true;
        }

        return false;
    }

    /**
     * @return \ArrayObject
     */
    public function getPoints() {
        return $this->points;
    }
}