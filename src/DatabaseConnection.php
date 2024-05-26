<?php
namespace StudentsList\Model\DatabaseConnection;

class DatabaseConnection {
  private $pdo;

  public function connect() {
    try {
      $configJson = file_get_contents(__DIR__ . '/../config.json');
      $config = json_decode($configJson, true);

      $this->pdo = new PDO($config["database"], $config["username"], $config["password"]);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $this->pdo;

    } catch(PDOException $e) {

      die($e->getMessage());
    }
  }
}
