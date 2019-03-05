<?php

namespace Core;

use PDO;

class AdapterPDO
{
    protected $dsn;
    protected $user_name;
    protected $user_password;
    protected $options;

    public function __construct(
        $db_server,
        $db_host,
        $db_name,
        $db_charset,
        $db_user_name,
        $db_user_password,
        array $options
    )
    {
        $this->dsn = $db_server . ':host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_charset;
        $this->user_name = $db_user_name;
        $this->user_password = $db_user_password;
        $this->options = $options;
    }

    public function getConnection()
    {
        return new PDO($this->dsn, $this->user_name, $this->user_password, $this->options);
    }
}