<?php

namespace App\Controllers;

use \Core\View;
use \Core\SessionWrapper;

class Account extends \Core\Controller
{
  public function indexAction()
  {
    $session = new SessionWrapper();
    $session->redirectIfNotAuth();
    $session->checkSession();
    $link_split = explode('public', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $actual_link = $link_split[0] . 'public/';
    if (isset($_POST['logout'])) {
      session_destroy();
      header("Location: " . $actual_link . "./login");
    }
    $params = $_SESSION['email'];
    View::render('account.php');
  }
}
