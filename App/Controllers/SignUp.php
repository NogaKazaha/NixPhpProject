<?php

namespace App\Controllers;

use \Core\View;
use \Core\SessionWrapper;
use App\Models\User;

use NogaMailer\Mailer;

class SignUp extends \Core\Controller
{
  public function indexAction()
  {
    $session = new SessionWrapper();
    if (isset($_POST['email']) && isset($_POST['email']) && isset($_POST['password'])) {
      if ($_POST['password'] != $_POST['pass_conf']) {
        die('Password does not match');
      } else {
        User::create([
          "username" => $_POST['username'],
          "email" => $_POST['email'],
          "password" => hash("md5", $_POST['password'])
        ]);
        $config = [
          'smtp' => 'smtp.gmail.com',
          'port' => 587,
          'encryption' => 'tls',
          'path' => dirname(__DIR__) . '/Views/templates/',
          'default' => dirname(__DIR__) . '/Views/templates/default.php',
          'username' => 'NogaKazaha',
          'email' => 'nogakazahawork@gmail.com',
          'password' => 'bara3shka02',
        ];
        $path = dirname(dirname(__DIR__)) . '/logs/log.log';
        $transport = new Mailer($config);
        $transport->setLogs($path, 'user');
        $params = [
          'shopName' => "Nix Shop",
        ];
        $title = "Your registration";
        $transport->sendMail('register', $_POST['email'], 'Dear user', $title, $params);
        $link_split = explode('public', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        $actual_link = $link_split[0] . 'public/';
        header("Location: " . $actual_link . "login");
      }
    }
    $session->redirectIfAuth();
    View::render('register.php');
  }
}
