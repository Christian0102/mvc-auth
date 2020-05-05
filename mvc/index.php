<?php
/**Front Controller  */



/*General Settings*/ 

ini_set('display_errors', 1);

error_reporting(E_ALL);

/*Connection App Files*/
session_start();
define('ROOT', dirname(__FILE__));
header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET') {
				//header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Headers: X-Requested-With');
        
    }
    exit;
}

require_once(ROOT.'/components/Router.php');

require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/components/functions.php');

$router = new Router();
$router->run();
