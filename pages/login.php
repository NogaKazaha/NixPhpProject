<?php
spl_autoload_register(function ($class) {
  include_once dirname(dirname(__FILE__)) . '\/basis/' . $class . '.php';
});
$session = new SessionWrapper();
if (isset($_POST['email']) && isset($_POST['password'])) {
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
  $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
}
$link_split = explode('pages', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$actual_link = $link_split[0] . 'pages/';
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  header("Location: " . $actual_link . "account.php");
}
$content = '
    <div class="nav">
    <nav>
        <span id="span"><a href="home.php">Home</a> /</span>
        <span id="span"><a href="login.php">Login</a></span>
    </nav>
    </div>
    <div class="login-container">
      <h1>Log me in</h1>
      <form method="POST" class="login-inputs">
        <input type="email" name="email" placeholder="Enter your email" />
        <input type="password" name="password" placeholder="Enter your password" />
        <button type="submit">Log in</button>
      </form>
    </div>
    ';
$header = file_get_contents(dirname(dirname(__FILE__)) . "/basis/header.php");
$renderComponent = new ComponentRenderer($header, $content, 'basic.php');
print $renderComponent;
