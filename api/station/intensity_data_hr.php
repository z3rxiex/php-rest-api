<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    
    include_once('../../config/database.php');
    include_once('../../models/stations.php');
    date_default_timezone_set("Asia/Bangkok");

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate stations object
    $intensity_data = new Station($db);
    $intensity_data->selected_date = date('Y-m-d');
    $intensity_data->selected_hr = intval(date('H'));

    // Get Station
    $result = $intensity_data->data_1hr();

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

