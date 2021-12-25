<?php

namespace App\Models;

use PDO;

class User extends \Core\Model
{
    public int $id;
    public string $email;
    public string $password;
    public string $created_at;
    public string $updated_at;
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, email FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create(array $data): User
    {
        $db = static::getDB();
        $stm = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        try {
            $stm->execute([
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
        } catch (\PDOException $e) {
            echo "Creation failed: " . $e->getMessage();
        }
        return $db->query("SELECT * FROM users WHERE name='" . $data['name'] . "'")->fetchObject(__CLASS__);
    }
    public static function find(int $id): User
    {
        return static::getDB()->query("SELECT * FROM users WHERE id=$id")->fetchObject(__CLASS__);
    }
    public static function update(array $data, int $id): User
    {
        $db = static::getDB();
        $stm = $db->prepare("UPDATE users SET email=:email, password=:password, updated_at=now() WHERE id=$id");
        try {
            $stm->execute([
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
        } catch (\PDOException $e) {
            echo "Updating failed: " . $e->getMessage();
        }
        return $db->query("SELECT * FROM users WHERE id=$id")->fetchObject(__CLASS__);
    }
    public static function destroy(int $id): bool
    {
        return static::getDB()->prepare("DELETE FROM users WHERE id=$id")->execute();
    }
}
