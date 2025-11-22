<?php
class Database {
    protected $pdo;
    
    public function __construct() {
        $config = require_once __DIR__ . "/../config/database.php";

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db'];
        
        $this->pdo = new PDO($dsn, $config['user'], $config['pass']);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}