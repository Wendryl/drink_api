<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
  Access-Control-Allow-Methods, Authorization, X-Request-With');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $data = json_decode(file_get_contents("php://input"));

  $user->id = $data->id;
  $user->drink_counter = $data->drink_counter;

  if($user->drink()) {
    echo json_encode(
      array('message' => 'User Drink Counter Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'User Drink Counter Not Updated')
    );
  }