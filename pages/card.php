<?php
    spl_autoload_register(function ($class) {
        include_once dirname(dirname(__FILE__)) . '\/basis/' . $class . '.php';
    });
    $content = '
    <div class="nav">
    <nav>
        <span><a href="home.php">Home</a>/</span>
        <span><a href="products.php">Catalog</a>/</span>
        <span><a href="card.php">Product</a></span>
    </nav>
</div>
  <div class="container-card">
      <div class="card-left">
          <div class="card">
              <h2>SPEEDER 9000</h2>
          </div>
          <div class="card">
              <img class="cardImg" src="../assets/images/red-1.jpg">
          </div>
      </div>
      <div class="card-right">
          <p class="p1">SPEEDER 9000</p>
          <p class="p2">13000000$</p>
          <p>SPEEDER 9000 is the latest model of the SPEEDER series of spaceships made by ART company. It is now available only in red color but in the few weeks there will be also blue one and green. SPEEDER seria is the most popular sport spaceships serias among all. Also it has a fantastic design.</p>
          <button type="submit" value="BUY">BUY</button>
          <br /> <br /> <br />
          <p class="p1">DELAY: ............................................................................................................... 2 mounth delay</p>
          <p class="p1">Pay: ................................................................................................................... 100% prepaid</p>
          <p class="p1">Full tank</p>
      </div> 
  </div>
  <div class="container">
      <div class="footer card-right">
          <div class="logo">
              <p>All rights reserved.</p>
          </div>
          <div class="h-phone">
              <p>Privacy policy</p>
          </div>
      </div>
  </div>
    ';
    $header = file_get_contents(dirname(dirname(__FILE__))."/basis/header.php");
    $renderComponent = new ComponentRenderer($header, $content, 'basic.php');
    print $renderComponent;
?>