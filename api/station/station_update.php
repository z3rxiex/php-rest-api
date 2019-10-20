<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
    include_once('../../config/database.php');
    include_once('../../models/stations.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
 
    // Instantiate stations object
    $station = new Station($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $station->id =  $data->id;
    $station->name =  $data->name;
    $station->mac = $data->mac;
    $station->location =  $data->location;
    $station->latitude = $data->latitude;
    $station->longitude = $data->longitude;
    $station->gewog = $data->gewog;
    $station->elevation = $data->elevation;
    $station->date_installed = $data->date_installed;

    if ($result = $station->update()){
        echo json_encode(
            array('message' => 'Record Updated')
        );
    }else{
        echo json_encode(
            array('message' => 'Record Not Updated')
        );
    }

