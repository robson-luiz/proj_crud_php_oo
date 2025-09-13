<?php
require_once __DIR__ . '/../conection/Connection.php';
class User {
    public $id;
    public $name;
    public $email;

    public static function getAll() {
        $sql = "SELECT * FROM users";
        $stmt = Connection::getInstance()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPaginated($limit, $offset) {
        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countAll() {
        $sql = "SELECT COUNT(*) as total FROM users";
        $stmt = Connection::getInstance()->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['total'] : 0;
    }

    public function insert() {
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = Connection::getInstance()->prepare($sql);
        return $stmt->execute([$this->name, $this->email]);
    }

    public static function getById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = Connection::getInstance()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        $stmt = Connection::getInstance()->prepare($sql);
        return $stmt->execute([$this->name, $this->email, $this->id]);
    }

    public static function delete($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = Connection::getInstance()->prepare($sql);
        return $stmt->execute([$id]);
    }
}
