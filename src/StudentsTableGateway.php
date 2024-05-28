<?php
namespace StudentsList\Model\StudentsTableGateway;
use StudentsList\Model\DatabaseConnection;
use StudentsList\Model\Student;

class StudentsTableGateway {
  private PDO $pdo;

  //Depency injection of a PDO
  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  // Email is unique, so that would be the most suitable key
  public function getStudentByEmail(string $email): Student {
    $getStmt = $this->pdo->prepare("SELECT * FROM students LIMIT 1 WHERE email = :email");
    $getStmt->bindValue(':email', $email);
    $getStmt->execute();

    $result = $getStmt->fetchAll();
    
    // Only returns data that needs to be displayed
    return new Student($result['name'], $result['surname'],
    $result['groupId'], $result['examPoints']); 
  }

  public function addStudent(Student $student) {
    $insertStmt = $this->pdo->prepare("INSERT INTO students (name, surname, sex, groupId, email, birthYear, residency, examPoints) VALUES (
      :name, :surname, :sex, :groupId, :email, :birthYear, :residency, :examPoints)");
    foreach($student as $prop) { // bind every property of student object
      $insertStmt->bindValue(':' . $prop, $prop);
    };
    $insertStmt->execute();
  }
}
