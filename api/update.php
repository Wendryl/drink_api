<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $data = json_decode(file_get_contents("php://input"));

  $user->id = isset($_GET['id']) ? $_GET['id'] : die();
  $user->name = $data->name;
  $user->email = $data->email;
  $user->password = $data->password;

  if($user->update()) {
    echo json_encode(
      array('message' => 'User Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'User Not Updated')
    );
  }