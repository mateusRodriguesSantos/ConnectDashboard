<?php

define('BASE', '/ConnectDashboard/');


define('UNSET_URI_COUNT', 1);
define('DEBUG_URI', false);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$g = gmdate('D, d M Y H:i:s');
header('Expires: ' . $g . ' GMT');
header('Last-Modified: ' . $g . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>