<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../routes/web.php';

// Chạy hệ thống router
Router::dispatch();
