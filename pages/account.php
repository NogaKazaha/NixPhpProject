<?php
spl_autoload_register(function ($class) {
  include_once dirname(dirname(__FILE__)) . '\/basis/' . $class . '.php';
});
$session = new SessionWrapper();
$session->checkSession();
$link_split = explode('pages', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$actual_link = $link_split[0] . 'pages/';
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: " . $actual_link . "login.php");
}
$content = '
        <div class="nav">
          <nav>
              <span id="span"><a href="home.php">Home</a> /</span>
              <span id="span"><a href="account.php">Account</a></span>
          </nav>
        </div>
        <div class="account-container">
          <h1>Hello ' . $_SESSION['email'] . '</h1>
          <form method="POST">
              <input class="logout-btn" type="submit" value="Logout" name="logout"/>
          </form>
        </div>
    ';
$header = file_get_contents(dirname(dirname(__FILE__)) . "/basis/header.php");
$renderComponent = new ComponentRenderer($header, $content, 'basic.php');
print $renderComponent;
