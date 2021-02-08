<?php

Class calculatorModel Extends Model {

  public function insert($operation, $sum) {
    $this->stmt = $this->PDO->prepare("INSERT INTO history (operation, sum ) VALUES (?, ?)");
    $this->stmt->execute([$operation, $sum]);
    return $this->stmt->rowCount();
  }
}

?>
