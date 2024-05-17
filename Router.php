<?php

class Router
{
  private $url;

  public function load(): void {
    $this->url = $_SERVER['REQUEST_URI'];
    switch ($this->url) {
      case '/':
        require '../Home.php';
        break;

      case '/home':
        require '../Home.php';
        break;

      case '/login':
        require '../Login.php';
        break;

      case '/logout':
        require '../Logout.php';
        break;

      case '/ajax':
        require '../Ajax.php';
        break;

      default:
        require 'error.php';
        break;
    }
  }
}
