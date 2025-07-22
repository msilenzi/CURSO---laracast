<?php

namespace core;

use PDO, PDOStatement;

class Database {
  private PDO $conn;
  private PDOStatement $stmt;

  public function __construct($config) {
    $dsn = "mysql:" . http_build_query($config, '', ';');
    $this->conn = new PDO($dsn, null, null, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query(string $query, $params = []) {
    $this->stmt = $this->conn->prepare($query);
    $this->stmt->execute($params);
    return $this;
  }

  public function findAll() {
    return $this->stmt->fetchAll();
  }

  public function findOne() {
    return $this->stmt->fetch();
  }

  public function findOneOrAbort() {
    $result = $this->findOne();
    if (!$result) abort(HttpResponse::NOT_FOUND);
    return $result;
  }
}
