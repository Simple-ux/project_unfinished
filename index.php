<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('./config/constants.php');
require_once('./components/Router.php');


$router = new Router();
$router -> run();