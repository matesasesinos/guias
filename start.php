<?php
define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS, TRUE);

require BASE_PATH.'vendor/autoload.php';

require_once( __DIR__ . '/config.php');
use \App\Models\Database;
new Database();

use App\Controllers\Guia;
Guia::eliminar_fecha(date('Y-m-d'));