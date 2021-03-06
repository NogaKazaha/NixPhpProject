<?php

namespace Core;

class SessionWrapper
{
  public function __construct()
  {
    session_start();
  }
  public function checkSession()
  {
    if ($_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'] || $_SESSION['remoteAddr'] != $_SERVER['REMOTE_ADDR']) {
      $params = session_get_cookie_params();
      setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
      );
      session_destroy();
      $link_split = explode('public', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
      $actual_link = $link_split[0] . 'public/';
      header("Location: " . $actual_link . "./login");
    }
  }
  public function redirectIfAuth()
  {
    $link_split = explode('public', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $actual_link = $link_split[0] . 'public/';
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
      header("Location: " . $actual_link . "account");
    }
  }
  public function redirectIfNotAuth()
  {
    $link_split = explode('public', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    $actual_link = $link_split[0] . 'public/';
    if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
      header("Location: " . $actual_link . "login");
    }
  }
}
