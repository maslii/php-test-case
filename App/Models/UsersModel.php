<?php

namespace App\Models;

class UsersModel extends \Core\Model
{
    public function getUsers()
    {
        $statement = $this->connection->query('SELECT * FROM users');
        return $statement->fetchAll();
    }
}