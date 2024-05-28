<?php
namespace StudentsList\Model;
use PDO;

class DatabaseConnection {
  private $pdo;

  public function connect($config): PDO {
    $this->pdo = new PDO($config["driver"] . __DIR__ . $config["database"], $config["username"], $config["password"]);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $this->pdo;
  }
}
