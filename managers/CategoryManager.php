<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];

        foreach($result as $item)
        {
            $category = new Category($item["title"], $item["description"]);
            $category->setId($item["id"]);
            $categories[] = $category;
        }

        return $categories;
    }

    public function findOne(int $id) : ? Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id=:id');
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $category = new Category($result["title"], $result["description"]);
            $category->setId($result["id"]);

            return $category;
        }

        return null;
    }

    public function findByPost(int $postId) : array
    {
        $query = $this->db->prepare('SELECT categories.title FROM categories 
    JOIN posts_categories ON posts_categories.category_id=categories.id 
    WHERE posts_categories.post_id=:postId');
        $parameters = [
            "postId" => $postId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}