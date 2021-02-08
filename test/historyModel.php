<?php

Class historyModel Extends Model {

  public function select_all() {
    $this->stmt = $this->PDO->prepare('SELECT * FROM history');
    $this->stmt->execute();
    $history = $this->stmt->fetchAll();
    return $history;
  }

  /*
public function check_table($table) {
    $this->stmt = $this->PDO->prepare("SHOW TABLES LIKE '".$table."'");
    $this->stmt->execute();
    $result = $this->stmt->fetch();
    if(empty($result)) {
      $create_table = $this->create_table($table);
      return $create_table;
    }
    return $result;
  }

  private function create_table($table) {
    try {
      $this->stmt = $this->PDO->prepare("CREATE TABLE `".$table."` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `operation` varchar(255) NOT NULL,
        `sum` double NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
      $this->stmt->execute();
      $message = "Table created successfully";
    } catch(PDOException $e) {
      $message = "SQL Error:<br>" . $e->getMessage();
    }
    return $message;
  }*/

}
?>
