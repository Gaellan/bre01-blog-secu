<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class BlogController extends AbstractController
{
    public function home() : void
    {
        $pm = new PostManager();
        $cm = new CategoryManager();

        $posts = $pm->findLatest();
        $categories= $cm->findAll();

        $this->render("home", [ "posts" => $posts, "categories" => $categories]);
    }

    public function category(string $categoryId) : void
    {
        $cm = new CategoryManager();

        $category = $cm->findOne(intval($categoryId));


        if($category !== null)
        {
            $pm = new PostManager();
            $posts = $pm->findByCategory($category->getId());
            $categories = $cm->findAll();

            $this->render("category", ["category" => $category, "posts" => $posts, "categories" => $categories]);
        }
        else
        {
            $this->redirect("index.php");
        }
    }

    public function post(string $postId) : void
    {
        // si le post existe
        $this->render("post", []);

        // sinon
        $this->redirect("index.php");
    }

    public function checkComment() : void
    {
        $this->redirect("index.php?route=post&post_id={$_POST["post_id"]}");
    }
}