<?php

class Post{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }
    
    // Get all posts
    public function getPosts(){
        $this->db->query('
        SELECT 
            p.*, 
            u.username,
            c.name as category
        FROM
            posts p
        LEFT JOIN
            users u ON p.user_id=u.id
        LEFT JOIN
            categories c ON p.category_id=c.id
        ORDER BY
            p.created_at DESC
        ');

        return $this->db->resultSet();
    }

    // Get post by category
    public function getPostByCategory($category_id){
        $this->db->query('
        SELECT
            p.*,
            u.username,
            c.name as category
        FROM
            posts p
        LEFT JOIN
            users u ON p.user_id=u.id
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE
            p.category_id=:category_id
        ORDER BY
            p.created_at
        ');
        $this->db->bind(':category_id', $category_id);
        return $this->db->resultSet();
    }

    // Get post by ID
    public function getPostByID($id){
        $this->db->query('
        SELECT
            p.*,
            u.username,
            c.name as category
        FROM
            posts p
        LEFT JOIN
            users u ON p.user_id=u.id
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE
            p.id=:id
        ');

        $this->db->bind(':id', $id);

        return $this->db->single();
    }
    // Get post by slug
    public function getSlug($slug){
        $this->db->query('
        SELECT
            p.*,
            u.username,
            c.name as category
        FROM
            posts p
        LEFT JOIN
            users u ON p.user_id=u.id
        LEFT JOIN
            categories c ON p.category_id = c.id
        WHERE
            p.id=:id
        ');

        $this->db->bind(':slug', $slug);

        return $this->db->single();
    }

    // Add post
    public function addPost($data){
        // Create slug from title
        $slug=$this->createSlug($data['title']);

        $this->db->query('
            INSERT INTO posts
                (title, content, slug, user_id, category_id)
            VALUES
                (:title, :content, :slug, :user_id, :category_id)
        ');

        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':slug', $slug);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['category_id']);

        // Execute
        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Update posts
    public function updatePost($data){
        $this->db->query('
        UPDATE posts
        SET
            title = :title,
            content = :content,
            category_id = :category_id
        WHERE
            id = :id
        ');

        // Bind
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':category_id', $data['category_id']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

        // Delete post
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    // Create a slug
    public function createSlug($title){
        // Convert to lowercase and replace spaces with hyphens
        $slug = strtolower(str_replace(' ', '-', $title));
        // Remove any non-alphanumeic characters except hyphens
        $slug = preg_replace('/[^a-z0-9]/','',$slug);
        // Remove multiple hyphens
        $slug = preg_replace('/-+/', '-', $slug);

        // Check if slug already exists
        $this->db->query('SELECT id FROM posts WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        $this->db->execute();

        if ($this->db->rowCount()>0){
            // Append number to make unique
            $slug = $slug.'-'.uniqid();
        }
        return $slug;
    }
}
?>