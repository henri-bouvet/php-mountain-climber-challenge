<?php

namespace Hackathon\LevelH;

class Geo
{
    public function __construct()

    {

    }

    public function getClosestCityFromId($id){
        $myCities = new CitiesData();
        $cities = $myCities->getCities();
        $srcCity = $myCities->getCityInfoById($id);
        $closestDistance = PHP_INT_MAX;
        $closestCity = $srcCity;
        $cosDeg2RadLat1 = cos(deg2rad($srcCity['lat']));

        foreach ($cities as $dstCity) {
            if ($dstCity['id'] === $srcCity['id']){
                continue;
            }

            $distance = $this->computeDistance(
                $srcCity['lat'],
                $srcCity['long'],
                $dstCity['lat'],
                $dstCity['long'],
                $cosDeg2RadLat1
            );

            if ($closestDistance > $distance) {
                $closestDistance = $distance;
                $closestCity = $dstCity;
            }
        }

        return $closestCity;

    }

    /**
     * Give the distance in meter between two points (in kilometer)
     *
     * @param $lat1
     * @param $lng1
     * @param $lat2
     * @param $lng2
     * @return int
     */

    private function computeDistance($lat1, $lng1, $lat2, $lng2, $cosDeg2RadLat1){

        $earth_radius = 6378137; // Earth Radius is 6378.137 km
        $rlo1 = deg2rad($lng1);
        $rla1 = deg2rad($lat1);
        $rlo2 = deg2rad($lng2);
        $rla2 = deg2rad($lat2);
        $dlat = $rla2 - $rla1;
        $dlon = $rlo2 - $rlo1;
        
        $x = ($rlo2 - $rlo1) * cos(0.5 * ($rla2 + $rla1));
        $y = $rla2 - $rla1;

        return sqrt($x*$x + $y*$y);
    }
};