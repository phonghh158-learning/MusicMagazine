<?php

    namespace App\models;

use App\entities\ArtistEntity;
use App\repositories\ArtistRepository;

    class ArtistModel {
        private $artistRepository;

        public function __construct() {
            $this->artistRepository = new ArtistRepository();
        }

        public function getArtists() {
            return $this->artistRepository->getAllItem();
        }

        public function getArtistById($id) {
            return $this->artistRepository->getItemById($id);
        }

        public function createArtist($id, $realName, $artistName, $bio, $artistAvatar, $artistCover) {
            $entity = new ArtistEntity($id, $realName, $artistName, $bio, $artistAvatar, $artistCover);
            return $this->artistRepository->create($entity);
        }

        public function updateArtist($data) {
            return $this->artistRepository->update($data);
        }

        public function deleteArtist($id) {
            return $this->artistRepository->delete($id);
        }
    }

?>