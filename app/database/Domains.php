<?php

namespace App\Database;

use Firebase\JWT\JWT;
use PDO;
use PDOException;

class Domains
{

    private $connection;
    private $table_name = "Domains";

    public function __construct($connection)
    {
        $this->connection = $connection;
        $query = "CREATE TABLE IF NOT EXISTS `" . $this->table_name . "` (
  `id` INT  AUTO_INCREMENT ,
  `domain` VARCHAR(255) NOT NULL,
  `date` DATETIME,
  PRIMARY KEY (`id`) )";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }

    public function getDomain($id)
    {
        $query = "SELECT id, domain, date FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countUser() {
        $query = "SELECT id FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteDomain(int $id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam("id", $id);
        $stmt->execute();
    }
}