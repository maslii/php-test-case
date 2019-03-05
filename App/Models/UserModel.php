<?php

namespace App\Models;

use Core\Model, PDO;

class UserModel extends Model
{
    public function getUsers()
    {
        $sql = 'SELECT u.id, u.name, u.email, c.country FROM users u LEFT JOIN countries c ON u.country_id=c.id';
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function getUser($user_id)
    {
        $sql = 'SELECT u.id, u.name, u.email, c.id as c_id, c.country FROM users u LEFT JOIN countries c ON u.country_id=c.id WHERE u.id=?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteUser($user_id)
    {
        $sql = 'DELETE FROM users WHERE id=?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function addUser($user_name, $user_email, $user_country_id)
    {
        $sql = 'INSERT INTO users (name, email, country_id) VALUES (?, ?, ?)';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $user_name, PDO::PARAM_STR);
        $stmt->bindValue(2, $user_email, PDO::PARAM_STR);
        $stmt->bindValue(3, $user_country_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function updateUser($user_id, $user_name, $user_email, $user_country_id)
    {
        $sql = 'UPDATE users SET name=?, email=?, country_id=? WHERE id=?';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $user_name, PDO::PARAM_STR);
        $stmt->bindValue(2, $user_email, PDO::PARAM_STR);
        $stmt->bindValue(3, $user_country_id, PDO::PARAM_INT);
        $stmt->bindValue(4, $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }
}