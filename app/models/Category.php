<?php

// Categories model

class Category extends Model
{
    public $errors = [];
    protected $table = "categories";

    protected $allowedColumns = [
        'category',
        'disabled',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['category'])) {
            $this->errors['category'] = "Category is required";
        } elseif (!preg_match("/^[a-zA-Z \&\']+$/", trim($data['category']))) {
            $this->errors['category'] = "Wrong symbols!";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}
