<?php

Class Controller {
  public $model;

  public function __construct($model_name) {
    $this->model = new $model_name();
  }

  public function view($file, $data=[]) {
    $view = new View($file, $data);
    $view->display();
  }
}

?>
