<?php
namespace StudentsList\Controllers;
require_once(__DIR__ . "/../src/bootstrap.php");

use StudentsList\Model\Student;
use StudentsList\Model\StudentsTableGateway;

$gateway = new StudentsTableGateway($pdo);
$students = $gateway->getStudents();

include("index.html");
