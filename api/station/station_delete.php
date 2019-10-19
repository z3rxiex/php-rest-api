<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
    include_once('../../config/database.php');
    include_once('../../models/station_delete.php');

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
 
    // Instantiate stations object
    $station = new DeleteStation($db);

    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

   
    $station->id =  $data->id;
  
  
    if ($result = $station->delete()){
        echo json_encode(
            array('message' => 'Record Deleted')
        );
    }else{
        echo json_encode(
            array('message' => 'Record Not Deleted')
        );
    }

