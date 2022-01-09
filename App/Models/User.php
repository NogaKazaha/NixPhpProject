<?php

namespace App\Models;

use PDO;

class User extends \Core\Model
{
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $created_at;
    public string $updated_at;
    public static function getAll()
    {
        $database = static::getDB();
        $statement = $database->query('SELECT id, username, email FROM users');
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function create(array $data): User
    {
        $database = static::getDB();
        $statement = $database->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        try {
            $statement->execute([
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
        } catch (\PDOException $e) {
            echo "Creation failed: " . $e->getMessage();
        }
        return $database->query("SELECT * FROM users WHERE username='" . $data['username'] . "'")->fetchObject(__CLASS__);
    }
    public static function find(int $id): User
    {
        return static::getDB()->query("SELECT * FROM users WHERE id=$id")->fetchObject(__CLASS__);
    }
    public static function findByEmail(string $dataMail, string $email, string $dataPass, string $pass): User | array
    {
        return static::getDB()->query("SELECT * FROM users WHERE $dataMail='$email' AND $dataPass='$pass'")->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }
    public static function update(array $data, int $id): User
    {
        $database = static::getDB();
        $statement = $database->prepare("UPDATE users SET username=:username, email=:email, password=:password, updated_at=now() WHERE id=$id");
        try {
            $statement->execute([
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
        } catch (\PDOException $e) {
            echo "Updating failed: " . $e->getMessage();
        }
        return $database->query("SELECT * FROM users WHERE id=$id")->fetchObject(__CLASS__);
    }
    public static function destroy(int $id): bool
    {
        return static::getDB()->prepare("DELETE FROM users WHERE id=$id")->execute();
    }
}
