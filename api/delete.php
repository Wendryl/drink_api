<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With');

  include_once DIR . 'config/Database.php';
  include_once DIR . 'models/User.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $data = json_decode(file_get_contents("php://input"));

  $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
  $request_uri = substr($request_uri, 19);
  $route = explode('/', $request_uri);
  $user->id = $route[2];

  if($user->delete()) {
    echo json_encode(
      array('message' => 'User Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'User Not Deleted')
    );
  }