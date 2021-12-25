<?php

namespace App\Models;

use \Core\Data\ProductsList;

class ProductsModel extends \Core\Model
{
  public int $id;
  public string $name;
  public string $price;
  public string $status;
  public string $photo;
  public float $amount;
  public string $created_at;
  public string $updated_at;
  public static function getAll(): array
  {
    return static::getDB()->query("SELECT * FROM products")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
  }
  public static function create(array $data): ProductsModel
  {
    $db = static::getDB();
    $stm = $db->prepare("INSERT INTO products (name, price, status, amount, photo, created_at, updated_at) VALUES (:name, :price, :status, :amount, :photo, now(), now())");
    try {
      $stm->execute([
        ':name' => $data['name'],
        ':price' => $data['price'],
        ':status' => $data['status'],
        ':amount' => $data['amount'],
        ':photo' => $data['photo']
      ]);
    } catch (\PDOException $e) {
      echo "Creation failed: " . $e->getMessage();
    }
    return $db->query("SELECT * FROM products WHERE name='" . $data['name'] . "'")->fetchObject(__CLASS__);
  }
  public static function find(int $id): ProductsModel
  {
    return static::getDB()->query("SELECT * FROM products WHERE id=$id")->fetchObject(__CLASS__);
  }
  public static function update(array $data, int $id): ProductsModel
  {
    $db = static::getDB();
    $stm = $db->prepare("UPDATE products SET name=:name, price=:price, status=:status, amount=:amount photo=:photo, updated_at=now() WHERE id=$id");
    try {
      $stm->execute([
        ':name' => $data['name'],
        ':price' => $data['price'],
        ':status' => $data['status'],
        ':amount' => $data['amount'],
        ':photo' => $data['photo']
      ]);
    } catch (\PDOException $e) {
      echo "Updating failed: " . $e->getMessage();
    }
    return $db->query("SELECT * FROM products WHERE id=$id")->fetchObject(__CLASS__);
  }
  public static function destroy(int $id): bool
  {
    return static::getDB()->prepare("DELETE FROM products WHERE id=$id")->execute();
  }
}
