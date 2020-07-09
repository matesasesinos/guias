<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use App\Models\Database;

new Database();

use App\Controllers\Guia;
Guia::eliminar_fecha(date('Y-m-d'));