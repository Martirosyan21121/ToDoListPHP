<?php

namespace router;

use controller\AdminController;

require_once "../controller/AdminController.php";

class Router
{
    public static function router($url): void
    {
        switch ($url) {
            case '/delete':
                AdminController::deleteUserById();
                break;

            case '/allUsers':
                header("Location: ../view/register.php");

//                AdminController::allUsersData();
                break;

            default:
                self::notFound();
                break;
        }
    }
    public static function notFound(): void
    {
        header("Location: ../view/404.php");
        echo '404 Not Found';
    }
}

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

Router::router($url);