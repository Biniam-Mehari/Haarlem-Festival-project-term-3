<?php
define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASSWORD', 'secret123');
define('DB_NAME', 'developmentdb');


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