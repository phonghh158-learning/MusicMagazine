<?php

namespace App\repositories;

use App\entities\SongEntity;

class SongRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct('songs', SongEntity::class);
    }

    // Add any additional methods specific to SongRepository if needed
}

?>
