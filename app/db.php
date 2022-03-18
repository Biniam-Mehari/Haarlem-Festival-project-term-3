<?php
 define('DB_HOST', 'sql11.freemysqlhosting.net');
 define('DB_USER', 'sql11475581');
 define('DB_PASSWORD', 'dpwGMnERcq');
 define('DB_NAME', 'sql11475581');

class DbConnection {
    private $connection;
    private static $instance; //The single instance

    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new DbConnection();
        }
        return self::$instance;
    }

    // Constructor
    private function __construct() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die ("<br/>Could not connect to MySQL server");

        mysqli_select_db($this->connection, DB_NAME)
        or die ("<br/>Could not select the indicated database");
    }

    //Get mySqli connection
    public function getConnection() {
        return $this->connection;
    }

}
?>