<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findLatest() : array
    {
        return [];
    }

    public function findOne(int $id) : ? Post
    {
        return null;
    }

    public function findByCategory(int $categoryId) : array
    {
        return [];
    }
}