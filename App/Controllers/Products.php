<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use \Core\View;

class Products extends \Core\Controller
{
  public function indexAction()
  {
    $products = ProductsModel::getAll();
    View::render('products.php', [
      'products' => $products
    ]);
  }
}
