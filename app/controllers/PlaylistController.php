<?php

    namespace App\controllers;

    use App\models\PlaylistModel;
    use Ramsey\Uuid\Uuid;
    use Exception;

    class PlaylistController {
        private $model;

        public function __construct() {
            $this->model = new PlaylistModel();
        }

        public function getAllPlaylists()
        {
            return $this->model->getAllPlaylists();
        }

        public function getPlaylistById($id)
        {
            return $this->model->getPlaylistById($id);
        }

        public function create() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    $data['id'] = Uuid::uuid4()->toString();

                    return $this->model->createPlaylist($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        public function update($entity)
        {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    return $this->model->updatePlaylist($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        public function destroy($id)
        {
            return $this->model->deletePlaylist($id);
        }

        public function softDelete($id)
        {
            return $this->model->softDeletePlaylist($id);
        }
    }

?>