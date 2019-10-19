<?php

    class DeleteStation {
        // DB Stuff
        private $conn;

        // Station Properties
        public $id;
    
        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Stations
        public function delete() {

            //Query
            $query = 'DELETE FROM
                        intstations 
                      WHERE id = :id';
        
            // Prepare Statement
            $result = $this->conn->prepare($query);
           
            // Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Bind ID
            $result->bindParam(':id', $this->id);
         
            //Execute Query
            if ($result->execute()) {
                return true;
            }

            return false;
        }

    }