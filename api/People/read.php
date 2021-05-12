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

  //  people query
  $result = $people->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any people
  if($num > 0) {
    // People array
    $people_arr = array();
    // $people_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $people_item = array(
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'phone' => $phone
      );

      // Push to "data"
      array_push($people_arr, $people_item);
      // array_push($people_arr['data'], $people_item);
    }

    // Turn to JSON & output
    echo json_encode($people_arr);

  } else {
    // No People
    echo json_encode(
      array('message' => 'No Person Found')
    );
  }
