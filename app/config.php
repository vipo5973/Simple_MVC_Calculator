<?php
/* config.php */

define('DEBUG', TRUE);
define('DB_DEBUG', TRUE);
$db_log = TRUE;
define('APP_ROOT', dirname(__FILE__));
define('URL_ROOT', 'http://localhost/Calculator/');
define('SITE_NAME', 'Calculator');
//DB Config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calculator');
define('DB_CHARSET', 'utf8mb4');
define('DB_TABLE', 'history');
define('STANDARD_ERROR_MESSAGE', 'There has been an error.');
$registered_controllers = ['calculator', 'history'];
$registered_methods = ['minus', 'plus', 'times', 'divided', 'show'];

if(!DB_DEBUG) {
  error_reporting(E_ERROR);
  ini_set('display_errors', 0);
} else {
  @ob_end_flush();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
}
