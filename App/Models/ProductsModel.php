<?php

namespace App\Models;

use \Core\Data\ProductsList;

class ProductsModel extends \Core\Model
{
  public static function getAll()
  {
    $products = new ProductsList();
    return $products->get();
  }
}
