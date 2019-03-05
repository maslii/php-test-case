<?php

namespace App\Models;

use Core\Model;

class CountryModel extends Model
{
    public function getCountries()
    {
        $sql = 'SELECT * FROM countries';
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }
}