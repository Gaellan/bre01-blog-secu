<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByPost(int $postId) : array
    {
        $um = new UserManager();
        $pm = new PostManager();

        $query = $this->db->prepare('SELECT * FROM comments WHERE post_id=:postId');
        $parameters = [
            "postId" => $postId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach($result as $item)
        {
            $user = $um->findOne($item["user_id"]);
            $post = $pm->findOne($item["post_id"]);

            $comment = new Comment($item["content"], $user, $post);
            $comment->setId($item["id"]);

            $comments[] = $comment;
        }

        return $comments;
    }

    public function create(Comment $comment) : void
    {
        $query = $this->db->prepare('INSERT INTO comments (id, content, user_id, post_id) VALUES (NULL, :content, :user_id, :post_id)');
        $parameters = [
            "content" => $comment->getContent(),
            "user_id" => $comment->getUser()->getId(),
            "post_id" => $comment->getPost()->getId(),
        ];

        $query->execute($parameters);

        $comment->setId($this->db->lastInsertId());
    }
}