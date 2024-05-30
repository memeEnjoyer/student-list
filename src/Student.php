<?php
namespace StudentsList\Model;

class Student {
  // sex and residency should be passed using these constants
  const string SEX_MALE = 'M';
  const string SEX_FEMALE = 'F';
  const string RESIDENT = 'RESIDENT';
  const string NONRESIDENT = 'NONRESIDENT';

  public string $name;
  public string $surname;
  public string $sex;
  public string $groupId;
  public string $email;
  public int $birthYear;
  public string $residency;
  public int $examPoints;

  function __construct(string $name, string $surname, string $sex, string $groupId, string $email, int $birthYear, string $residency, int $examPoints) {
    $this->name = $name;
    $this->surname = $surname;
    $this->sex = $sex;
    $this->groupId = $groupId;
    $this->email = $email;
    $this->birthYear = $birthYear;
    $this->residency = $residency;
    $this->examPoints = $examPoints;
  }
}

