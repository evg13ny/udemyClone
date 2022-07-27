<?php

// User model

class User extends Model
{
    public $errors = [];
    protected $table = "users";

    protected $allowedColumns = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'date',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "First name is required";
        }

        if (empty($data['lastname'])) {
            $this->errors['lastname'] = "Last name is required";
        }

        $query = "SELECT * FROM `users` WHERE email = :email LIMIT 1";

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        } elseif ($this->query($query, ['email' => $data['email']])) {
            $this->errors['email'] = "This email already exists";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }

        if ($data['password'] !== $data['retype_password']) {
            $this->errors['retype_password'] = "Passwords do not match";
        }

        if (empty($data['terms'])) {
            $this->errors['terms'] = "Please accept terms and conditions";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}
