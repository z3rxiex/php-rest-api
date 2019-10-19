<?php

    class UpdateStation {
        // DB Stuff
        private $conn;

        // Station Properties
        public $id;
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
        public function update() {

            //Query
            $query = 'UPDATE 
                        intstations a 
                      SET a.StnName = :name,
                          a.MAC = :mac,
                          a.Dzongkhag = :location,
                          a.Latitude = :latitude,
                          a.Longitude = :longitude,
                          a.Elevation = :elevation,
                          a.DateInstalled = :date_installed
                      WHERE a.id = :id';
        
            // Prepare Statement
            $result = $this->conn->prepare($query);
           
            // Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->mac = htmlspecialchars(strip_tags($this->mac));
            $this->location = htmlspecialchars(strip_tags($this->location));
            $this->latitude = htmlspecialchars(strip_tags($this->latitude));
            $this->longitude = htmlspecialchars(strip_tags($this->longitude));
            $this->elavation = htmlspecialchars(strip_tags($this->elavation));
            $this->date_installed = htmlspecialchars(strip_tags($this->date_installed));

            // Bind ID
            $result->bindParam(':id', $this->id);
            $result->bindParam(':name', $this->name);
            $result->bindParam(':mac', $this->mac);
            $result->bindParam(':location', $this->location);
            $result->bindParam(':latitude', $this->latitude);
            $result->bindParam(':longitude', $this->longitude);
            $result->bindParam(':elevation', $this->elavation);
            $result->bindParam(':date_installed', $this->date_installed);

            
            //Execute Query
            if ($result->execute()) {
                return true;
            }

            return false;
        }

    }