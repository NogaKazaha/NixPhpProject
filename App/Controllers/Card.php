<?php

namespace App\Controllers;

use \Core\View;
use App\Models\ProductsModel;
use \Core\SessionWrapper;
use App\Models\CartModel;

class Card extends \Core\Controller
{
  public function indexAction()
  {
    $id = (int)$_GET['id'];
    print_r(gettype($id));
    $session = new SessionWrapper();
    if (isset($_POST['buy'])) {
      CartModel::create([
        "user_id" => $_SESSION['user_id'],
        "product_id" => $id,
        "amount" => $_POST['quantity']
      ]);
    }
    $session->redirectIfNotAuth();
    $products = ProductsModel::find($id);
    View::render('card.php', [
      'products' => $products
    ]);
  }
}
