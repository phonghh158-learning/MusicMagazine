<?php

    namespace App\models;

use App\entities\ArtistEntity;
use App\repositories\ArtistRepository;
use Core\helper\Mapper;

    class ArtistModel {
        private $artistRepository;

        public function __construct() {
            $this->artistRepository = new ArtistRepository();
        }

        public function getAllArtists() {
            return $this->artistRepository->getAllItem();
        }

        public function getArtistById($id) {
            return $this->artistRepository->getItemById($id);
        }

        public function createArtist($data) {
            $entity = Mapper::DataToEntity(ArtistEntity::class, $data);
            return $this->artistRepository->create($entity);
        }

        public function updateArtist($data) {
            $entity = Mapper::DataToEntity(ArtistEntity::class, $data);
            return $this->artistRepository->update($entity);
        }

        public function deleteArtist($id) {
            return $this->artistRepository->delete($id);
        }

        public function softDeleteArtist($id) {
            return $this->artistRepository->softDelete($id);
        }
    }

?>