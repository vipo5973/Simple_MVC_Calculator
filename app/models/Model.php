<?php

Class Model {
  protected $PDO;
  protected $stmt;

  public function __construct() {
    $DBconn = new DBConnection();
    $this->PDO = $DBconn->pdo;
  }

  public function row_count()
  {
    $this->stmt = $this->PDO->prepare('SELECT * FROM history');
    $this->stmt->execute();
    return $this->stmt->rowCount();
  }
}

?>
