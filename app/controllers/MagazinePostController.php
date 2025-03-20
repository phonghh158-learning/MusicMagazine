<?php

namespace App\controllers;

use App\models\MagazinePostModel;
use Ramsey\Uuid\Uuid;
use Exception;

class MagazinePostController {
    private $model;

    public function __construct() {
        $this->model = new MagazinePostModel();
    }

    public function index() {
        $posts = $this->model->getAllPosts();
        return $posts;
    }

    public function show($id) {
        $post = $this->model->getPostById($id);
        return $post;
    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;

                $data['id'] = Uuid::uuid4()->toString();
                    
                return $this->model->createPost($data);
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }

    public function update() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;
                    
                return $this->model->updatePost($data);
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }

    public function destroy($id) {
        $result = $this->model->deletePost($id);
        return json_encode(['success' => $result]);
    }

    public function softDelete($id) {
        $result = $this->model->softDeletePost($id);
        return json_encode(['success' => $result]);
    }
}
