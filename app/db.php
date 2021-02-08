<?php

class DBConnection
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;
  private $charset = DB_CHARSET;

  public $pdo;
  public $err_message;
  private $stmt;


  public function __construct()
  {
    $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
       $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    $this->err_message = $this->check_table(DB_TABLE);
  }

  private function check_table($table) {
    $this->stmt = $this->pdo->prepare("SHOW TABLES LIKE '".$table."'");
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
      $this->stmt = $this->pdo->prepare("CREATE TABLE `".$table."` (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `operation` varchar(255) NOT NULL,
        `sum` double NOT NULL
      ) ENGINE=InnoDB");
      $this->stmt->execute();
      $message = "Table created successfully";
    } catch(PDOException $e) {
      $message = "SQL Error:<br>" . $e->getMessage();
    }
    return $message;
  }

}
