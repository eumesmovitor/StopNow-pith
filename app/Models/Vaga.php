<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Vaga {
    public static function all(): array {
        $pdo = Database::getConnection();
        $st = $pdo->query("SELECT v.*, u.name AS owner_name FROM vagas v JOIN users u ON u.id=v.owner_id ORDER BY v.created_at DESC");
        return $st->fetchAll();
    }
    public static function create(int $owner_id, string $titulo, string $endereco, float $preco_hora, ?string $descricao): bool {
        $pdo = Database::getConnection();
        $st = $pdo->prepare("INSERT INTO vagas (owner_id,titulo,endereco,preco_hora,descricao) VALUES (?,?,?,?,?)");
        return $st->execute([$owner_id,$titulo,$endereco,$preco_hora,$descricao]);
    }
}
