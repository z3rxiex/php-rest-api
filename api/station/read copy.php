<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    
    include_once('../../config/database.php');
    include_once('../../models/station.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate stations object
    $station = new Station($db);

    // Get Station
    $result = $station->read();

    //Get row count
    $num = $result->rowCount();

    if ($num > 0){
        // return Stations
        /*
        $stations_arr = array();
        $stations_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $station_item = array(
                'id' => $id,
                'station' => $station,
                'name' => $name,
                'mac' => $mac,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'elevation' => $elevation,
                'location' => $location,
                'date_installed' => $date_installed
            );

            //Push to "data"
            array_push($stations_arr['data'], $station_item);
        }

        echo json_encode($stations_arr);
        */
        echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }else{
        // No stations
        echo json_encode(
            array('STATUS' => 'ERROR', 'message' => 'No Stations has been setup.')
        );
    }

