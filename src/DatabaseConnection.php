<?php
namespace StudentsList\Model;
use PDO;

class DatabaseConnection {
  private static $instance;
  private $pdo;

  private function __construct($config) {  // Make a singleton connection 
    $this->pdo = new PDO($config["driver"] . __DIR__ . $config["database"], $config["username"], $config["password"]);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public static function getInstance($config): DatabaseConnection {
    if(!isset(self::$instance)) {
      self::$instance = new DatabaseConnection($config);
    }
    return self::$instance;
  }

  public function getPDO() {
    return $this->pdo;
  }
}
