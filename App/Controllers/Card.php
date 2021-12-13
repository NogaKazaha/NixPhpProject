<?php

namespace App\Controllers;

use \Core\View;

class Card extends \Core\Controller
{
  public function indexAction()
  {
    View::render('card.php');
  }
}
