<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class HandlerDB extends SQLite3{
    
    function __construct($filename)
    {
        $this->open($filename);
    }
    
    function getTrackPoints() {
        $stmt1 = $this->prepare("SELECT * FROM trackpoints WHERE code='AT';");
        $trkPtsResult = $stmt1->execute();
        $trkPts = [];
        while($row = $trkPtsResult->fetchArray(SQLITE3_ASSOC)) {
            $trkPts[] = $row;
        }
        return $trkPts;
    }
    
    function getWaypoints() {
        $statement = $this->prepare("SELECT * FROM waypoints;");
        $waypointsResult = $statement->execute();
        $waypoints = [];
        while($row = $waypointsResult->fetchArray(SQLITE3_ASSOC)) {
            $waypoints[] = $row;
        }
        return $waypoints;
    }
}