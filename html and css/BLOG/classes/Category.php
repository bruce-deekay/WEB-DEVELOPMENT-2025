<?php

class Category{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all categories
    public function getCategories(){
        $this->db->query("SELECT * FROM categories ORDER BY name");
        return $this->db->resultSet();
    }

    // Get category by ID
    public function getCategoryById($id){
        $this->db->query("SELECT * FROM categories WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Get category by slug
    public function getCategoryBySlug($slug){
        $this->db->query("SELECT * FROM categories WHERE slug = :slug");
        $this->db->bind(':slug', $slug);
        return $this->db->single();
    }

    // Add category
    public function addCategory($name){
        // Create slug from name
        $slug = strtolower(str_replace(' ', '-', $name));
        $slug = preg_replace('/[a-z0-9]/', '', $slug);

        $this->db->query('INSERT INTO categories (name, slug) VALUES (:name, :slug)');

        // Bind values
        $this->db->bind(':name', $name);
        $this->db->bind(':slug', $slug);

        // Execute
        if ($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}

?>