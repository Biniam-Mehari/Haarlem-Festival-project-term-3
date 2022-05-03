<?php

namespace Repositories;

use DB;

require __DIR__ . '../../db.php';

class Repository
{
    protected DB $connection;

    public function __construct()
    {
        $this->connection = DB::getInstance();
    }
}
