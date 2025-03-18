<?php

    namespace App\models;

    use App\entities\AlbumEntity;
    use App\repositories\AlbumRepository;
    use App\repositories\repository;

    class AlbumModel {
        private $repository;

        public function __construct()
        {
            $this->repository = new AlbumRepository();
        }

        public function getAlbums() {
            return $this->repository->getAllItem();
        }

        public function getAlbumById($id) {
            return $this->repository->getItemById($id);
        }

        public function createAlbum($id, $title, $artistId, $releaseDate, $albumType, $albumCover, $deleteAt) {
            $entity = new AlbumEntity($id, $title, $artistId, $releaseDate, $albumType, $albumCover, $deleteAt);
            return $this->repository->create($entity);
        }

        public function updateAlbum($data) {
            return $this->repository->update($data);
        }

        public function deleteAlbum($id) {
            return $this->repository->delete($id);
        }

        public function softDeleteAlbum($id)
    {
        return $this->repository->softDelete($id);
    }
    }

?>