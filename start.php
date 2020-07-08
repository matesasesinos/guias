<?php
require 'vendor/autoload.php';
require 'config.php';

use Models\Database;

new Database();

use Controllers\Guia;
Guia::eliminar_fecha(date('Y-m-d'));