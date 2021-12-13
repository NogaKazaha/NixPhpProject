<?php

namespace App\Controllers;

use \Core\View;

class Cart extends \Core\Controller
{
  public function indexAction()
  {
    View::render('cart.php');
  }
}
