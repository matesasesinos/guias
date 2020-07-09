<?php

use App\Models\Database;

new Database();

use App\Controllers\Guia;
Guia::eliminar_fecha(date('Y-m-d'));