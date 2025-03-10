<?php

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';

Router::get('', [new HomeController, 'index']);
Router::get('about', [new HomeController, 'about']);
Router::get('contact', [new HomeController, 'contact']);
