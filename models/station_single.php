<?php

    class Station {
        // DB Stuff
        private $conn;
      
        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Stations
        public function read_single($station_id) {

            //Query
            $query = 'SELECT a.id id,  
                    a.StnCode code, 
                    a.StnName name, 
                    a.MAC mac, 
                    a.Latitude latitude, 
                    a.Longitude longitude, 
                    a.Elevation elevation, 
                    a.Dzongkhag location, 
                    a.DateInstalled date_installed 
                FROM intstations a
            WHERE id = ?';
        
            //Prepare Statement
            $result = $this->conn->prepare($query);

            // Bind ID
            $result->bindParam(1, $station_id);

            //Execute Query
            $result->execute();

            return $result;
        }

    }