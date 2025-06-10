<?php

namespace crudPhp;

use PDO;

class Connection
{
  public function createConnection(): PDO
  {
    try {
      $pdo = new PDO("mysql:host=db;dbname=crud_php", "root", "root");;
      return $pdo;
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
  }
}
