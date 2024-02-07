<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

session_start();

require "config/autoload.php";

if(!isset($_SESSION["csrf-token"]))
{
    $tokenManager = new CSRFTokenManager();
    $token = $tokenManager->generateCSRFToken();

    $_SESSION["csrf-token"] = $token;
}


$router = new Router();

$router->handleRequest($_GET);