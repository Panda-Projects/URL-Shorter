<?php

namespace App\Database;

use Firebase\JWT\JWT;
use PDO;
use PDOException;

class Users
{

    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $query = "CREATE TABLE IF NOT EXISTS `Users` (
  `id` INT  AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(150),
  `last_name` VARCHAR(150),
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`) )";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }

    public function createUser($username, $firstName, $lastName, $email, $password)
    {
        $query = "INSERT INTO Users
                SET username = :username,
                    first_name = :firstname,
                    last_name = :lastname,
                    email = :email,
                    password = :password";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':firstname', $firstName);
        $stmt->bindParam(':lastname', $lastName);
        $stmt->bindParam(':email', $email);

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt->bindParam(':password', $password_hash);

        if ($stmt->execute()) {
            $this->userLogin($email, $password);
            return array("code" => "0", "message" => "User was successfully registered.");
        } else {
            return array("code" => "1", "message" => "Unable to register the user.");
        }
    }

    public function userLogin($email, $password)
    {
        $query = "SELECT id, first_name, username, last_name, password FROM Users WHERE email = ? LIMIT 0,1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $num = $stmt->rowCount();
        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $username = $row['username'];
            $password2 = $row['password'];

            if (password_verify($password, $password2)) {
                $secret_key = $_ENV['JWT_SECRET_KEY'];
                $issuer_claim = "URL-Shorter"; // this can be the servername
                $audience_claim = "THE_AUDIENCE";
                $issuedat_claim = time(); // issued at
                $notbefore_claim = $issuedat_claim; //not before in seconds
                $expire_claim = $issuedat_claim + 1000000; // expire time in seconds
                $token = array(
                    "iss" => $issuer_claim,
                    "aud" => $audience_claim,
                    "iat" => $issuedat_claim,
                    "nbf" => $notbefore_claim,
                    "exp" => $expire_claim,
                    "data" => array(
                        "id" => $id,
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "username" => $username,
                        "email" => $email
                    ));

                $jwt = JWT::encode($token, $secret_key, "HS256");
                $_SESSION['jwt'] = $jwt;

                return json_encode(array("code" => "0", "message" => "User was successfully sign in."));
            } else {
                return json_encode(array("code" => "1", "message" => "User can't successfully sign in."));
            }
        } else {
            return json_encode(array("code" => "2", "message" => "User can't successfully sign in."));
        }
    }

    public function userFromId($id)
    {
        $query = "SELECT id, username FROM Users WHERE id = ? LIMIT 0,1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countUser() {
        $query = "SELECT id FROM Users";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }
}