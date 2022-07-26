<?php

// User model

class User
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

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
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

    public function insert($data)
    {
        // remove unwanted columns
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        // prepare query
        $keys = array_keys($data);
        $values = array_values($data);
        $query = "INSERT INTO `users` ";
        $query .= "(" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        // run query
        $db = new Database();
        $db->query($query, $data);
    }
}
