<?php
  define('DIR', '/var/www/html/projects/drink_api/');
  include_once 'controller/Router.php';

  $routes = new Router;

  $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
  $route = substr($request_uri, 19);
  $method = $_SERVER['REQUEST_METHOD'];

  $routes->handle_routes($method, $route);

  
