<?php

require_once __DIR__ . '/../Core/Router.php';
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../core/Database.php';

use Core\Router;
use core\Database;

Router::dispatch();

?>