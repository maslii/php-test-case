<?php

namespace Core;

class Model
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
}