<?php

namespace App\Database;

use PDO;

class Redirect
{

    private $connection;
    private $table_name = "Redirect";

    public function __construct($connection)
    {
        $this->connection = $connection;
        $query = "CREATE TABLE IF NOT EXISTS `" . $this->table_name . "` (
  `id` INT  AUTO_INCREMENT ,
  `code` VARCHAR(255) NOT NULL,
  `userId` VARCHAR(150) NOT NULL ,
  `redirect_url` VARCHAR(150) NOT NULL ,
  `clicks` INT DEFAULT 0,
  `date` DATETIME,
  PRIMARY KEY (`id`) )";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }

    public function getAllRedirects()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRedirects($code)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE code=? LIMIT 0, 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $code);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function createRedirect($code, $userId, $redirect_url)
    {
        if ($this->getRedirects($code) == null) {
            $query = "INSERT INTO " . $this->table_name . " 
            SET code = :code, 
                userId = :userId, 
                redirect_url = :redirect_url,
                date = :createdate";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(":code", $code);
            $stmt->bindParam(":userId", $userId);
            $stmt->bindParam(":redirect_url", $redirect_url);
            $stmt->bindParam(":createdate", strval(date("Y-m-d H:i:s")));
            $stmt->execute();
        }
    }

    public function getClicks()
    {
        $query = "SELECT clicks FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $i = 0;
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $i += $item["clicks"];
        }
        return $i;
    }

    public function addClick($code, $clicks_before)
    {
        $i = $clicks_before + 1;
        $query = "UPDATE " . $this->table_name . " SET clicks = ? WHERE code = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $i);
        $stmt->bindParam(2, $code);
        $stmt->execute();
    }

    public function deleteRedirect(int $id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam("id", $id);
        $stmt->execute();
    }

}