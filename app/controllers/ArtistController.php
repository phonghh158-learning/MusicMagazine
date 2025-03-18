<?php

    namespace App\controllers;

    use App\models\ArtistModel;
    use Exception;

    class ArtistController {
        private $artistModel;

        public function __construct() {
            $this->artistModel = new ArtistModel();
        }

        public function getArtists() {
            return $this->artistModel->getArtists();
        }

        public function getArtistById($id) {
            return $this->artistModel->getArtistById($id);
        }

        public function createArtist() {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;
                    $artist = $this->artistModel->createArtist(
                        $data['id'],
                        $data['real_name'],
                        $data['artist_name'],
                        $data['bio'],
                        $data['artist_avatar'],
                        $data['artist_cover'].
                        'null'
                    );

                    return $artist;
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        public function updateArtist($data) {
            return $this->artistModel->updateArtist($data);
        }

        public function deleteArtist($id) {
            return $this->artistModel->deleteArtist($id);
        }
    }

?>