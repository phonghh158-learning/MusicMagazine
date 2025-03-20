<?php

    namespace App\controllers;

    use App\models\ArtistModel;
    use Core\helper\Mapper;
    use Exception;
use Ramsey\Uuid\Nonstandard\Uuid;

    class ArtistController {
        private $artistModel;

        public function __construct() {
            $this->artistModel = new ArtistModel();
        }

        public function getAllArtists() {
            return $this->artistModel->getAllArtists();
        }

        public function getArtistById($id) {
            return $this->artistModel->getArtistById($id);
        }

        public function create() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    $data['id'] = Uuid::uuid4()->toString();

                    return $this->artistModel->createArtist($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        public function update() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    return $this->artistModel->updateArtist($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        public function delete($id) {
            return $this->artistModel->deleteArtist($id);
        }

        public function softDeleteA($id) {
            return $this->artistModel->softDeleteArtist($id);
        }
    }

?>