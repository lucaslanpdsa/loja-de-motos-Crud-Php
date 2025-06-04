<?php

class Connection
{
  public function createConnection(): PDO
  {
    try {
      $pdo = new PDO("mysql:host=localhost;dbname=crud-php", "root", "");
      return $pdo;
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
  }
}
