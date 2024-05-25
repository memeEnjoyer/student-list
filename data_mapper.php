<?php
declare(strict_types = 1);

class Student {
  public string $name;
  public string $surname;
  public string $groupId;
  public int $examPoints;

  function __construct(string $name, string $surname, string $groupId, int $examPoints) {
    $this->name = $name;
    $this->surname = $surname;
    $this->groupId = $groupId;
    $this->examPoints = $examPoints;
  }
}

class StudentsList {

}
