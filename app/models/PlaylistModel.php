<?php

    namespace App\models;

    use App\entities\PlaylistEntity;
    use App\repositories\PlaylistRepository;
    use Core\helper\Mapper;

    class PlaylistModel {
        private $repository;

        public function __construct()
        {
            $this->repository = new PlaylistRepository();
        }

        public function getAllPlaylists() {
            return $this->repository->getAllItem();
        }

        public function getPlaylistById($id) {
            return $this->repository->getItemById($id);
        }

        public function createPlaylist($data) {
            $entity = Mapper::DataToEntity(PlaylistEntity::class, $data);
            return $this->repository->create($entity);
        }

        public function updatePlaylist($data) {
            $entity = Mapper::DataToEntity(PlaylistEntity::class, $data);
            return $this->repository->update($entity);
        }

        public function deletePlaylist($id) {
            return $this->repository->delete($id);
        }

        public function softDeletePlaylist($id) {
            return $this->repository->softDelete($id);
        }
    }

?>