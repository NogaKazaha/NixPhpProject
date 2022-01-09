<?php
$productsDiv = '';
$value = get_object_vars($products);
$productsDiv = $productsDiv . '
<div class="container-card">
<div class="card-left">
  <div class="card">
    <h2>' . $value['name'] . '</h2>
  </div>
  <div class="card">
    <img class="cardImg" src="' . $value['photo'] . '">
  </div>
</div>
<div class="card-right">
  <p class="p1">' . $value['name'] . '</p>
  <p class="p2">' . $value['price'] . '</p>
  <p>' . $value['name'] . ' is the latest model of the series of spaceships made by ART company. It is now available only in red color but in the few weeks there will be also blue one and green.</p>
  <form method="POST" class="card-buy">
    <p>Amount</p>
    <input type="number" name="quantity" min="1" max="10" step="1" value="1">
    <input class="logout-btn" type="submit" value="Buy" name="buy" />
  </form>
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
$content = '
    <div class="nav">
       <nav>
          <span id="span"><a href="./">Home</a> /</span>
          <span><a href="./catalog">Catalog</a> /</span>
          <span><a href="./card?id=' . $value['id'] . '">Product</a></span>
       </nav>
    </div>
    <div class="listing-section">
       ' . $productsDiv . '
    </div>
';
echo $content;
