<?php

    namespace App\repositories;

    use App\entities\PlaylistEntity;

    class PlaylistRepository extends BaseRepository {
        public function __construct() {
            parent::__construct('playlists', PlaylistEntity::class);
        }
    }

?>