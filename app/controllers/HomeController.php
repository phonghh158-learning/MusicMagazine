<?php

namespace App\controllers;

class HomeController {
    public function index() {
        echo "Trang chủ từ Controller!";
    }

    public function about() {
        echo "Giới thiệu về Music Magazine!";
    }

    public function contact() {
        echo "Liên hệ với chúng tôi!";
    }
}
