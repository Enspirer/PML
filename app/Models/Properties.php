<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\Geotools\Coordinate\Coordinate;
use EmilKlindt\MarkerClusterer\Interfaces\Clusterable;
class Properties extends Model implements Clusterable
{
    public function getClusterableCoordinate(): Coordinate
    {
        return new Coordinate([
            $this->lat,
            $this->long
        ]);
    }
}
