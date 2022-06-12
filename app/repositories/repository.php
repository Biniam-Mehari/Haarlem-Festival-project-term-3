<?php

namespace Repositories;

use DB;
use PDOException;

require __DIR__ . '../../db.php';

class Repository
{
    protected DB $connection;

    public function __construct()
    {
        try {
            $this->connection = DB::getInstance();
        }
        catch(PDOException $e) {
            echo "Connection to the database has failed: " + $e->getMessage();
        }
    }
}
