<?php

  class Router {

    public function handle_routes($method, $route) {
      
      if($method === 'GET') {
        if($route === '/users/') {
          require_once DIR . 'api/read.php';
        }
        if(strlen($route) > 7) {
          require_once DIR . 'api/read_single.php';
        }
      }

      if($method === 'POST') {
        if($route === '/users/') {
          require_once DIR . 'api/create.php';
        }
        if($route === '/login') {
          require_once DIR . 'api/login.php';
        }
        if(strlen($route) > 7) {
          require_once DIR . 'api/drink.php';
        }
      }

      if($method === 'PUT') {
        require_once DIR . 'api/update.php';
      }

      if($method === 'DELETE') {
        require_once DIR . 'api/delete.php';
      }
      
    }

  }