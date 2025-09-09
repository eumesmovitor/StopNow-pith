<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class User {
    public static function create(string $name, string $email, string $password): bool {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO users (name,email,password_hash) VALUES (?,?,?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }
    public static function findByEmail(string $email): ?array {
        $pdo = Database::getConnection();
        $st = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $st->execute([$email]);
        $u = $st->fetch();
        return $u ?: null;
    }
}
