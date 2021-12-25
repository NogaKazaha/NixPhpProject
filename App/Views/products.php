<?php
$productsDiv = '';
$count = 1;
foreach ($products as $product => $value) {
  $value = get_object_vars($value);
  if ($count != 2) {
    $productsDiv = $productsDiv . ' <div class="grid-item-img' . $count . '" style = "background-image: url(' . $value['photo'] . ')"></div>
     <div class="grid-item">
         <p class="p1"><a href="./card">' . $value['name'] . '</a></p>
         <p class="p2">3' . $value['price'] . '</p>
         <p class="p3">' . $value['status'] . '</p>
         <p class="p3">' . $value['amount'] . '</p>
         <a href="./card"><button type="submit" value="BUY">BUY</button></a>
     </div>
     ';
  } else {
    $productsDiv = $productsDiv . ' 
    <div class="grid-item-img' . $count . '" style = "background-image: url(' . $value['photo'] . ')"></div>
    <div class="grid-item">
        <p class="p1"><a href="./card">' . $value['name'] . '</a></p>
        <p class="p2">3' . $value['price'] . '</p>
        <p class="p3">' . $value['status'] . '</p>
        <p class="p3">' . $value['amount'] . '</p>
        <a href="./card"><button type="submit" value="BUY">BUY</button></a>
    </div>
    <div class="grid-item-center"></div>  
       <div class="grid-item-center"></div>
       <div class="grid-item-center"></div>
       <div class="grid-item-center"></div>
       <div class="grid-item-center"></div>
       <div class="content size">
       <div class="text">Price</div>
           <br />
           <input type="range" name="size" id="size" />
       </div>
    ';
  }
  $count++;
}
$content = '
    <div class="nav">
       <nav>
          <span id="span"><a href="./">Home</a> /</span>
          <span><a href="./catalog">Catalog</a></span>
       </nav>
    </div>
   <div class="nav-chbx">
       <div class="nav-name">
           <h1>Catalog</h1>
       </div>
       <div class="content color">
         <div class="text">Color</div>
         <div class="color-box">
           <input type="checkbox" class="color-scheme blue">
           <input type="checkbox" class="color-scheme red">
           <input type="checkbox" class="color-scheme green">
           <input type="checkbox" class="color-scheme yellow">
         </div>
       </div>
   </div>
   <div class="grid-container">
       <div class="grid-item-chbx">
           <h3>Price range</h3>
           <input type="checkbox" name="name1" id="1-2" value="1000000$ - 2000000$">
           <label for="1-2" name="name1">1000000$ - 2000000$</label><br>
           <input type="checkbox" name="name2" id="2-3" value="2000000$ - 4000000$">
           <label for="2-4" name="name2">2000000$ - 4000000$</label><br>
           <input type="checkbox" name="name3" id="4-8" value="4000000$ - 8000000$">
           <label for="4-8" name="name3">4000000$ - 8000000$</label><br>
           <input type="checkbox" name="name4" id="8-10" value="8000000$ - 10000000$">
           <label for="8-10" name="name4">8000000$ - 10000000$</label><br>
           <input type="checkbox" name="name5" id="10-15" value="10000000$ - 15000000$">
           <label for="10-15" name="name5">10000000$ - 15000000$</label><br>
       </div>
       ' . $productsDiv . '
   </div>
';
echo $content;
