<?php

    class Stations {
        // DB Stuff
        private $conn;
      
        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Stations
        public function read() {

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
                FROM intstations a';


            //Prepare Statement
            $result = $this->conn->prepare($query);

            //Execute Query
            $result->execute();

            return $result;
        }

    }