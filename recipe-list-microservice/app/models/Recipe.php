<?php

class Recipe {
    public $id;
    public $title;
    public $ingredients;
    public $instructions;
    public $created_at;

    public function __construct($id, $title, $ingredients, $instructions, $created_at) {
        $this->id = $id;
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->instructions = $instructions;
        $this->created_at = $created_at;
    }
}
