<?php
class Recipe {
    public $id;
    public $user_id;
    public $title;
    public $ingredients;
    public $instructions;
    public $created_at;

    public function __construct($user_id, $title, $ingredients, $instructions) {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->instructions = $instructions;
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO recipes (user_id, title, ingredients, instructions, created_at) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $this->user_id, $this->title, $this->ingredients, $this->instructions, $this->created_at);
        return $stmt->execute();
    }
}
