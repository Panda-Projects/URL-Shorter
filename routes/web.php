<?php

use App\Database\Redirect;
use App\Database\Users;
use App\Helper\JWTHelper;
use Pecee\SimpleRouter\SimpleRouter;

$redirect = new Redirect($connection);
$user = new Users($connection);
if ($user->countUser() > 0) {
    if (!empty($_SESSION["jwt"]) && JWTHelper::validate($_SESSION["jwt"])) {
        SimpleRouter::form("/", function () use ($redirect, $user) {
            if (isset($_POST["action"]) && $_POST["action"] == "createRedirect") {
                if (isset($_POST["redirect_url"]) && isset($_POST["code"])) {
                    $redirect->createRedirect($_POST["code"], JWTHelper::getUserId($_SESSION["jwt"]), $_POST["redirect_url"]);
                    header("Location: " . $_ENV["WEBSITE_URL"]);
                } else {
                    print_r("eee");
                }
            }
            $redirects = $redirect->getAllRedirects();
            $name = "Dashboard";
            include '../resource/view/header.php';
            include '../resource/view/dashboard.php';
            include '../resource/view/footer.php';
        });

        SimpleRouter::get("/logout", function () {
            $_SESSION["jwt"] = null;
            header("Location: " . $_ENV["WEBSITE_URL"]);
        });
    } else {
        SimpleRouter::form("/", function () use ($user) {
            if (isset($_POST["action"]) && $_POST["action"] == "login") {
                if (json_decode($user->userLogin($_POST["email"], $_POST["password"]))->code == "0") {
                    header("Location: " . $_ENV["WEBSITE_URL"]);
                }
            }
            $name = "Login";

            include '../resource/view/small-header.php';
            include '../resource/view/login.php';
            include '../resource/view/footer.php';
        });
    }

    SimpleRouter::get('{code}', function ($code) use ($redirect) {
        $redirect1 = $redirect->getRedirects($code);
        if (!empty($redirect1)) {
            $redirect->addClick($code, $redirect1["clicks"]);
            header('Location: ' . $redirect1["redirect_url"]);
        } else {
            $name = "404";
            include '../resource/view/small-header.php';
            include '../resource/view/404.php';
            include '../resource/view/footer.php';
        }

    });
} else {
    SimpleRouter::form("/", function () use ($user) {
        $name = "Setup";
        if (isset($_POST["action"]) && $_POST["action"] == "setup") {
            if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password_confirm"])) {
                if($_POST["password"] === $_POST["password_confirm"]) {
                    $user->createUser($_POST["username"], "", "", $_POST["email"], $_POST["password"]);
                    header("Location: " . $_ENV["WEBSITE_URL"]);
                }
            }
        }

        include '../resource/view/small-header.php';
        include '../resource/view/setup.php';
        include '../resource/view/footer.php';
    });
}