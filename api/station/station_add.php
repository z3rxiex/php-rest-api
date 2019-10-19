<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
    include_once('../../config/database.php');
    include_once('../../models/station_add.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
 
    // Instantiate stations object
    $station = new AddStation($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    //print_r($data);
   
    $station->code =  $data->code;
    $station->name =  $data->name;
    $station->mac = $data->mac;
    $station->location =  $data->location;
    $station->latitude = $data->latitude;
    $station->longitude = $data->longitude;
    $station->elevation = $data->elevation;
    $station->date_installed = $data->date_installed;

    //print_r($station->elevation);
  
    if ($result = $station->add()){
        echo json_encode(
            array('message' => 'Record Added')
        );
    }else{
        echo json_encode(
            array('message' => 'Record Not Added')
        );
    }

