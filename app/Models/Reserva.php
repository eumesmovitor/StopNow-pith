<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Reserva {
    public static function reservar(int $vaga_id, int $user_id, string $inicio, string $fim): bool {
        $pdo = Database::getConnection();
        $check = $pdo->prepare("SELECT COUNT(*) as c FROM reservas WHERE vaga_id=? AND (inicio < ? AND fim > ?)");
        $check->execute([$vaga_id, $fim, $inicio]);
        if (($check->fetch()['c'] ?? 0) > 0) return false;
        $ins = $pdo->prepare("INSERT INTO reservas (vaga_id,user_id,inicio,fim) VALUES (?,?,?,?)");
        return $ins->execute([$vaga_id,$user_id,$inicio,$fim]);
    }
}
