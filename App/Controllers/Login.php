<?php

namespace App\Controllers;

use \Core\View;
use \Core\SessionWrapper;
use App\Models\User;

use NogaMailer\Mailer;

class Login extends \Core\Controller
{
  public function indexAction()
  {
    $session = new SessionWrapper();
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $user = User::findByEmail('email', $_POST['email'], 'password', hash('md5', $_POST['password']));
      if (!$user) {
        die("Wrong email or password");
      } else {
        $_SESSION['user_id'] = get_object_vars($user[0])['id'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
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
        $title = "Your login";
        $transport->sendMail('login', $_POST['email'], 'Dear user', $title, $params);
      }
    }
    $session->redirectIfAuth();
    View::render('login.php');
  }
}
