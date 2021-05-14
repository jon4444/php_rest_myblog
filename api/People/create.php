<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'config/Database.php';
  include_once 'models/People.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog people object
  $people = new People($db);

  // Get raw person data
  $data = json_decode(file_get_contents("php://input"));

  $people->id = $data->id;
  $people->firstname = $data->firstname;
  $people->lastname = $data->lastname;
  $people->phone = $data->phone;

  // Create person
  if($people->create()) {
    echo json_encode(
      array('message' => 'Person Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Person Not Created')
    );
  }

