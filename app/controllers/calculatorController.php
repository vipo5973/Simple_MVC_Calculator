<?php

Class calculatorController Extends Controller {

  public function plus($number1, $number2, $number3=null) {
    $result = $number1 + $number2;
    $operation = "$number1 + $number2";
    $this->model->insert($operation, $result);
    return $this->show($number1, $number2, $number3, $result);
  }

  public function minus($number1, $number2, $number3=null) {
    $result = $number1 - $number2;
    $operation = "$number1 - $number2";
    $this->model->insert($operation, $result);
    return $this->show($number1, $number2, $number3, $result);
  }

  public function times($number1, $number2, $number3=null) {
    $result = $number1 * $number2;
    $operation = "$number1 x $number2";
    $this->model->insert($operation, $result);
    return $this->show($number1, $number2, $number3, $result);
  }

  public function divided($number1, $number2, $number3=null) {
    $result = $number1 / $number2;
    $operation = "$number1 / $number2";
    $this->model->insert($operation, $result);
    return $this->show($number1, $number2, $number3, $result);
  }

  public function show($number1, $number2, $number3, $result) {
    if($number3 == 1) {
      echo $result;
      exit;
    }
    if($number3 == 2) {
      return $result;
    }
    $view = $this->view('../app/views/calculatorTmpl.php', ['title'=>'Calculator', 'number1'=>$number1, 'number2'=>$number2, 'result'=>$result]);
    return $view;
  }

}


?>
