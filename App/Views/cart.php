<?php
$productsDiv = '';
$count = 1;
$total = 0;
foreach ($products as $product => $value) {
  $value = get_object_vars($value);
  $total += (int)$value['amount'] * (int)$value['price'];
  $productsDiv = $productsDiv . '
  <div class="cart-product">
    <img class="cardImg" src="' . $value['photo'] . '">
    <p>Name of product:....................................' . $value['name'] . '</p>
    <p>Price of product:....................................' . $value['price'] . '</p>
    <p>Amount:....................................' . $value['amount'] . '</p>
  </div>
  ';
  $count++;
}
$content = '
    <div class="nav">
       <nav>
          <span id="span"><a href="./">Home</a> /</span>
          <span><a href="./cart">Cart</a></span>
       </nav>
    </div>
    <div class="cart-listing-section">
      <h1>This is your cart</h1>
       ' . $productsDiv . '
      <p>Total price:....................................' . $total . '$</p>
      <form method="POST" class="login-inputs">
        <input class="logout-btn" type="submit" value="Cancel" name="remove" />
        <input class="logout-btn" type="submit" value="Go to payment" name="pay" />
      </form>
    </div> 
';
echo $content;
