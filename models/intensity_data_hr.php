<?php

    class IntensityData {
        // DB Stuff
        private $conn;
       
        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Stations
        public function read($curr_date, $curr_hr) {

            //Query
            $query = 'SELECT station.id id, station.StnCode code, station.StnName name, station.MAC mac, ' .
                'station.Latitude latitude, station.Longitude longitude, station.Elevation elevation, ' .
                'station.Dzongkhag location, station.DateInstalled date_installed, ' .
                'CASE WHEN main.HR' . $curr_hr . '_id IS NULL THEN 1 ELSE 0 END HR' . $curr_hr . '_status, CASE WHEN intdata.UpdateCount IS NULL THEN 0 ELSE intdata.UpdateCount END UpdateCount' . $curr_hr . ', ' .
                'CASE WHEN main.LatestLog IS NULL THEN \'\' ELSE main.LatestLog END LatestLog ' . 
                'FROM intstations station ' .
                'LEFT OUTER JOIN intensity_main main on station.MAC = main.MAC and main.LogDate = "' . $curr_date . '" ' .
                'LEFT OUTER JOIN intensity_data intdata on station.MAC = intdata.MAC and  main.HR' . $curr_hr . '_id = intdata.id';
           
            /*
            $query = 'SELECT station.id id, station.StnCode station, station.StnName name, station.MAC mac, ' .
                'CASE WHEN main.HR' . $curr_hr . '_id IS NULL THEN 0 ELSE 0 END HR' . $curr_hr . '_status, CASE WHEN intdata.LatestLog IS NULL THEN "16:59:14" ELSE intdata.LatestLog  END LatestLog' . $curr_hr . ' ' .
                'FROM intstations station ' .
                'LEFT OUTER JOIN intensity_main main on station.MAC = main.MAC and main.LogDate = "' . $curr_date . '" ' .
                'LEFT OUTER JOIN intensity_data intdata on station.MAC = intdata.MAC and  main.HR' . $curr_hr . '_id = intdata.id';
            */

            //Prepare Statement
            $result = $this->conn->prepare($query);

            //Execute Query
            $result->execute();

            return $result;
        }

    }