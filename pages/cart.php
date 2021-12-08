<?php
spl_autoload_register(function ($class) {
  include_once dirname(dirname(__FILE__)) . '\/basis/' . $class . '.php';
});
$content = '
      <div class="nav">
          <nav>
              <span id="span"><a href="home.php">Home</a> /</span>
              <span id="span"><a href="cart.php">Cart</a></span>
          </nav>
        </div>
        <div class="cart-container">
          <h1>This is your cart</h1>
          <div class="cart-product">
            <img class="cardImg" src="../assets/images/red-1.jpg">
            <p>Name of product:....................................SPEEDER 9000</p>
            <p>Price of product:....................................13000000$</p>
            <p>Price with taxes:....................................13090000$</p>
            <button class="cart-pay">Pay</button>
          </div>
        </div>
    ';
$header = file_get_contents(dirname(dirname(__FILE__)) . "/basis/header.php");
$renderComponent = new ComponentRenderer($header, $content, 'basic.php');
print $renderComponent;
