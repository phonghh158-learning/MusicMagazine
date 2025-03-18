<?php

namespace App\models;

use App\entities\SongEntity;
use App\repositories\SongRepository;

class SongModel
{
    private $repository;

    public function __construct()
    {
        $this->repository = new SongRepository();
    }

    public function getAllSongs()
    {
        return $this->repository->getAllItem();
    }

    public function getSongById($id)
    {
        return $this->repository->getItemById($id);
    }

    public function createSong($id, $title, $albumId, $duration, $deleteAt)
    {
        $entity = new SongEntity($id, $title, $albumId, $duration, $deleteAt);
        return $this->repository->create($entity);
    }

    public function updateSong($song)
    {
        return $this->repository->update($song);
    }

    public function deleteSong($id)
    {
        return $this->repository->delete($id);
    }

    public function softDeleteSong($id)
    {
        return $this->repository->softDelete($id);
    }
}

?>
