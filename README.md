Description
-----------
Point In Polygon Algorithm, based on Michaël Niessen implementation [http://assemblysys.com/php-point-in-polygon-algorithm/]

Usage
-----
```PHP
use \Geometry\Point;
use \Geometry\Points;
use \Geometry\Polygon;


$polygon = new Polygon(new Points(array(
    new Point(-1, -1),
    new Point(-1, 1),
    new Point(1, 1),
    new Point(1, -1),
    new Point(-1, -1)
)));

if($polygon->contains(new Point(0, 0))) {
    echo "point is contained in polygon";
}
else {
    echo "point isn't contained in polygon";
}
```
