<?php

    namespace App\models;

    use App\entities\AlbumEntity;
    use App\repositories\AlbumRepository;
    use Core\helper\Mapper;

    class AlbumModel {
        private $repository;

        public function __construct()
        {
            $this->repository = new AlbumRepository();
        }

        public function getAllAlbums() {
            return $this->repository->getAllItem();
        }

        public function getAlbumById($id) {
            return $this->repository->getItemById($id);
        }

        public function createAlbum($data) {
            $entity = Mapper::DataToEntity(AlbumEntity::class, $data);
            return $this->repository->create($entity);
        }

        public function updateAlbum($data) {
            $entity = Mapper::DataToEntity(AlbumEntity::class, $data);
            return $this->repository->update($entity);
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