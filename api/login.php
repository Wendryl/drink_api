<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $data = json_decode(file_get_contents("php://input"));

  $user->email = $data->email;
  $user->password = $data->password;

  if($user->login()) {
    echo json_encode(
      array('message' => 'Login Successful!')
    );
  } else {
    echo json_encode(
      array('message' => 'Error! Incorrect email-password!')
    );
  }