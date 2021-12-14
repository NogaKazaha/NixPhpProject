<?php

namespace App\Controllers;

use \Core\View;
use \Core\SessionWrapper;

class Login extends \Core\Controller
{
  public function indexAction()
  {
    $session = new SessionWrapper();
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['password'];
      $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
      $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
    }
    $link_split = explode('public', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $actual_link = $link_split[0] . 'public/';
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
      header("Location: " . $actual_link . "account");
    }
    View::render('login.php');
  }
}
