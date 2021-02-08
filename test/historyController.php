<?php

Class historyController Extends Controller {

  public function show() {
    $history = $this->model->select_all();
    $output = "";
    foreach($history as $val) {
    $output .= '<tr>
                  <td class="">'.$val['id'].'</td>'.
                  '<td class="">'.$val['operation'].'</td>'.
                  '<td class="">'.$val['sum'].'</td>
                </tr>';
    }
    $view = $this->view('../app/views/historyTmpl.php', ['title' => 'History', 'output' => $output]);
    return $view;
  }

  /*
public function check($table) {
    $check = $this->model->check_table($table);
    if(is_array($check)) {foreach($check as $key=>$value){$output = "Yes, ".$key.", ".$value;}} else {$output = $check;}
    $view = $this->view('../app/views/historyTmpl.php', ['title' => 'Table check', 'output' => $output]);
    return $view;
  }*/

}

?>
