<?php

use App\controllers\authentication\AuthController;
use App\controller;
use Core\Router;

//TEST
Router::get('', [new HomeController, 'index']);
Router::get('about', [new HomeController, 'about']);
Router::get('contact', [new HomeController, 'contact']);

//Authentication
$router->post('/register', [AuthController::class, 'register']);

