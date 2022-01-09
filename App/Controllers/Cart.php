<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ProductsModel;
use \Core\SessionWrapper;
use App\Models\CartModel;
use App\Models\OrderModel;

class Cart extends \Core\Controller
{
  public function indexAction()
  {
    $products = [];
    $session = new SessionWrapper();
    $orders = CartModel::findByUserId($_SESSION['user_id']);
    foreach ($orders as $order => $value) {
      $product = ProductsModel::find($value['product_id']);
      $product->amount = $value['amount'];
      array_push($products, $product);
    }
    if (isset($_POST['remove'])) {
      $products = [];
      foreach ($orders as $order => $value) {
        CartModel::destroy($value['id']);
      }
    }
    View::render('cart.php', [
      'products' => $products
    ]);
  }
}
