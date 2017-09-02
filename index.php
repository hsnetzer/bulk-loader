<?php
/* 
 * php waypoint Tracks
 */
require 'dbhandler.php';
$path = $argv[1];
$db = new HandlerDB($path);

function trackWaypoints($db) {
    
    $trackpoints = $db->getTrackPoints();
    $waypoints = $db->getWaypoints();
    
    foreach (LAT LON PAIR) {
        $nearestNeighbor = $trackpoints[0];
        $nearestDistance = haversine($nearestNeighbor['lat'], $nearestNeighbor['lon'], QUERYLAT, QUERYLON)
        foreach ($trackpoints as $trackpoint) {
            
            $nextDistance = haversine(LAT LON, $trackpoint['lat'], $trackpoint['lon']);
            
            if ($trackNearness < $nearestDistance) {
                $nearestNeighbor = $trackpoint;
                $nearestDistance = $nextDistance;
            }
        }
    }
}

// returns displacement between points
function equirectangular($lat1, $lon1, $lat2, $lon2) {
    $r = 6371000; // earth radius meters
    
    $lambda1 = deg2rad($p1['lon']);
    $lambda2 = deg2rad($p2['lon']);
    $phi1 = deg2rad($p1['lat']);
    $phi2 = deg2rad($p2['lat']);
    $x = ($lambda2 - $lambda1) * cos(($phi1 + $phi2) / 2);
    $y = $phi2 - $phi1;
    return $r * sqrt($x * $x + $y * $y);
}

/*
 * using haversine formula, returns the unitless displacement
 */
function haversine($lat1, $lon1, $lat2, $lon2) {
    $R = 6371000; // meters
    
    $phi1 = deg2rad($lat1);
    $phi2 = deg2rad($lat2);
    $deltaLambda = deg2rad($lon2 - $lon1);
    $a = sin(($phi2 - $phi1) / 2) * sin(($phi2 - $phi1) / 2) + cos($phi1) * 
            cos($phi2) * sin($deltaLambda / 2) * sin($deltaLambda/2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return $R * $c;
}