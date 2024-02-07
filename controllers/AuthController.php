<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class AuthController extends AbstractController
{
    public function login() : void
    {
        $this->render("login", []);
    }

    public function checkLogin() : void
    {
        // si le login est valide => connecter puis rediriger vers la home
        // $this->redirect("index.php");

        // sinon rediriger vers login
        // $this->redirect("index.php?route=login");
    }

    public function register() : void
    {
        $this->render("register", []);
    }

    public function checkRegister() : void
    {
        // si le register est valide => connecter puis rediriger vers la home
        // $this->redirect("index.php");

        // sinon rediriger vers register
        // $this->redirect("index.php?route=register");
    }

    public function logout() : void
    {
        session_destroy();

        $this->redirect("index.php");
    }
}