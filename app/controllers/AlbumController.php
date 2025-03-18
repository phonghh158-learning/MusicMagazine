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

        public function getAlbums() {
            return $this->model->getAlbums();
        }

        public function getAlbumById($id) {
            return $this->model->getAlbumById($id);
        }

        public function create() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;
                    $album = $this->model->createAlbum(
                        Uuid::uuid4()->toString(),
                        $data['title'],
                        $data['artist_id'],
                        $data['release_date'],
                        $data['album_type'],
                        $data['album_cover'],
                        'null'
                    );

                    return $album;
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
            }
        }

        public function update($data) {
            return $this->model->updateAlbum($data);
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