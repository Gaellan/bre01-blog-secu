<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class Router
{
    private AuthController $ac;
    private BlogController $bc;

    public function __construct()
    {
        $this->ac = new AuthController();
        $this->bc = new BlogController();
    }
    public function handleRequest(array $get) : void
    {
        if(!isset($get["route"]))
        {
            $this->bc->home();
        }
        else if(isset($get["route"]) && $get["route"] === "register")
        {
            $this->ac->register();
        }
        else if(isset($get["route"]) && $get["route"] === "check-register")
        {
            $this->ac->checkRegister();
        }
        else if(isset($get["route"]) && $get["route"] === "login")
        {
            $this->ac->login();
        }
        else if(isset($get["route"]) && $get["route"] === "check-login")
        {
            $this->ac->checkLogin();
        }
        else if(isset($get["route"]) && $get["route"] === "logout")
        {
            $this->ac->logout();
        }
        else if(isset($get["route"]) && $get["route"] === "category")
        {
            if(isset($get["category_id"]))
            {
                $this->bc->category($get["category_id"]);
            }
            else
            {
                $this->bc->home();
            }
        }
        else if(isset($get["route"]) && $get["route"] === "post")
        {
            if(isset($get["post_id"]))
            {
                $this->bc->post($get["post_id"]);
            }
            else
            {
                $this->bc->home();
            }
        }
        else if(isset($get["route"]) && $get["route"] === "check-comment")
        {
            $this->bc->checkComment();
        }
        else
        {
            $this->bc->home();
        }
    }
}