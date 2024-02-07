<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail(string $email) : ? User
    {
        return null;
    }

    public function findOne(int $id) : ? User
    {
        return null;
    }

    public function create(User $user) : void
    {

    }
}