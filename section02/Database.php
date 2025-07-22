<?php

class Database {
  private PDO $conn;

  public function __construct($config) {
    $dsn = "mysql:" . http_build_query($config, '', ';');
    $this->conn = new PDO($dsn, null, null, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query(string $query, $params = []) {
    $stmt = $this->conn->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }
}
