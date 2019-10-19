<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    
    include_once('../../config/database.php');
    include_once('../../models/intensity_data.php');
    date_default_timezone_set("Asia/Bangkok");

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    $selected_date = (isset($_GET['selected_date']) ? $_GET['selected_date'] : date('Y-m-d'));
    
    // Instantiate stations object
    $intensity_data = new IntensityData($db);

    // Get Station
    $result = $intensity_data->read($selected_date);

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

