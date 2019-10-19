<?php

    class AddStation {
        // DB Stuff
        private $conn;

        // Station Properties
        public $id;
        public $code;
        public $name;
        public $mac;
        public $location;
        public $latitude;
        public $longitude;
        public $elevation;
        public $date_installed;
      
        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Stations
        public function add() {
            
            //Query
            $query = 'INSERT INTO intstations (StnCode, StnName, MAC, Latitude, Longitude, Elevation, Dzongkhag, Gewog, Village, BldgName, DateInstalled) 
                      VALUES 
                        (:code, :name, :mac, :latitude, :longitude, :elevation, :location, "", "", "", :date_installed)';
        
            // Prepare Statement
            $result = $this->conn->prepare($query);
           
            // Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->code = htmlspecialchars(strip_tags($this->code));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->mac = htmlspecialchars(strip_tags($this->mac));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->latitude = htmlspecialchars(strip_tags($this->latitude));
            $this->longitude = htmlspecialchars(strip_tags($this->longitude));
            $this->elevation = htmlspecialchars(strip_tags($this->elevation));
            $this->date_installed = htmlspecialchars(strip_tags($this->date_installed));
           
            // Bind ID
            $result->bindParam(':code', $this->name);
            $result->bindParam(':name', $this->name);
            $result->bindParam(':mac', $this->mac);
            $result->bindParam(':location', $this->location);
            $result->bindParam(':latitude', $this->latitude);
            $result->bindParam(':longitude', $this->longitude);
            $result->bindParam(':elevation', $this->elevation);
            $result->bindParam(':date_installed', $this->date_installed);
            
            //Execute Query
            if ($result->execute()) {
                return true;
            }

            return false;
        }

    }