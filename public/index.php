<?php
require_once "../app/config.php";
require_once '../app/db.php';
require_once '../app/router.php';
require_once '../app/views/View.php';
require_once '../app/controllers/Controller.php';
require_once '../app/models/Model.php';

isset($_REQUEST['url']) ? $url = $_REQUEST['url'] : die('Sorry, something went wrong');

Router::get_url_and_parse($url, $registered_controllers, $registered_methods);

?>
