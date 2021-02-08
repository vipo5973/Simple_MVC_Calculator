<?php

class View {
  protected $templ;
  protected $data = array();

  public function __construct($templ, $data = []) {
    $this->templ = $templ;
    $this->data = $data;
  }

  public function set($key, $value) {
  $this->data[$key] = $value;
  }

  public function get($key) {
  return $this->data[$key];
  }

  public function display() {
    if (!file_exists($this->templ)) {
      throw new Exception("Template " . $this->templ . " doesn't exist.");
    }
    extract($this->data);
    ob_start();
    include($this->templ);
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
  }
}

?>
