<?php

namespace Core\Data;

class ProductsList
{
  private $products = array(
    "cosmo" => array(
      "name" => "COSMO XR-120",
      "price" => "3000000$",
      "photo" => "assets/images/blue.jpg",
      "status" => "Out of stock",
      "amount" => 0
    ),
    "speeder" => array(
      "name" => "SPEEDER 9000",
      "price" => "13000000$",
      "photo" => "assets/images/red.jpg",
      "status" => "Avalible",
      "amount" => 20
    ),
    "karkani" => array(
      "name" => "KARKANI 20-X",
      "price" => "7000000$",
      "photo" => "assets/images/green.jpg",
      "status" => "Out of stock",
      "amount" => 0
    ),
    "lunar" => array(
      "name" => "LUNAR XR-PRO",
      "price" => "5000000$",
      "photo" => "assets/images/yellow.jpg",
      "status" => "Out of stock",
      "amount" => 0
    )
  );
  public function get()
  {
    return $this->products;
  }
}
