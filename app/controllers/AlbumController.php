<?php

    namespace App\controllers;

    use App\models\AlbumModel;
    use Ramsey\Uuid\Uuid;
    use Exception;

    class AlbumController {
        private $model;

        public function __construct()
        {
            $this->model = new AlbumModel();
        }

        public function getAllAlbums() {
            return $this->model->getAllAlbums();
        }

        public function getAlbumById($id) {
            return $this->model->getAlbumById($id);
        }

        public function create() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    $data['id'] = Uuid::uuid4()->toString();

                    return $this->model->createAlbum($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
            }
        }

        public function update() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    return $this->model->updateAlbum($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
            }
        }

        public function destroy($id) {
            return $this->model->deleteAlbum($id);
        }

        public function softDelete($id)
        {
            return $this->model->softDeleteAlbum($id);
        }
    }

?>