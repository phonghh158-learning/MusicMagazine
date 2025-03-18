<?php

namespace App\controllers;

use App\models\SongModel;
use Ramsey\Uuid\Uuid;
use Exception;

class SongController
{
    private SongModel $model;

    public function __construct()
    {
        $this->model = new SongModel();
    }

    public function index()
    {
        return $this->model->getAllSongs();
    }

    public function show($id)
    {
        return $this->model->getSongById($id);
    }

    public function create()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $_POST;
                $song = $this->model->createSong(
                    Uuid::uuid4()->toString(),
                    $data['title'],
                    $data['album_id'],
                    $data['duration'],
                    'null'
                );

                return $song;
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }

    public function update($song)
    {
        return $this->model->updateSong($song);
    }

    public function destroy($id)
    {
        return $this->model->deleteSong($id);
    }

    public function softDelete($id)
    {
        return $this->model->softDeleteSong($id);
    }
}

?>
