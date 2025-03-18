<?php

    namespace App\repositories;

    use App\entities\ArtistEntity;
    use App\repositories\BaseRepository;

    class ArtistRepository extends BaseRepository {
        public function __construct() {
            parent::__construct('artists', ArtistEntity::class);
        }
    }

?>