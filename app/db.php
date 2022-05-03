<?php
define('DB_HOST', 'sql11.freemysqlhosting.net');
define('DB_USER', 'sql11475581');
define('DB_PASSWORD', 'dpwGMnERcq');
define('DB_NAME', 'sql11475581');


class DB extends PDO
{
    private static DB $instance;

    public static function getInstance(): DB
    {
        if (empty(self::$instance)) {
            try {
                $dbOptions = self::getConfig();

                $port = $dbOptions['port'];
                $host = $dbOptions['hostname'];
                $name = $dbOptions['name'];
                $user = $dbOptions['username'];
                $password = $dbOptions['password'];
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;port=$port;dbname=$name;charset=$charset";

                self::$instance = new DB($dsn, $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            } catch (PDOException $pdoe) {
                echo "Wrong credentials: " . $pdoe->getMessage();
                die();
            }
        }
        return self::$instance;
    }


    static function getConfig()
    {
        return [

            'hostname' => DB_HOST,
            'port' => 3306,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'name' => DB_NAME
        ];
    }
}