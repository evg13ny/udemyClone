<?php

// main model class

class Model extends Database
{
    protected $table = "";

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

        $query = "INSERT INTO " . $this->table;
        $query .= " (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        // run query
        $this->query($query, $data);
    }
}
