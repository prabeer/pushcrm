<?php
include_once 'database2.php';
// Singleton to connect db.
class ConnectDbView {
    
    // Hold the class instance.
    private static $instance = null;
    private $conn;
    
    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new database('VIEW');
    }
    
    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new ConnectDbView();
        }
        
        return self::$instance;
    }
    
    public function getConnection()
    {
        return $this->conn;
    }
}