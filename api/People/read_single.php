<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/People.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate people object
  $people = new People($db);

  // Get ID
  $people->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get people
  $people->read_single();

  // Create array
  $people_arr = array(
    'id' => $people->id,
    'firstname' => $people->title,
    'lastname' => $people->body,
    'phone' => $people->author
  );

  // Make JSON
  print_r(json_encode($people_arr));