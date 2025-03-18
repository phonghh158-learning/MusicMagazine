<?php

    namespace App\repositories;

    use App\entities\AlbumEntity;
    use App\repositories\BaseRepository;

    class AlbumRepository extends BaseRepository {
        public function __construct()
        {
            parent::__construct('albums', AlbumEntity::class);
        }
    }

?>