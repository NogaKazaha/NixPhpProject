<?php
spl_autoload_register(function ($class) {
  include_once dirname(dirname(__FILE__)) . '\/basis/' . $class . '.php';
});
$link_split = explode('pages', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$actual_link = $link_split[0] . 'pages/';
$content = '
      <div class="nav">
          <nav>
              <span id="span"><a href="home.php">Home</a></span>
          </nav>
        </div>
        <div class="home-container">
          <h1>Want to find new spaceship for your needs?</h1>
          <img class="market-img" src="../assets/images/market.jpg" alt="Market">
          <p class="home-info">Here you can find anything you want for any of your needs</p>
          <p><a class="search-btn" href="' . $actual_link . 'products.php">Inspect new ships</a> or <a class="search-btn" href="' . $actual_link . 'login.php">Login</a></p>
      </div>
    ';
$header = file_get_contents(dirname(dirname(__FILE__)) . "\/basis/header.php");
$renderComponent = new ComponentRenderer($header, $content, 'basic.php');
print $renderComponent;
