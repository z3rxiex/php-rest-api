<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    
    include_once('../../config/database.php');
    include_once('../../models/stations.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate stations object
    $station = new Station($db);
    $station->id = (isset($_GET['stationID']) ? $_GET['stationID'] : die());

    // Get Station
    $result = $station->read_single();

    //Get row count
    $num = $result->rowCount();

    if ($num > 0){
        echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    }else{
        // No stations
        echo json_encode(
            array('STATUS' => 'ERROR', 'message' => 'No Stations has been setup.')
        );
    }

