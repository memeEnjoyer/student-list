<?php
namespace StudentsList\Model;
use StudentsList\Model\DatabaseConnection;
use StudentsList\Model\Student;
use PDO;

class StudentsTableGateway {
  private PDO $pdo;

  //Depency injection of a PDO
  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function getStudents(): array {
    $getStmt = $this->pdo->prepare("SELECT * FROM students");
    $getStmt->execute();

    $rows = $getStmt->fetchAll();
    $students = [];
    
    foreach($rows as $row) {
      array_push($students, new Student($row['name'], $row['surname'], $row['sex'],
      $row['groupId'], $row['email'], $row['birthYear'], $row['residency'], $row['examPoints']));
    };

    return $students;
  }

  // Email is unique, so that would be the most suitable key
  public function getStudentByEmail(string $email): Student {
    $getStmt = $this->pdo->prepare("SELECT * FROM students WHERE email = :email LIMIT 1");
    $getStmt->bindValue(':email', $email);
    $getStmt->execute();

    $result = $getStmt->fetchAll()[0];
    
    return new Student($result['name'], $result['surname'], $result['sex'],
    $result['groupId'], $result['email'], $result['birthYear'], $result['residency'], $result['examPoints']); 
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
