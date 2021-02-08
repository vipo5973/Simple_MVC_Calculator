<?php

class Router
{

  static public function get_url_and_parse($url, $registered_controllers, $registered_methods)
  {
    $url = trim($url);
    if ($url == "public/index.php")
    {
      require_once('../app/models/calculatorModel.php');
      require_once('../app/controllers/calculatorController.php');
      $controller = new calculatorController('calculatorModel');
      $view = $controller->view('../app/views/calculatorTmpl.php', ['title'=>'Calculator', 'number1'=>"", 'number2'=>"", 'result'=>""]);
      return $view;
    } else {
      $url_expl = explode('/', $url);
      $controller_expl = $url_expl[0];
      if(!in_array($controller_expl, $registered_controllers)) {
        $controller = new Controller('Model');
        $view = $controller->view('../app/views/errorTmpl.php', ['title'=>'Error', 'error'=>"Error 404 File doesn't exist."]);
        exit;
      }
      $method_expl = $url_expl[1];
      if(!in_array($method_expl, $registered_methods)) {
        $controller = new Controller('Model');
        $view = $controller->view('../app/views/errorTmpl.php', ['title'=>'Error', 'error'=>"Error 404 File doesn't exist."]);
        exit;
      }
      $arguments_expl = array_slice($url_expl, 2);
      $controller = self::get_controller($controller_expl);
      $result = $controller->$method_expl(...$arguments_expl);
      return $result;
    }
  }

  static public function get_url_and_parse_api($data)
  {
    $controller_expl = $data->controller;
    $method_expl = $data->operation;
    $arguments_expl = array($data->number1, $data->number2, 'number3' => 2);
    $controller = self::get_controller($controller_expl);
    $result = $controller->$method_expl(...$arguments_expl);
    return $result;
  }

  static private function get_controller($controller_expl)
  {
    $controller_name = $controller_expl . "Controller";
    $model_name = $controller_expl . "Model";
    require_once('../app/controllers/' . $controller_name . '.php');
    require_once('../app/models/' . $model_name . '.php');
    $controller = new $controller_name($model_name);
    return $controller;
  }

}

?>
