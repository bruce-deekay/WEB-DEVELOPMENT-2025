<?php

class Comment{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get comments from a post
    public function getCommentByPost($post_id){
        $this->db->query('
        SELECT
            c.*,
            u.username
        FROM
            comments c
        JOIN
            users u ON c.user_id=u.id
        WHERE
            c.post_id = :post_id
        ORDER BY
            c.created_at DESC
    ');

    $this->db->bind('post_id', $post_id);
    $this->db->resultSet();
    }

    public function addCommentToCommentTable($data){
        $this->db->query('
        INSERT INTO comments (content, post_id, user_id) VALUES (:content, :post_id, :user_id)');

        // Bind values
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);7

        // Execute
        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Delete comment
    public function deleteComment($id){
        $this->db->query('DELETE FROM comments WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}

?>