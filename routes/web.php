<?php

namespace routes;

use App\controllers\HomeController;
use App\controllers\authentication\AuthController;
use Core\Router;

//TEST
Router::get('', [new HomeController, 'index']);
Router::get('about', [new HomeController, 'about']);
Router::get('contact', [new HomeController, 'contact']);

//Authentication
$router->post('/register', [AuthController::class, 'register']);

