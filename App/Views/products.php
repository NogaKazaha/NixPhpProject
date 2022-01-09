<?php
$productsDiv = '';
$count = 1;
foreach ($products as $product => $value) {
  $value = get_object_vars($value);
  $productsDiv = $productsDiv . '
    <div class="product">
    <div class="image-box">
      <div class="images" style = "background-image: url(' . $value['photo'] . ')"></div>
    </div>
    <div class="text-box">
      <h2 class="item">' . $value['name'] . '</h2>
      <h3 class="price">' . $value['price'] . '</h3>
      <p class="description">' . $value['status'] . '</p>
      <p class="description">' . $value['amount'] . '</p>
      <a href="./card?id=' . $value['id'] . '"><button type="button" name="item-' . $count . '-button" id="item-' . $count . '-button">Open product</button></a>
    </div>
  </div>
  ';
  $count++;
}
$content = '
    <div class="nav">
       <nav>
          <span id="span"><a href="./">Home</a> /</span>
          <span><a href="./catalog">Catalog</a></span>
       </nav>
    </div>
    <div class="listing-section">
       ' . $productsDiv . '
    </div>
';
echo $content;
