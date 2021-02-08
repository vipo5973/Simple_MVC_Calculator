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

}

?>
