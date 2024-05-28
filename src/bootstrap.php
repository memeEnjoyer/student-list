<?php
namespace StudentsList\Model;
use StudentsList\Model\DatabaseConnection;
require_once(__DIR__ . '/../vendor/autoload.php');

$configJson = file_get_contents(__DIR__ . '/../config.json');
$config = json_decode($configJson, true);
$pdo;
$connection = new DatabaseConnection;

try {
  $pdo = $connection->connect($config);
} catch(PDOException $e) {
  die($e->getMessage());
};
