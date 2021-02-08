<?php

Class historyModel Extends Model {

  public function select_all() {
    $this->stmt = $this->PDO->prepare("SELECT * FROM history ORDER BY id DESC");
    $this->stmt->execute();
    $history = $this->stmt->fetchAll();
    return $history;
  }

}
?>
