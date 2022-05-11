<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHelper
{

    public static function validate($jwt)
    {
        if ($jwt) {

            try {
                $secret_key = $_ENV["JWT_SECRET_KEY"];
                $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));

                // Access is granted. Add code of the operation here

                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    public static function getUserId($jwt) {
        $secret_key = $_ENV["JWT_SECRET_KEY"];
        $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
        return $decoded->data->id;
    }

}